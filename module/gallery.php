<?php
    declare(strict_types=1);
    require_once '../libs/img.php';
    require_once '../libs/auth.php';

    if(isset($_GET['book_id'])){
        echo "<p><a href='index.php'>Назад</a></p>";
        $images = getBookImagesList($_GET['book_id']);
        // foreach ($images as $image){
        //     $fileName =  $image['image_name'];
        //     $filePath = $imgDir . $fileName;
        //     $filePathMin = $imgDirMin . $fileName;
        //     echo "<a target='_blank' href='". $filePath ."'><img class='min-img' src=". $filePathMin ." ></a>";
        // }

        if(isAuthorized()){
            if(isset($_GET['action']) and ($_GET['action'] === 'add_img') and isset($_FILES['user_image']) and empty($_FILES['user_image']['error'])){
                if(addImage($_GET['book_id'], $_FILES['user_image'])){
                    header("Location: index.php?book_id={$_GET['book_id']}");
                } 
                echo "<pre>Ошибка загрузки изображения.</pre>";      
            }
            require_once '../views/lightbox.php';
            ?>

            <p>Добавить изображение в галерею (поддерживает типы файлов: jpg, jpeg, bmp, gif, png)</p>
            <form enctype="multipart/form-data" method="post" action="index.php?action=add_img&book_id=<?=$_GET['book_id'] ?>">
                <p>
                    <input type="file" name="user_image" accept="image/jpeg">
                    <input type="submit" value="Отправить">
                </p>
            </form>
        <?php
        }
    }
    ?>
