<?php

require_once 'lib.php';

$title = htmlspecialchars($_POST['title']);
$author = htmlspecialchars($_POST['author']);
$pages = htmlspecialchars($_POST['pages']);
$year = htmlspecialchars($_POST['year']);
$images = [];

$size = count($_FILES['image']['size']);
$arr = $_FILES['image']['size'];

if ($arr[0] !== 0) {
    $images = uploadPhotos($size);
}

addBook($title, $author, $pages, $year, $images);

header("Refresh:3; url=public");
