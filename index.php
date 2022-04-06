<?php

require_once("db.php");
if (empty($_GET)) {
    $books = db_get_all_books();
}
if (!empty($_GET)) {
    if (isset($_GET['name']) && !isset($_GET['author'])) {
        $books = db_get_all_books($_GET['name']);
    } elseif (isset($_GET['name']) && isset($_GET['author'])) {
        $books = db_get_all_books($_GET['name'], $_GET['author']);
    } elseif (!isset($_GET['name']) && isset($_GET['author'])) {
        $books = db_get_all_books(null, $_GET['author']);
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Книги</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Фильтр</h2>
    <form action="/" method="get" class="form-group" enctype="multipart/form-data">
        Name: <input type="text" class="mb-3" name="name" /><br />
        Author: <input type="text" class="mb-3" name="author" /><br />
        <input type="submit" class="mb-3" value="Найти" />
    </form>
    <h2>Список книг</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название книги</th>
            <th>Авторы</th>
            <th>Количество страниц</th>
            <th>Год выпуска</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $book['id']; ?></td>
                <td><?= $book['name']; ?></td>
                <td><?= $book['authors']; ?></td>
                <td><?= $book['pages']; ?></td>
                <td><?= $book['year']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>



