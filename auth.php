<?php
require 'conn/authenticate.php';
session_start();
if (!empty($_POST['user']) && !empty($_POST['password'])) {
    if (authenticate($_POST['user'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['user'];
        $_SESSION['token'] = uniqid();
    } else {
        header('Location: template/templateGuest.php');
    }
}

if (!empty($_SESSION['token'])) {
    header('Location: /');
}
?>
<h4>Логин: admin, Пароль: admin</h4>
<form action="/auth.php" method="post" enctype="multipart/form-data">
    <label for="user">User:</label>
    <input type="text" id="user" name="user">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <input type="submit" value="Log in!">
</form>