<?php require_once '../libs/auth.php';  ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My first html page</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
</head>
<body>
<?php
$result = array();
if(isset($_GET['action']) and ($_GET['action'] === 'reg'))
{
    $result = checkRegForm($_POST);
    if(empty($result)){
        addNewUser($_POST);
        header("Location: index.php");
    }
}
?>


<div class="container">
    <div class='row'>
        <div class='col'>
            <a href="index.php">Авторизация</a>
            <h4>Регистрация</h4>
            <form method="post" name="auth" id="auth" action="registration.php?action=reg">
                <p>
                    <label for="login">Логин</label>
                    <input type="text" name="login" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>"> <pre><?= isset($result['login']) ? $result['login'] : '' ?></pre>
                    <label for="pwd">Пароль</label>
                    <input type="password" name="pwd"> <pre><?= isset($result['pwd']) ? $result['pwd'] : '' ?></pre>
                    <input type="submit" value="Отправить">
                </p>
            </form>
        </div>
    </div>
</div>
</body>
</html>