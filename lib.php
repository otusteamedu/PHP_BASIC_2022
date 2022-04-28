<?php
require_once 'db.php';

$books = InitLibrary();

function InitLibrary(): PDOStatement
{
    $pdo = InitDBConnection();
    if(!$pdo){
        header("HTTP/1.1 503 Database is unavailable");
        exit;
    }
    if(!IsEmptyInputFormData($_GET)){
        return GetFilteredBooks($pdo, $_GET);
    }else{
        return GetAllBooks($pdo);
    }
}

function IsEmptyInputFormData(array $inputData): bool
{
    foreach ($inputData as $item){
        if(!empty($item)) return false;
    }
    return true;
}
