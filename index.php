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
    const MAX_HEIGHT = 300;

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

    $imgDir = './img/';
    $imgDirMin = './img/min/';
    $allowedTypes = ['image/gif', 'image/bmp', 'image/png', 'image/jpeg', 'image/jpg'];

    if(isset($_FILES['user_image']) && empty($_FILES['user_image']['error'])){
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
    <p>
        Добавить изображение в галерею (поддерживает типы файлов: jpg, jpeg, bmp, gif, png)
    </p>
    <form enctype="multipart/form-data" method="post">
        <p>
            <input type="file" name="user_image" accept="image/jpeg">
            <input type="submit" value="Отправить">
        </p>
    </form>

</body>
</html>