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

function getBooks(): array
{
    $pdo = connect();
    $result = $pdo->query(
        "SELECT book.id, book.title, author.name, book.pages, book.year
FROM author
INNER JOIN authors_books ON authors_books.author_id = author.id
INNER JOIN book ON authors_books.book_id = book.id"
    );
    $result->execute();
    $data = $result->fetchAll();
    return $data;
}

function searchBooks($query): array
{
    $pdo = connect();

    $sqlQuery = "SELECT book.id, book.title, author.name, book.pages, book.year
FROM author
INNER JOIN authors_books ON authors_books.author_id = author.id
INNER JOIN book ON authors_books.book_id = book.id
WHERE (author.name like ? or book.title like ?)";

    $result = $pdo->prepare($sqlQuery);
    $result->execute([
        "%$query%", "%$query%",
    ]);
    $data = $result->fetchAll();
    return $data;
}
