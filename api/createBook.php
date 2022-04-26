<?php
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "/libs/db.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "/libs/functions.php");

function addBook() {
    if ($_SESSION['is_auth']) {
        $bookId = addBookToDB();
        $mainPictureId = addMainPictureToGallery($bookId);
        $images = addImagesToGallery();
        foreach ($images as $image) {
            addImagesToDB($image, $bookId);
        }
        updateBookPhoto($bookId, $mainPictureId);
    }
    Header("Location: /");
}

function addBookToDB(): string {
    $pdo = getConnection();
    if (!empty($_POST)) {
        $pdo->prepare("INSERT INTO books (name, author, pages, photo, description, slug) VALUES (?, ?, ?, ?, ?, ?)")->execute([$_POST['bookname'], $_POST['author'], $_POST['pages'], null, $_POST['description'], translitStr($_POST['bookname'])]);
    }
    return $pdo->lastInsertId();
}

function addMainPictureToGallery($bookId): string {
    if (isset($_FILES['main-picture']) && $_FILES['main-picture']['size'] > 0) {
        $path = resizeImage($_FILES['main-picture']['name'], $_FILES['main-picture']['tmp_name']);
    }
    return addImagesToDB($path, $bookId);
}

function addImagesToGallery(): array {
    $images = [];
    foreach ($_FILES as $file => $params) {
        if($file !=='main-picture' && $params['size'] > 0) $images[] = resizeImage($params['name'], $params['tmp_name']);
    }
    return $images;
}

function updateBookPhoto($bookId, $photoId) {
    $pdo = getConnection();
    $pdo->prepare("UPDATE books SET photo = ? WHERE id = ?")->execute([$photoId, $bookId]);
}

function addImagesToDB(string $image, string $bookId):string {
    $pdo = getConnection();
    $pdo->prepare("INSERT INTO gallery (path, book_id) VALUES (?, ?)")->execute([$image, $bookId]);
    return $pdo->lastInsertId();
}

addBook();