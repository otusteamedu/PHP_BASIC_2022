<?php
declare(strict_types=1);
require_once '../libs/db.php';

function getAllBooks():array
{
    return getAllBooksFromDB();
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

