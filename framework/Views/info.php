<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
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

<h1>Привет, <?php echo $name; ?></h1>

<form action=/userauth/loginUser method="post">
        <label for="user">Имя пользователя:</label>
        <input type="text" name="username" /><br>
        <label for="password">Пароль:</label>
        <input type="text" name="password" /><br>
        <input type="submit" name="login" value="Войти">
</form>
</body>
</html>
