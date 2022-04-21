<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить книгу</title>
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
<div class="container">
    <div class="row mb-3">
        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
            <a href="/">
                На главную
            </a>
        </div>
        <div class="col-lg-2 d-none d-lg-block">
            <a href="/?action=logout" style="opacity: 0.3;">
                Выйти
            </a>
        </div>
    </div>
    <h1>Добавить книгу</h1>
    <form action="/api/createBook.php" enctype="multipart/form-data" class="form mt-100" method="post">
        <label for="name" class="px-2">Название книги</label>
        <input type="text" name="bookname" class="px-2"/><br>
        <label for="pages" class="px-2">Количество страниц</label>
        <input type="number" name="pages" class="px-2"/><br>
        <label for="author" class="px-2">Автор</label>
        <input type="text" name="author" class="px-2"/><br>
        <label for="description" class="px-2">Описание</label>
        <textarea name="description"> </textarea>
        <br>
        <p>Загрузите фото обложки</p>
        <input type="file" name="main-picture" multiple accept="image/*,image/jpeg">
        <p>Загрузите до трех фото книги</p>
        <input type="file" name="picture1" multiple accept="image/*,image/jpeg">
        <input type="file" name="picture2" multiple accept="image/*,image/jpeg">
        <input type="file" name="picture3" multiple accept="image/*,image/jpeg">
        <input type="submit" class="btn btn-success" value="Отправить">
    </form>
</div>
</body>
</html>
