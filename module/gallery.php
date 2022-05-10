<?php
    declare(strict_types=1);
    require_once '../libs/img.php';
    require_once '../libs/auth.php';

    const MAX_HEIGHT = 300;
    $imgDir = './img/';
    $imgDirMin = './img/min/';
    $allowedTypes = ['image/gif', 'image/bmp', 'image/png', 'image/jpeg', 'image/jpg'];

    foreach (glob($imgDirMin . '/*.{jpg,png,bmp,gif,jpeg}', GLOB_BRACE) as $filePathMin){
        $fileName =  basename($filePathMin);
        $filePath = $imgDir . $fileName;
        echo "<a target='_blank' href='". $filePath ."'><img class='min-img' src=". $filePathMin ." ></a>";
    }

    if(isAuthorized()){
        if(isset($_GET['action']) and ($_GET['action'] === 'add_img') and isset($_FILES['user_image']) and empty($_FILES['user_image']['error'])){
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
        ?>
        <p>Добавить изображение в галерею (поддерживает типы файлов: jpg, jpeg, bmp, gif, png)</p>
        <form enctype="multipart/form-data" method="post" action="index.php?action=add_img">
            <p>
                <input type="file" name="user_image" accept="image/jpeg">
                <input type="submit" value="Отправить">
            </p>
        </form>
    <?php
    }
    ?>
