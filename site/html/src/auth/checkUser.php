<?php

/**
 * Проверка пользователя по логину и паролю в БД.
 *
 * @return array ассоциативный массив с данными пользователя из БД
 */
function checkUser(string $login, string $password): array
{
    $user = findUserByLogin($login);
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }

    return [];
}
