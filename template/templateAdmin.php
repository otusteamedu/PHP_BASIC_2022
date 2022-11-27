<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Галерея фото</title>
</head>

<body style="text-align: center; background: cadetblue;">
    <h1 style="color: antiquewhite;">Галерея фотографий</h1>

    <?php
    include '../functions.php';
    include '../db/selectImage.php';
    $dir = "../img_small";
    $dir_big = "../img_big";
    $files = extension(scandir($dir_big));
    for ($i = 0; $i < count($files); $i++) {
        if (isImage("../" . selectImage($i))) {


    ?>
            <a href="<?= '/images/?id=' . $i ?>" target="_blank"><img src="<?= '../' . selectImage($i) ?>" alt="Фото галереи" style="width: 500px; height:300px" /></a>
    <?php

        }
    }
    ?>

    <h2 style="color:brown;">Загрузить фотографию</h2>
    <form action="../output.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="load" value="Загрузить файл">
</body>