<?php
    if(isset($_GET['book_id'])){
        $images = getBookImagesList($_GET['book_id']);
        if(isAuthorized()){
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
