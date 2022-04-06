<?php

function db_connect()
{
    return new PDO('mysql:host=localhost;dbname=test', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}

function db_get_all_books($filterName = null, $filterAuthor = null)
{
    $pdo = db_connect();
    if ($filterName === null && $filterAuthor === null) {
        $result = $pdo->query('select * from books', PDO::FETCH_ASSOC);
        $result->execute();
    } elseif ($filterName !== null && $filterAuthor === null) {
        $result = $pdo->prepare('select * from books where name like ?', [
            PDO::FETCH_ASSOC
        ]);
        $result->execute(["%{$filterName}%"]);
    } elseif ($filterName == null && $filterAuthor !== null) {
        $result = $pdo->prepare('select * from books where authors like ?', [
            PDO::FETCH_ASSOC
        ]);
        $result->execute(["%{$filterAuthor}%"]);
    } else {
        $result = $pdo->prepare('select * from books where name like ? and authors like ?', [
            PDO::FETCH_ASSOC
        ]);
        $result->execute(["%{$filterName}%","%{$filterAuthor}%"]);
    }
    return $result->fetchAll();
}

function db_add_book($name, $authors, $pages, $year)
{
    $pdo = db_connect();
    $result = $pdo->prepare('insert into books(name, authors, pages, year) values(?,?,?,?)');
    $result->execute([$name, $authors, $pages, $year]);
}

function db_delete_book($book_id)
{
    $pdo = db_connect();
    $result = $pdo->prepare('delete from books where id = ?');
    $result->execute([$book_id]);
}
