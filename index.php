<?php

require_once 'lib/db/function_db.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illustrations</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container-fluid">
    <div class="row mt-4">
        <?php if(empty($_SESSION['user_id'])): ?>
            <div class="col-md-12">
                <form action="lib/auth/handlers/auth.php" method="post" class="form-inline">
                    <div class="form-group mb-2">
                        <label for="staticEmail2" class="sr-only">Email</label>
                        <input type="text" name="login" class="form-control" id="staticEmail2"
                               placeholder="Login or email">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword2"
                               placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="hidden" name="action" value="auth">
                        <input class="form-check-input" type="checkbox" name="remember_me" id="Remember_me">
                        <label class="form-check-label" for="Remember_me">Remember me</label>
                        <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                    </div>
                </form>
                <?php if(!empty($_SESSION['error'])): ?>
                <div>
                    <?=$_SESSION['error']?>
                </div>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="col-md-12 d-flex justify-content-between">
                <form action="lib/auth/handlers/exit.php" method="post">
                    <button type="submit" class="btn btn-primary mb-2">Выйти</button>
                </form>
            </div>

        <?php if($_SESSION['is_admin']): ?>
            <div class="col-md-12" align="center">
                <h3 class="text-center">Добавить книгу</h3>
                <form action="lib/functions/add_book.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="bookname" placeholder="Название" /><br>
                    <input type="text" name="author" placeholder="Автор" /><br>
                    <input type="text" name="page_count" placeholder="Количество страниц" /><br>
                    <input type="text" name="year_of_issue" placeholder="Год выпуска" /><br>
                    <input type="file" id="idPicture" name="pictures[]" multiple/>
                    <input type="submit" value="Отправить!">
                </form>
            </div>
        <?php endif; ?>


        <div class="col-md-12 mt-4">
            <h1 class="text-center">Книги с иллюстрациями</h1>
        </div>
        <div class="col-md-12 mt-4">
            <table class="table" border="1">
                <thead align="center">
                <tr>
                    <th>ID</th>
                    <th>Название книги</th>
                    <th>Автор</th>
                    <?php if($_SESSION['is_admin']): ?>
                    <th>Удалить книгу</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody align="center">
                <?php $list = getBookList();?>
                <?php foreach ($list as $row): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><a href="bookpage.php?id=<?=$row['id']?>"><?= $row['bookname']; ?></a></td>
                        <td><?= $row['author']; ?></td>
                        <?php if($_SESSION['is_admin']): ?>
                            <td>
                                <form action="lib/functions/delete_book.php" method="post">
                                    <input type="hidden" name="book_id" value="<?=$row['id']?>">
                                    <button type="submit">Удалить книгу</button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php endif; ?>

    </div>
</div>
</body>
</html>