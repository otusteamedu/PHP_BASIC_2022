<?php
require 'conn/authenticate.php';
session_start();
if (empty($_SESSION['token'])) {
    header('Location: template/authForm.php');
} else {
    header('Location: template/templateAdmin.php');
}

if (!empty($_POST['user']) && !empty($_POST['password'])) {
    if (authenticate($_POST['user'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['user'];
        $_SESSION['token'] = uniqid();
    } else {
        header('Location: template/templateGuest.php');
    }
}
