<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Библиотека</title>
    <h1 style="color: antiquewhite;">Библиотека</h1>
</head>

<body style="text-align: center; background: cadetblue;">


    <?php
    include '../functions.php';
    include '../db/selectImage.php';
    include '../db/queryBook.php';
    $dir = "../img_small";
    $dir_big = "../img_big";
    $files = extension(scandir($dir_big));
    $files_sml = extension(scandir($dir));
    for ($i = 1; $i < count($files) + 1; $i++) {
        if (isImage("../" . selectImage($i))) {


    ?>
            <a style="text-decoration: none; color:black" href="<?= '/images/?id=' . $i ?>">

                <img src="<?= '../' . selectImageSml($i) ?>" alt="Фото галереи" title="<?= queryBook($i) ?>" />
                <h2><?= queryBook($i) ?></h2>
            </a>


    <?php

        }
    }
    ?>
</body>

<footer>
    <h2 style="color:brown;">Загрузить фотографию</h2>
    <form action="../output.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="load" value="Загрузить файл">
</footer>