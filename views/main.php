<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Библиотека</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
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

<section class="gravity">
    <div class="container">
        <div class="row">
            <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                <a href="/">
                    На главную
                </a>
            </div>
            <?php if (!isset($_SESSION['is_auth'])): ?>
                <div class="col-lg-3 d-none d-lg-block">
                    <a href="/?action=login">
                        Войти
                    </a>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <a href="/?action=registry">
                        Регистрация
                    </a>
                </div>
            <?php else: ?>
                <div class="col-lg-3 d-none d-lg-block">
                    <a href="/?action=bookAdd">
                        Добавить книгу
                    </a>
                </div>
                <div class="col-lg-2 d-none d-lg-block">
                    <a href="/?action=logout" style="opacity: 0.3;">
                        Выйти
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <h3>Фильтр</h3>
        <form action="/" method="get" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="Filter Name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="author" placeholder="Filter Author">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="Найти"/>
                </div>
            </div>

        </form>
        <h2>Список книг</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Миниатюра</th>
                <th>Название книги</th>
                <th>Авторы</th>
                <th>Количество страниц</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <th scope="row"><?= $book['id']; ?></th>
                    <td>
                        <?php if (file_exists(APP_PATH . DIRECTORY_SEPARATOR . "img/min/" . $book['path'])): ?>
                            <a data-fancybox="gallery" href="img/<?= $book['path']; ?>">
                                <img class="img-fluid" src="img/min/<?= $book['path']; ?>">
                            </a>
                        <?php else: ?>
                            <a data-fancybox="gallery" href="img/<?= $book['path']; ?>">
                                <img class="img-fluid" src="img/<?= $book['path']; ?>">
                            </a>
                        <?php endif; ?>
                    </td>
                    <td><a href="/?book=<?= $book['slug']; ?>"><?= $book['name']; ?></a></td>
                    <td><?= $book['author']; ?></td>
                    <td><?= $book['pages']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
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
