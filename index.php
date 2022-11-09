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
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Pages</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php
            include 'dbconn.php';
            include 'output.php';
            ?>
        </tbody>
    </table>
    <form name="search" method="post" action="searchBook.php">
        <input type="search" name="query" placeholder="Поиск">
        <button type="submit">Найти</button>
    </form>
</body>