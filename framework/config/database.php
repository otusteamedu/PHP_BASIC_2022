<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->Load();
        
    return [
        'driver' => $_ENV['DRIVER'],
        'host' => $_ENV['HOST'],
        'port' => $_ENV['PORT'],
        'db' => $_ENV['DB'],
        # for doctrine
        'dbname' => $_ENV['DB'],
        'user' => $_ENV['USERDB'],
        'password' => $_ENV['PASSWORD']
    ];
