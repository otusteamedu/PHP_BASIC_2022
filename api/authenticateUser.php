<?php
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "/libs/db.php");

function authenticate($username, $password) {
    $pdo = getConnection();
    $password = md5($password);
    $result = $pdo->prepare('select * from users where name = ? and password = ?');
    $result->execute([$username,$password]);
    $count = $result->rowCount();
    if($count > 0)
    {
        $user_data = $result->fetch();
        return $user_data;
    }
    return false;
}

function setUserInSession($username, $password) {
    $userData = authenticate($username, $password);
    if ($userData) {
        $_SESSION['is_auth'] = true;
        $_SESSION['is_admin'] = $userData['is_admin'];
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['username'] = $userData['name'];
    }
    header("Location: /index.php");
    exit();
}

setUserInSession($_POST['username'], $_POST['password']);