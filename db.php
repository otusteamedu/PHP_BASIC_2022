<?php
function connect(): PDO
{
    return new PDO('mysql:host=localhost;dbname=otus_home_library;charset=utf8',
        'root',
        'root',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::FETCH_ASSOC => true
        ]);
}

function getBooks(string $query = null): array
{
    $pdo = connect();
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