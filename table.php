<?php

require_once 'db.php';

// $db = connect();
// var_dump($db);
// var_dump(getBooks());

function createTable()
{
    foreach (getBooks() as $book) {
        echo '<tr><th scope="row">' . $book['id'] . '</th><td>' . $book['title'] . '</td><td>' . $book['authors'] . '</td><td>' . $book['pages'] . '</td><td>' . $book['year'] . '</td></tr>';
    }
}