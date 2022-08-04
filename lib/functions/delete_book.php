<?php

require_once '../db/function_db.php';

if (array_key_exists('book_id', $_POST)) {
    deleteBook($_POST['book_id']);
}

header('Location: /');