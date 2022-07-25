<?php
require_once('config.php');
function connect()
{
    return new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USERNAME, PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}


$db = connect();

if (!empty($_POST) && array_key_exists('q', $_POST)) {
    $result = $db->prepare('SELECT * FROM `library` WHERE `bookname` LIKE :query OR `author` LIKE :query');
    $query = '%' . $_POST['q'] . '%';
    $result->bindParam(':query', $query, PDO::PARAM_STR);
    $result->execute();
} else {
    $result = $db->query('SELECT * FROM `library`');
    $result->execute();
}

$list = $result->fetchAll(PDO::FETCH_ASSOC);
