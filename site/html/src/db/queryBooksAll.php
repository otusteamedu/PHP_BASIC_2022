<?php

require_once 'db/dbСonnect.php';

/**
 * Получить из БД список всех книг в библиотеке.
 *
 * @return array Список книг.
 */
function queryBooksAll(): array
{
    $conn = dbСonnect();
    $result = $conn->query('SELECT * FROM book ORDER BY id', PDO::FETCH_ASSOC);
    $result->execute();
    $data = $result->fetchAll();

    return $data;
}
