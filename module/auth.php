<?php
declare(strict_types=1);
require_once '../libs/auth.php';

session_start();

if(isset($_GET['action']) and $_GET['action'] === 'logout'){
    logout();
    header('Location: /');
    exit();
}
if(isset($_GET['action']) and ($_GET['action'] === 'reg'))
{
    $result = checkRegForm($_POST);
    if(empty($result)){
        addNewUser($_POST);
        header("Location: index.php");
        exit();
    }
}
if(isset($_GET['action']) and $_GET['action'] === 'auth'){
    if(isset($_POST['user_name']))
        authenticate($_POST['user_name'], $_POST['pwd'], isset($_POST['remember']) ? true : false);
    header('Location: /');
    exit();
}
if(isset($_COOKIE['token']) and (!isset($_SESSION['is_auth'])))
    authenticateByToken($_COOKIE['token']);
?>

<div class="auth <?= (isset($_GET['action']) and $_GET['action'] === 'reg') ? 'hidden': '' ?>" id="auth">
<?php if (!isAuthorized()): ?>
    <h4>Авторизуйтесь</h4>
    <form method="post" name="auth" id="auth" action="index.php?action=auth">
        <p>
            <label for="user_name">Логин</label>
            <input type="text" name="user_name">
            <label for="pwd">Пароль</label>
            <input type="password" name="pwd"><br>
            <label for="remember">Запомнить меня</label>
            <input type="checkbox" name="remember"><br>
            <input type="submit" value="Отправить">
        </p>
    </form>
    <a href="#" id="hide-auth">Регистрация</a>
<?php else: ?>
    <p>Вы авторизованы, <?=$_SESSION['name'] ?>!!!</p>
    <a href="./index.php?action=logout">Выход</a>
<?php endif; ?>
</div>
<div class="auth <?= (isset($_GET['action']) and $_GET['action'] === 'reg') ? '': 'hidden' ?>" id="reg">
    <h4>Регистрация</h4>
    <form method="post" name="auth" id="auth" action="index.php?action=reg">
        <p>
            <label for="login">Логин</label>
            <input type="text" name="login" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>"> <pre><?= isset($result['login']) ? $result['login'] : '' ?></pre>
        <label for="pwd">Пароль</label>
        <input type="password" name="pwd"> <pre><?= isset($result['pwd']) ? $result['pwd'] : '' ?></pre>
        <input type="submit" value="Отправить">
        </p>
    </form>
    <a href="#" id="hide-reg">Авторизация</a>
</div>

<script>
    document.getElementById('hide-auth').onclick = function() {
        var auth = document.getElementById('auth');
        var reg = document.getElementById('reg');
        auth.style.display = 'none';
        reg.style.display = 'initial';
    }
    document.getElementById('hide-reg').onclick = function() {
        var reg = document.getElementById('reg');
        var auth = document.getElementById('auth');
        reg.style.display = 'none';
        auth.style.display = 'initial';
    }
</script>