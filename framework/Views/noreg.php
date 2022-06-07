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


<h1><?php echo $resault; ?></h1>
<h2>Зарегистрируйся</h2>


<form action=/userreg/userReg method="post">
        <label for="user">Имя пользователя:</label>
        <input type="text" name="username" /><br>
        <label for="password">Пароль:</label>
        <input type="text" name="password" /><br>
        <button type="submit" name="register" value="register">Регистрация</button>
</form>

<a href='/index/index'>Вернуться на главную</a>

</body>
</html>
