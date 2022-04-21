<?php

require_once (APP_PATH . DIRECTORY_SEPARATOR  . "libs/db.php");

function getBook(string $slug) {
    $pdo = getConnection();
    $result = $pdo->prepare("SELECT b.id as book_id, b.name as name, b.author as author, b.pages as pages, b.description as description, b.slug as slug, g.path as img FROM books b LEFT JOIN gallery g ON b.photo = g.id WHERE slug = ?", [
        PDO::FETCH_ASSOC
    ]);
    $result->execute([$slug]);
    $book = $result->fetch(PDO::FETCH_ASSOC);
    $images = $pdo->prepare("SELECT * FROM gallery WHERE book_id = ?", [
        PDO::FETCH_ASSOC
    ]);
    $images->execute([$book['book_id']]);
    $book['images'] = $images->fetchAll(PDO::FETCH_ASSOC);
    return $book;
}

function getBooks($search = []) {
    $db = getConnection();
    if(!empty($search))
    {
        $searchParams = [];
        foreach($search as $k => $s)
        {
            if(!empty($s))
            {
                $searchParams[] = "{$k} like \"%{$s}%\"";
            }
        }
        $searchString = implode(' and ', $searchParams);
        $query = $db->query("SELECT * FROM books b LEFT JOIN gallery g ON b.photo = g.id WHERE {$searchString}");
        $query->execute();
        return $query->fetchAll();
    }
    $query = $db->query("SELECT * FROM books b LEFT JOIN gallery g ON b.photo = g.id");
    $query->execute();
    return $query->fetchAll();
}