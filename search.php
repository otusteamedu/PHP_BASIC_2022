<?php

require_once 'lib.php';

function searchInLibrary()
{
    if (!empty($_POST['text'])) {

        $query = $_POST['text'];

        $data = searchBooks($query);

        return $data;
    }
}
