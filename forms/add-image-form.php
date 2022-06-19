    <p>Добавить изображение в галерею (поддерживает типы файлов: jpg, jpeg, bmp, gif, png)</p>
        <form enctype="multipart/form-data" method="post" action="index.php?action=add_img&book_id=<?=$bookID?>">
            <p>
                <input type="file" name="user_image" accept="image/jpeg">
                <input type="submit" value="Отправить">
            </p>
    </form>
