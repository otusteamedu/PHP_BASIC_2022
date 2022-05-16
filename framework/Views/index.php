<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            text-align: center;
        }

        h1 {
            margin-top: 20%;
        }
    </style>

</head>

<body>
<h1>Главная страница нашего приложения: <?php echo $appName; ?></h1>
<h2>Здесь будет реализовано: </h2>
<a href="Users/Login"><h3>Страница аутентификации</h3></a>
<a href="user-logout"><h3>Сброс, если есть активная сессия</h3></a>
<a href="search-books"><h3>Поиск книг</h3></a>
<a href="view-books"><h3>Вывод книг</h3></a>
</body>
</html>

