<?php
declare(strict_types=1);
require_once 'config.php';

function dbConnect($driver, $host, $port, $dbName, $user, $password): PDO {
    return new PDO("{$driver}:host={$host};port={$port};dbname={$dbName}",$user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true,
        PDO::FETCH_BOTH => false
    ]);
}

function getConnection():PDO {
    $config = getConfig()['database'];
    return dbConnect($config['driver'], $config['host'], $config['port'], $config['db'], $config['user'], $config['password']);n;
}

