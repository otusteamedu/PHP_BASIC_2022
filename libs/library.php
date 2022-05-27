<?php
declare(strict_types=1);
require_once '../libs/db.php';

function initLibrary(): PDOStatement
{
    if(isset($_GET['action']) and $_GET['action'] === 'filter_books'){
        return GetFilteredBooks($_POST);
    }else{
        return GetAllBooks();
    }
}

