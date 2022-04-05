<?php

require_once("db.php");
$books = db_get_all_books();
echo "<pre>";
print_r($_GET);
echo "</pre>";

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
    <form action="/" method="GET">
        <div class="form-group">
            <label for="id">id</label>
            <input type="text" class="form-control" id="id">
        </div>
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="authors">Автор</label>
            <input type="text" class="form-control" id="authors">
        </div>
        <div class="form-group">
            <label for="pages">Количество страниц</label>
            <input type="number" class="form-control" id="pages">
        </div>
        <div class="form-group">
            <label for="year">Год</label>
            <input type="number" class="form-control" id="year">
        </div>
        <input type="submit" value ="Отправить">
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
        <?php foreach ($books as $book):?>
            <tr>
                <td><?=$book['id'];?></td>
                <td><?=$book['name'];?></td>
                <td><?=$book['authors'];?></td>
                <td><?=$book['pages'];?></td>
                <td><?=$book['year'];?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>

</body>
</html>



