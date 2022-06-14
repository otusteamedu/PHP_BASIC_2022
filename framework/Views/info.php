<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/bootstrap/css/bootstrap.min.css" >
    <script defer src="/Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/Assets/css/style.css">

    <title><?php echo $title; ?></title>

</head>
<body class="big-banner">


        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href='/index/index' class="menu-home">Home</a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="menu-contacts">Contacts</a>
                </div>
                <div class="col-md-4" style="text-align: right;">
                    <a href="#" class="burger-menu-xs"><img src="/Assets/img/menu_icon.png"></a>
                </div>
            </div>
        </div>

    

    <div class="services">
        <div class="container">
            <h2>ВОЙТИ</h2>
            <form action=/userauth/loginUser method="post">
                <div class="mb-3">
                    <label for="user" class="form-label">Логин</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Войти</button>
            </form>
            <p>Нет учетной записи? <a href='/userreg/newUser'>Создать</a></p>
        </div>
    </div>

</body>
</html>
