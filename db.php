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
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

    return $pdo;
}
