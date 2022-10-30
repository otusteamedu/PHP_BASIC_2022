<?php

function connect()
{
    $config = parse_ini_file("config.ini", true, INI_SCANNER_TYPED);
    $db = $config['mysql'];

    $pdo = new PDO("mysql:host={$db['host']};dbname={$db['dbname']};}",
        $db['username'],
        $db['password'],
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
