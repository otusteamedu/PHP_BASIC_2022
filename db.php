<?php

function connect()
{
    $pdo = new PDO('mysql:host=localhost;dbname=otus-books', 'root', '',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::FETCH_ASSOC => true,
        ]);

    return $pdo;
}

function getBooks()
{
    $pdo = connect();
    $result = $pdo->query('select * from books order by id desc');
    $result->execute();
    $data = $result->fetchAll();
    return $data;
}