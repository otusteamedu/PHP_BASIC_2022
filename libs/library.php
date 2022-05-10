<?php
declare(strict_types=1);

function initLibrary(): PDOStatement
{
    if(isset($_GET['action']) and $_GET['action'] === 'filter_books'){
        return GetFilteredBooks($_POST);
    }else{
        return GetAllBooks();
    }
}

