<?php
declare(strict_types=1);
require_once 'database.php';
require_once 'users.php';

function getBookCount() {
    $db = getConnection();
    $query = $db->query("select count(*) as count from books");
    $query->execute();
    return $query->fetch()[0];
}

function getBooks($page = 0, $search = '') {
    if ($page > 0)
        $page = $page - 1;
    $db = getConnection();

    if (!empty($search)){
        $search = htmlspecialchars($search);

        $query = $db->query("SELECT books.uid, books.book_name, books.book_about, books.author_name, books.pages_count,
            books.years_issue, books.price, image_cover.cover_img_mini, image_cover.cover_img 
        FROM books
        INNER JOIN image_cover ON (books.uid = image_cover.book_id)
        WHERE books.book_name like '%{$search}%' or books.author_name like '%{$search}%'
        ORDER BY
            books.book_name
        LIMIT 6 OFFSET ".($page * 6));
        $query->execute();
        return $query->fetchAll();
    }

    $query = $db->query("SELECT books.uid, books.book_name, books.book_about, books.author_name, books.pages_count,
            books.years_issue, books.price, image_cover.cover_img_mini, image_cover.cover_img 
        FROM books
        INNER JOIN image_cover ON (books.uid = image_cover.book_id)
        ORDER BY
            books.book_name
        LIMIT 6 OFFSET ".($page * 6));
    $query->execute();
    return $query->fetchAll();
}

function addBook($author_name, $book_name, $book_about, $pages_count, $years_issue, $price, $cover_img, $cover_img_mini) {
    $db = getConnection();
    $query = $db->prepare("insert into books(author_name, book_name, book_about, pages_count, years_issue, price) values(?,?,?,?,?,?)");
    $query->execute([$author_name, $book_name, $book_about, $pages_count, $years_issue, $price]);

    $book_id = $db->lastInsertId();

    $query = $db->prepare("insert into image_cover(book_id, cover_img, cover_img_mini) values(?,?,?)");
    $query->execute([$book_id, $cover_img, $cover_img_mini]);

    return $query->fetchAll();
}

function deleteBook($bookId) {
    if(!isAdmin())
        return;
    $db = getConnection();
    $query = $db->prepare("delete from books where uid = ?");
    $query->execute([$bookId]);
}
