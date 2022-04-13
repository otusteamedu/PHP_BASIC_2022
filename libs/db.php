<?php

function db_connect() {
    return new PDO('mysql:host=localhost;dbname=test','root','',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}

function authenticate($username, $password) {
    $pdo = db_connect();
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

function register($username, $password) {
    $pdo = db_connect();
    $password = md5($password);
    $result = $pdo->prepare('insert into users (name, password) values (?, ?)');
    $result->execute([$username,$password]);
    Header("Location: /");
}