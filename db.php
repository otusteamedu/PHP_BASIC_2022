<?php

function db_connect()
{
    return new PDO('mysql:host=localhost;dbname=test', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}

function db_get_all_books($filter = null)
{
    $pdo = db_connect();
    if ($filter === null) {
        $result = $pdo->query('select * from books', PDO::FETCH_ASSOC);
        $result->execute();
    } else {
        $result = $pdo->prepare('select * from books where username like ?', [
            PDO::FETCH_ASSOC
        ]);
        $result->execute(["%{$filter}%"]);
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
