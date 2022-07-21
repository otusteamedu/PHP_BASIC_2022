<?php

session_start();

require_once ("../db/function_db.php");

if (!empty($_COOKIE['remember_token'])) {
    $userData = getUserDataByToken($_COOKIE['remember_token']);
    $_SESSION['user_id'] = intval($userData['id']);
    $_SESSION['username'] = $userData['username'];

    header('Location: /');
}

/*Этот блок выполняется если нужна аутентификации*/
if (!empty($_POST['action']) && $_POST['action'] === 'auth') {
    $authResult = authorize($_POST['login'], $_POST['password']);
    if (!$authResult) {
        echo "<h2>Неправильное имя пользователя или пароль!</h2>";
    } else {
        $_SESSION['user_id'] = intval($authResult['id']);
        $_SESSION['username'] = $_POST['login'];

        if ($_POST['remember_me'] === 'on') {
            $token = uniqid();
            setRememberToken($_SESSION['user_id'], $token);
            setcookie('remember_token', $token, time() + 3600 * 24 * 30 * 6);
        }

        header('Location: /');
    }
}
