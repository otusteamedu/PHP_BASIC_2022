<?php
    include_once ("db.php");
    if (!empty($_GET) && $_GET['action']==='search' && (!empty($_POST['byName']) || !empty($_POST['byAuthor']))){
        $bookName = htmlspecialchars($_POST['byName']);
        $bookAuthor = htmlspecialchars($_POST['byAuthor']);
        $books = search_books($bookName, $bookAuthor);
    } else {
        $books = get_books();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Библиотека</title>
</head>
<body>
<div class="services">
    <div class="container">

        <h1 style="text-align: center; padding-bottom: 20px;">Вывод книг из таблицы</h1>

        <div class="col-12" style="padding-bottom: 20px;">
            <form action="index.php?action=search" method="post">
                <input style="width: 45%;" type="text" name="byName" placeholder="Введите часть названия книги для поиска...">
                <input style="width: 45%;" type="text" name="byAuthor" placeholder="Введите часть имени автора для поиска...">
                <input type="submit" value="Поиск">
            </form>
        </div>

        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id Книги</th>
                    <th scope="col">Название книги</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Кол-во страниц</th>
                    <th scope="col">Год выпуска</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($books as $book) { ?>
                <tr>
                    <th scope="row"><?php echo($book['uid']);?></th>
                    <td><?php echo($book['book_name']);?></td>
                    <td><?php echo($book['author_name']);?></td>
                    <td><?php echo($book['pages_count']);?></td>
                    <td><?php echo($book['years_issue']);?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>