<?php

require_once APP_PATH . DIRECTORY_SEPARATOR . 'api/getBooks.php';

function getView($books) {
    require_once APP_PATH . DIRECTORY_SEPARATOR . 'views/main.php';
}
$books = getBooks($_GET);
getView($books);