<?php
session_start();

require_once("libs/functions.php");

$images = getImages();
router($_GET, $_POST, $_FILES);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Фотогалерея</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- fancyBox3 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
          integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        .thumb img {
            -webkit-filter: grayscale(0);
            filter: none;
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 5px;
        }

        .thumb img:hover {
            -webkit-filter: grayscale(1);
            filter: grayscale(1);
        }

        .thumb {
            padding: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="h3 text-center my-4">Фотогалерея</h1>
    <div class="row">
        <?php foreach ($images as $image): ?>
            <div class="col-lg-3 col-md-4 col-6 thumb">
                <a data-fancybox="gallery" href="img/<?= $image; ?>">
                    <img class="img-fluid" src="img/min/<?= $image; ?>">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (isset($_SESSION['is_auth']) && $_SESSION['is_auth']): ?>
        <form action="/index.php?action=get" enctype="multipart/form-data" class="form-inline" method="post">
            <p>Загрузите ваши фотографии на сервер &nbsp;&nbsp;&nbsp;</p>
            <p><input type="file" name="picture" multiple accept="image/*,image/jpeg">
                <input type="submit" value="Отправить"></p>
        </form>
        <a href="/index.php?action=logout" class="btn btn-danger">Выйти</a>
    <?php elseif (!empty($_GET['action']) && $_GET['action'] === 'register'): ?>
        <h3>Регистрация</h3>
        <form action="/index.php?action=registry" class="form-inline" method="post">
            <label for="user" class="px-2">Имя пользователя:</label>
            <input type="text" name="username" class="px-2"/><br>
            <label for="password" class="px-2">Пароль:</label>
            <input type="password" name="password" class="px-2"/><br>
            <input type="submit" value="Зарегистрироваться" class="ml-2 btn btn-success">
        </form>
    <?php else: ?>
        <form action="/index.php?action=login" class="form-inline" method="post">
            <label for="user" class="px-2">Имя пользователя:</label>
            <input type="text" name="username" class="px-2"/><br>
            <label for="password" class="px-2">Пароль:</label>
            <input type="password" name="password" class="px-2"/><br>
            <input type="submit" value="Войти" class="ml-2 btn btn-success">
        </form>
        <a href="/index.php?action=register" class="btn btn-info">Регистрация</a>
    <?php endif; ?>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<!-- fancyBox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
        integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>