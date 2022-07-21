<?php

require_once ('config.php');

function connect()
{
    return new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USERNAME, PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}

/* Функция авторизации*/
function authorize(string $user, string $password)
{
    $db = connect();
    $result = $db->prepare('SELECT id from users where username = ? and password = ?');
    $result->execute([$user, md5($password)]);
    if ($result->rowCount() == 0) {
        return false;
    }
    return $result->fetch(PDO::FETCH_ASSOC);
}


/* Функция записи токена*/
function setRememberToken(int $user_id, string $token)
{
    $db = connect();
    $result = $db->prepare('update users set remember_token = ? where id = ?');
    $result->execute([$token, $user_id]);
}

/* Функция рестора сессии*/
function getUserDataByToken(string $token)
{
    $db = connect();
    $result = $db->prepare('select username, id from users where remember_token = ?');
    $result->execute([$token]);
    if ($result->rowCount() > 0) {
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}
