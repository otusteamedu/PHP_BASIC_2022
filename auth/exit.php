<?php

session_start();
session_unset();

if (!empty($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', -1);
}

header('Location: /');