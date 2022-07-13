<?php

function connect()
{
    return new PDO('mysql:host=otus.php.basic.2022;dbname=otus17', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}


$db = connect();

if (!empty($_POST) && array_key_exists('q', $_POST)) {
    $result = $db->prepare('SELECT * FROM `library` WHERE `bookname` LIKE :query OR `author` LIKE :query');
    $result->execute([':query' => '%' . $_POST['q'] . '%']);
} else {
    $result = $db->query("SELECT * FROM `library`");
    $result->execute();
}

$list = $result->fetchAll(PDO::FETCH_ASSOC);
