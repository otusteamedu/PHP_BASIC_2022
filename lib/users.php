<?php
declare(strict_types=1);
require_once 'database.php';

function authenticateUser($email, $password) {
    $db = getConnection();
    $query = $db->prepare("select * from users where email = ? and password = ?");
    $query->execute([$email, sha1($password)]);
    return $query->rowCount() > 0 ? $query->fetch() : false;
}

function registerUser($username, $email, $password) {
    $password=sha1($password);
    if(!preg_match("/^[А-я\s\-]+$/u",$username))
        return false;
    if(!preg_match("/^[A-z\d\-\_]+[@]\S+\.\S+$/u",$email))
        return false;

    $db = getConnection();
    $query = $db->prepare("select * from users where email = ?");
    $query->execute([$email]);
    if($query->rowCount() > 0)
        return false;
    $registerQuery = $db->prepare("insert into users(username, email, password) values(?,?,?)");
    $registerQuery->execute([$username,$email,$password]);
    return [
        'id' => $db->lastInsertId(),
        'username' => $username,
        'email' => $email
    ];
}

function isAuthenticated() {
    return !empty($_SESSION['user_id']);
}

function isAdmin() {
    return !empty($_SESSION['is_admin']) && $_SESSION['is_admin'];
}
