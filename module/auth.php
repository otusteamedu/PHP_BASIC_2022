<?php
declare(strict_types=1);
require_once '../libs/auth.php';

session_start();

if(isset($_GET['action']) and $_GET['action'] === 'auth'){
    if(isset($_POST['user_name']))
        authenticate($_POST['user_name'], $_POST['pwd'], isset($_POST['remember']) ? true : false);

    if(isset($_COOKIE['token']))
        authenticateByToken($_COOKIE['token']);
    header('Location: /');
}
if(isset($_GET['action']) and $_GET['action'] === 'logout'){
    logout();
    header('Location: /');
}
?>

<div class="auth">
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
<?php else: ?>
    <p>Вы авторизованы, <?=$_SESSION['name'] ?>!!!</p>
    <a href="./index.php?action=logout">Выход</a>
<?php endif; ?>
</div>
