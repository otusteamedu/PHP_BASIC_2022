<?php

require_once APP_PATH . DIRECTORY_SEPARATOR . 'api/getBooks.php';

function getView(array $book) {
    require_once APP_PATH . DIRECTORY_SEPARATOR . 'views/book.php';
}
$slug = $_GET['book'];
$book = getBook($slug);
getView($book);