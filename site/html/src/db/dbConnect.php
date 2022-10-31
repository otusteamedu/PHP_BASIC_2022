<?php

require_once 'util/getConfig.php';

/**
 * Установить соединение с БД.
 *
 * @throws PDOException Если попытка подключения к базе данных завершается с ошибкой.
 * 
 * @return PDO Экземпляр PDO, предоставляющий подключение к необходимой базе данных.
 */
function dbСonnect(): PDO
{
    getConfig();
    $dbHost = getenv('DB_HOST');
    $dbName = getenv('DB_NAME');
    $dbUser = getenv('DB_USER');
    $dbPassword = getenv('DB_PASSWORD');
    $dsn = sprintf('mysql:host=%s;dbname=%s', $dbHost, $dbName);

    $pdo = new PDO($dsn, $dbUser, $dbPassword, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    return $pdo;
}
