<?php
declare(strict_types=1);
require_once '../libs/db.php';

const MAX_RECORDS_ON_PAGE = 3;
$page = isset($_GET['page'])? (int)$_GET['page'] : 1;

function getAllBooks():array
{
    global $page;
    return getAllBooksFromDB(MAX_RECORDS_ON_PAGE, MAX_RECORDS_ON_PAGE * ($page - 1));
}

function getBooksCount():int
{
    return getBooksCountFromDB();
}

function getFilteredBooks(array $filter):array
{
    return getFilteredBooksFromDB($filter);
}

function addBook(array $bookInfo): void
{
    addBookToDB($bookInfo);
}

function getAuthors(): array
{
    return getAuthorsFromDB();
}

function getGenres(): array
{
    return getGenresFromDB();
}

function deleteBook(string $bookId): void
{
    deleteBookFromDB($bookId);
}

function getBookStatus(string $bookId):int
{
    return getBookStatusFromDB($bookId);
}

function hideBook(string $bookId): void
{
    setBookStatusInDB($bookId, 0);
}

function showBook(string $bookId): void
{
    setBookStatusInDB($bookId, 1);
}

function getBookGallery(string $bookID): string
{
    $images = getBookImagesList($bookID);
    if(isAuthorized()){
        ob_start();
        require_once '../views/lightbox.php';
        require_once '../forms/add-image-form.php';
    }
    $buffer = ob_get_clean();
    return $buffer === false ? '' : $buffer;
}

