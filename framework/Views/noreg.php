<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/bootstrap/css/bootstrap.min.css" >
    <script defer src="/Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/Assets/css/style.css">
    <link rel="shortcut icon" href="/Assets/img/favicon.ico" type="image/x-icon">
</head>
<body class="big-banner">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index/index">
                <img src="/Assets/img/favicon.ico" alt="HiRusSportsmen-logo" width="30" height="24" class="d-inline-block align-text-top">
                HiRusSportsmen
            </a>
        </div>
    </nav>


    <div class="services">
        <div class="container">
        <h1><?php echo $resault; ?></h1>
        <h2>Заполните поля ниже для регистрации</h2>
        <form action=/userreg/userReg  method="post">
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
                <button type="submit" name="register" value="register" class="btn btn-primary">Регистрация</button>
            </form>
        </div>
    </div>

</body>
</html>
