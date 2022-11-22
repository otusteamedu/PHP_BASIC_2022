<?php

/**
 * Функция возвращает данные для подключения к БД
 *
 * @return string[] array('dsn' => string, 'login' => string, 'pass' => string)
 */
function getSettings(): array
{
    return [
        'dsn' => 'mysql:host=localhost;dbname=otus_home_library;charset=utf8',
        'login' => 'root',
        'pass' => 'root'
    ];
}