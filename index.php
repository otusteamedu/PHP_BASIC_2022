<?php
    require_once 'auth.php';
    include_once 'db.php';
    const MAX_HEIGHT = 300;
    session_start();

    $pdo = initDBConnection('mysql:host=otus;dbname=gallery', 'root');

    if(isset($_POST['user_name']))
        authenticate($pdo, $_POST['user_name'], $_POST['pwd'], isset($_POST['remember']) ? true : false);

    if(isset($_COOKIE['token']))
        authenticateByToken($pdo, $_COOKIE['token']);

    function resizeAndSaveImage(string $filename):GdImage
    {
        list($width, $height, $type) = getimagesize($filename);
        $newWidth = $width;
        $newHeight = $height;
        if($height > MAX_HEIGHT){
            $newWidth = (int)($width * (MAX_HEIGHT / $height));
            $newHeight = MAX_HEIGHT;
        }
        $GDImage = imagecreatetruecolor($newWidth, $newHeight);
        $source = match($type){
            IMAGETYPE_JPEG => imagecreatefromjpeg($filename),
            IMAGETYPE_GIF => imagecreatefromgif($filename),
            IMAGETYPE_PNG => imagecreatefrompng($filename),
            IMAGETYPE_BMP => imagecreatefrombmp($filename)
        };
        imagecopyresized($GDImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        return $GDImage;
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My first html page</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    $imgDir = './img/';
    $imgDirMin = './img/min/';
    $allowedTypes = ['image/gif', 'image/bmp', 'image/png', 'image/jpeg', 'image/jpg'];

    if(isAuthorized($pdo) && isset($_FILES['user_image']) && empty($_FILES['user_image']['error'])){
        $tmpFilePath = $_FILES['user_image']['tmp_name'];
        $fileName = $_FILES['user_image']['name'];
        $mimeType = mime_content_type($tmpFilePath);
        if (in_array($mimeType, $allowedTypes)){
            $uploadFile = $imgDir . basename($fileName);
            if (move_uploaded_file($tmpFilePath, $uploadFile)) {
                echo "<pre>Файл корректен и был успешно загружен.</pre>";
            } else {
                echo "<pre>Что-то пошло не так!</pre>";
            }
            $GDImage = resizeAndSaveImage($uploadFile);
            imagejpeg($GDImage, "{$imgDirMin}{$fileName}");
        }else{
            echo "<pre>Попытка загрузить не изображение. Просьба повторить попытку.</pre>";
        }
    }

    foreach (glob($imgDirMin . '/*.{jpg,png,bmp,gif,jpeg}', GLOB_BRACE) as $filePathMin){
        $fileName =  basename($filePathMin);
        $filePath = $imgDir . $fileName;
        echo "<a target='_blank' href='". $filePath ."'><img src=". $filePathMin ." ></a>";
    }
    ?>

    <?php if (isAuthorized($pdo)): ?>
    <p>
        Добавить изображение в галерею (поддерживает типы файлов: jpg, jpeg, bmp, gif, png)
    </p>
    <form enctype="multipart/form-data" method="post" action="index.php?new_file">
        <p>
            <input type="file" name="user_image" accept="image/jpeg">
            <input type="submit" value="Отправить">
        </p>
    </form>
    <?php else: ?>
    <p>
        Авторизуйтесь
    </p>
    <form method="post" name="auth" id="auth" action="index.php?auth">
        <p>
            <label for="user_name">Логин</label>
            <input type="text" name="user_name">
            <label for="pwd">Пароль</label>
            <input type="password" name="pwd"><br>
            <label for="remember">Запомнить меня</label>
            <input type="checkbox" name="remember"><br>
            <input type="submit" value="Отправить">
        </p>
    </form>
    <?php endif; ?>
</body>
</html>