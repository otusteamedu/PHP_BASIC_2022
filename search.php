<?php

require_once 'db.php';

function searchInLibrary()
{
    if (!empty($_POST['text'])) {

        $query = $_POST['text'];

        $data = searchBooks($query);

        return $data;
    }
}