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

function authenticate($username, $password)
{
    $pdo = connect();
    $result = $pdo->prepare('SELECT 1 FROM users where username = ? and password = ?');
    $result->execute([$username, md5($password)]);
    return $result->rowCount() > 0;
}