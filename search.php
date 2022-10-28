<?php

require_once 'db.php';

function searchInLibrary()
{

    if (!empty($_POST['text'])) {

        $query = $_POST['text'];

        $data = getBooks();

        $counter = 0;

        foreach ($data as $book) {

            if (str_contains($book['title'], $query) || str_contains($book['authors'], $query)) {

                echo '<tr><th scope="row">' . $book['id'] . '</th><td>' . $book['title'] . '</td><td>' . $book['authors'] . '</td><td>' . $book['pages'] . '</td><td>' . $book['year'] . '</td></tr>';

            } else {
                $counter += 1;
            }
        }
        if ($counter === count($data)) {
            echo '<tr id="nothing"><th scope="row">' . "Nothing found" . '</th></tr>';

        }
    } else {
        header("Location: index.php");
    }
}