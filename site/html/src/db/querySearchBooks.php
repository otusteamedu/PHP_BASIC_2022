<?php

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
        WHERE MATCH (`name`, `authors`) AGAINST (:search)
    ';
    $pstmt = $conn->prepare($sql);
    $pstmt->bindValue(':search', $searchString);
    $pstmt->execute();
    $books = $pstmt->fetchAll(PDO::FETCH_ASSOC);

    return $books;
}
