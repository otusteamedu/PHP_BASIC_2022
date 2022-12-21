<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Библиотека</title>
    <h1 style="color: antiquewhite;">Библиотека</h1>
</head>

<body style="text-align: center; background: cadetblue;">


    <?php
    require("../vendor/autoload.php");

    for ($i = 1; $i < count(files()) + 1; $i++) {
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