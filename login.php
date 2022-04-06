<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="Решения для вашего бизнеса">
    <title>ИС Аналитика | Страница входа</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="text-center">

<form class="form-signin" action="index.php" method="POST">
    <img class="mb-4" src="img/login-logo.png" alt="logo">
    <h1 class="h3 mb-3 font-weight-normal">
        Вход в личный кабинет
    </h1>
    <div class="checkbox mb-3">
        <label for="inputEmail" class="sr-only">Логин</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Логин" required autofocus>
    </div>
    <div class="checkbox mb-3">
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
    </div>
    <div class="checkbox m-3">
        <label>
            <input type="checkbox" value="remember-me">
            Запомнить меня
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    <p class="mt-5 mb-3">
        &copy; 2011-2022 Решения для вашего бизнеса
    </p>
</form>

</body>
</html>