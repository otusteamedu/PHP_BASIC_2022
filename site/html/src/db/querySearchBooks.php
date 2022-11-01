<?php

require_once 'db/dbСonnect.php';

/**
 * Искать в БД список книг, удовлетворяющих поисковому запросу.
 *
 * @return array Список найденных книг.
 */
function querySearchBooks(string $searchString): array
{
    $conn = dbСonnect();
    $sql = '
        SELECT * 
        FROM `book`
        WHERE MATCH (`name`, `authors`) AGAINST (?)
    ';
    $pstmt = $conn->prepare($sql);
    $pstmt->execute([$searchString]);
    $books = $pstmt->fetchAll(PDO::FETCH_ASSOC);

    return $books;
}
