<?php
session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "/libs/db.php");

function register($username, $password) {
    $pdo = getConnection();
    $password = md5($password);
    $result = $pdo->prepare('insert into users (name, password) values (?, ?)');
    if ($result->execute([$username,$password])) {
        require_once ("authenticateUser.php");
        setUserInSession($username, $password);
    };

}

register($_POST['username'],$_POST['password']);