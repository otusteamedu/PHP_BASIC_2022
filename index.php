<?php
require_once 'db.php';

$query = array_key_exists('query', $_POST) ? $_POST['query'] : null;
$books = getBooks($query);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book Library </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
<section class="container">
    <div class="mt-3">
        <form method="POST">
            <div class="row g-3 align-items-center mx-auto">
                <div class="col-5">
                    <input type="text" name="query" class="form-control"
                           placeholder="Введите название книги или Автора">
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-success" name="submit" value="Найти">
                </div>
            </div>
        </form>
    </div>

    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Авторы</th>
            <th scope="col">Кол-во страниц</th>
            <th scope="col">Год выпуска</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($books as $book) {
            ?>
            <tr>
                <th scope="row"><?= $book['id'] ?></th>
                <td><?= $book['bookName'] ?></td>
                <td><?= $book['author'] ?></td>
                <td><?= $book['pageCount'] ?></td>
                <td><?= $book['releaseYear'] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</section>
</body>