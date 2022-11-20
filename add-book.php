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

if (!empty($images) && $images[0] === 'type is depricated') {
    echo '<div style="margin-top:50px;font-size:22px;color:#f00;
text-align:center;">' . 'Upload an image in jpg/jpeg format, please' . '</div>';
}

$result = addBook($title, $author, $pages, $year, $images);

echo '<div style="margin-top:50px;font-size:22px;
text-align:center;">' . $result . '</div>';

echo '<div style="margin-top:20px;font-size:20px;
text-align:center;"><a href="public/index.php">Return to the library</a></div>';
