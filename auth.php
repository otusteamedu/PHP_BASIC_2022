<?php
require_once 'db.php';

session_start();
header('Location: /otus');

if (!empty($_POST['login']) && !empty($_POST['password']) && authenticate($_POST['login'], $_POST['password'])) {

    $_SESSION['login'] = $_POST['login'];
    $_SESSION['token'] = uniqid();
}

setCookies($_POST);

function setCookies(array $data):void
{
    if ($data['remember'] == 'on'){
        $token = setRememberToken($data['login']);
        setcookie("remember_token", $token, time() + 3600*24*30);
    }
}