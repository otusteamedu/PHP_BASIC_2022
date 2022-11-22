<?php

/**
 * Функция для подключения к Базе Данных
 *
 * @param string $dsn Имя источника данных или DSN, содержащее информацию, необходимую для подключения к базе данных.
 * @param string $login
 * @param string $pass
 * @return PDO
 */
function connect(): PDO
{
    $settingsDB = getSettingsDB();

    return new PDO(
        $settingsDB['dsn'],
        $settingsDB['login'],
        $settingsDB['pass'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::FETCH_ASSOC => true
        ]);
}

/**
 * Функция для получения данных из файлна конфигурации настроек
 *
 * @return array
 */
function getSettingsDB(): array
{
    require_once '.settingsDB.php';

    return getSettings();
}

/**
 * Функция возвращает результат авторизации пользователя на сайте
 *
 * @param $username
 * @param $password
 * @return bool
 */
function authenticate($login, $password): bool
{
    $pdo = connect();

    $result = $pdo->prepare('SELECT 1 FROM users where login = ? and password = ?');
    $result->execute([$login, md5($password)]);
    return $result->rowCount() > 0;
}

/**
 * Функция генерирует и устанавливает token для переданного пользователя
 *
 * @param string $login
 * @return string $token
 */
function setRememberToken(string $login): string
{
    $token = uniqid();
    $pdo = connect();
    $result = $pdo->prepare('update users set remember_token = ? where login = ?');
    $result->execute([$token, $login]);
    return $token;
}

/**
 * Функция ищет пользователя по переданному token.
 *
 * @param $token
 * @return false|mixed $login
 */
function authenticateFromRememberToken($token)
{
    $pdo = connect();
    $result = $pdo->prepare('select login from users where remember_token = ?');
    $result->execute([$token]);

    if ($result->rowCount() == 0) {
        return false;
    }

    return $result->fetch()['login'];
}