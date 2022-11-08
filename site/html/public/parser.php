<?php

/**
 * Диспетчер обработчиков форм
 */

require 'vendor/autoload.php';

// вход на сайт
if (isset($_POST['submit_login'])) {
    // логин должен состоять из латиницы, цифр и символа подчёркивания
    $login = preg_replace('/[^a-zA-Z0-9_]/', '', $_POST['login']);
    $password = $_POST['password'];
    $remember = $_POST['remember'] === 'on';
    startSession();
    if (!checkCsrfToken($_POST['_csrf_token'], 'login_csrf_token')) {
        $_SESSION['login_form_error'] = 'Неверный CSRF-токен. ';
    } elseif (!authenticateUser($login, $password, $remember)) {
       $_SESSION['login_form_error'] = 'Неверная пара логин/пароль.';
       $_SESSION['login'] = $login;
    }
// выход из сайта
} elseif (isset($_POST['submit_logout'])) {
    if (checkCsrfToken($_POST['_csrf_token'], 'logout_csrf_token')) {
        destroySession();
    }
// загрузка картинки
} elseif(isset($_POST['submit_upload'])) {
    if (!checkCsrfToken($_POST['_csrf_token'], 'upload_csrf_token')) {
        $_SESSION['upload_form_error'] = 'Неверный CSRF-токен.';
    } else {
        $_SESSION['upload_form_error'] = uploadImage();
    }
}

header('Location: /');
