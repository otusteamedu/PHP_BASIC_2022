<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "libs/db.php");

function getBook(string $slug) {
    $pdo = getConnection();
    $result = $pdo->prepare("SELECT b.id as book_id, b.name as name, b.author as author, b.pages as pages, b.description as description, b.slug as slug, g.path as img FROM books b LEFT JOIN gallery g ON b.photo = g.id WHERE slug = ?", [
        PDO::FETCH_ASSOC
    ]);
    $result->execute([$slug]);
    $books = $result->fetch(PDO::FETCH_ASSOC);
    $images = $pdo->prepare("SELECT * FROM gallery WHERE book_id = ?", [
        PDO::FETCH_ASSOC
    ]);
    echo $books['book_id'];
    $images->execute([$books['book_id']]);
    $books['images'] = $images->fetchAll(PDO::FETCH_ASSOC);
    return $books;
}

function getBooks() {
    $pdo = getConnection();
    $result = $pdo->prepare("SELECT * FROM books b LEFT JOIN gallery g ON b.photo = g.id", [
        PDO::FETCH_ASSOC
    ]);
    $result->execute();
    return $result->fetch(PDO::FETCH_ASSOC);
}