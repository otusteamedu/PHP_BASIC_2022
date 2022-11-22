<?php

/**
 * Функция для подключения к Базе Данных
 *
 * @param string $dsn Имя источника данных или DSN, содержащее информацию, необходимую для подключения к базе данных.
 * @param string $login
 * @param string $pass
 * @return PDO
 */
function connect(string $dsn, string $login, string $pass): PDO
{
    return new PDO($dsn,
        $login,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::FETCH_ASSOC => true
        ]);
}

/**
 * Функция для поиска книг в БД, согласно переданному запросу. Поиск происходит по полям "Автор" и "Название книги"
 *
 * @param array $data
 * @return array
 */
function getBooks(array $data): array
{
    $settingsDB = getSettingsDB();
    $pdo = connect($settingsDB['dsn'], $settingsDB['login'], $settingsDB['pass']);

    $query = array_key_exists('query', $data) ? $data['query'] : null;
    $sqlQuery = "SELECT authors.author as 'author', 
books.book as 'bookName',
books.page_count as 'pageCount',
books.release_year as 'releaseYear',
library.id as 'id'
FROM `library`
         INNER JOIN books on books.id = library.book_id
         INNER JOIN authors on authors.id = library.author_id
WHERE authors.author LIKE :query OR books.book LIKE :query;";

    $result = $pdo->prepare($sqlQuery);

    $result->execute([
        'query' => "%$query%"
    ]);

    return $result->fetchAll();
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