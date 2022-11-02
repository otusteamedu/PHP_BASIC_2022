<?php

require_once 'db.php';

session_start();

if (!empty($_POST['user']) && !empty($_POST['password'])) {
    if (authenticate($_POST['user'], $_POST['password'])) {
        header('Location: /public');
        $_SESSION['username'] = $_POST['user'];
        $_SESSION['token'] = uniqid();
    } else {
        echo "Authentication failed" . '<br>';
        // header('Location: /auth.php');
        header("Refresh:3; url=public/login.php");
    }
} else {
    header("Refresh:1; url=public/login.php");
}