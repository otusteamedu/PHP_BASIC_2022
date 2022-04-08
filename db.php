<?php
function db_connect() {
    return new PDO('mysql:host=127.0.0.1;port=3306;dbname=library','root','',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}

function get_books(){
    $pdo = db_connect();
    $result = $pdo->query('SELECT * FROM books', PDO::FETCH_ASSOC);
    $result->execute();
    return $result->fetchAll();
}

function search_books(?string $bookName = null, ?string $authorName = null){
    $pdo = db_connect();

    if (!empty($bookName) && !empty($authorName))
    {
        $result = $pdo->prepare('SELECT uid, book_name, author_name, pages_count, years_issue 
                                       FROM books 
                                       WHERE book_name like ? and author_name like ?', [PDO::FETCH_ASSOC]);

        $result->execute(["%{$bookName}%", "%{$authorName}%"]);

    } elseif (!empty($bookName) && empty($authorName))
    {
        $result = $pdo->prepare('SELECT uid, book_name, author_name, pages_count, years_issue 
                                       FROM books
                                       WHERE book_name like ?', [PDO::FETCH_ASSOC]);

        $result->execute(["%{$bookName}%"]);

    } elseif (empty($bookName) && !empty($authorName))
    {
        $result = $pdo->prepare('SELECT uid, book_name, author_name, pages_count, years_issue 
                                       FROM books 
                                       WHERE author_name like ?', [PDO::FETCH_ASSOC]);

        $result->execute(["%{$authorName}%"]);
    }

    return $result->fetchAll();
}



