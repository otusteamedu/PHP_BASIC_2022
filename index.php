<?php
require 'db/authenticate.php';
include 'dbQuery/queryBook.php';
include 'functions/buildBookRows.php';
include '../functions.php';
include '../db/selectImage.php';
$booksTableRows = buildBookRows($books);
$dir_big = "../img_big";
$files = extension(scandir($dir_big));
for ($i = 0; $i < count($files); $i++) {
    if (isImage("../" . selectImage($i))) {
        $books = queryBook($i);

?>
        <a href="<?= '/images/?id=' . $i ?>" target="_blank"><img src="<?= '../' . selectImage($i) ?>" alt="Фото галереи" style="width: 500px; height:300px" /></a>
        <?php

    }
}
        ?>?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Библиотека</title>
        </head>

        <body style="text-align: -webkit-center;">
            <table class="table">
                <thead>

                </thead>
                <tbody style="text-align: center;">
                    <?= $booksTableRows; ?>
                </tbody>
            </table>
            <form name="search" method="post" action="dbQuery/searchBook.php">
                <input type="search" name="query" placeholder="Поиск">
                <button type="submit">Найти</button>
            </form>
        </body>