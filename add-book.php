<?php

require_once 'db.php';
require_once 'upload.php';

$title = htmlspecialchars($_POST['title']);
$author = htmlspecialchars($_POST['author']);
$pages = htmlspecialchars($_POST['pages']);
$year = htmlspecialchars($_POST['year']);
$images = [];

$size = count($_FILES['image']['size']);
$arr = $_FILES['image']['size'];

print_r($size);

if ($arr[0] !== 0) {
    $images = uploadPhotos($size);
}

addBook($title, $author, $pages, $year, $images);

function addBook($title, $author, $pages, $year, $images)
{
    $pdo = connect();

    $sqlQuery_1 = "INSERT INTO book(title, pages, year) VALUES (?,?,?)";

    $result = $pdo->prepare($sqlQuery_1);

    $result->execute([
        $title, $pages, $year,
    ]);

    $id = $pdo->lastInsertId();

    $url = 'pages/' . $id . '.php';

    $sqlQuery_2 = "UPDATE book SET url=? WHERE id=$id";

    $result = $pdo->prepare($sqlQuery_2);

    $result->execute([
        $url,
    ]);

    $sqlQuery_3 = "INSERT INTO author(name) VALUES (?)";

    $result = $pdo->prepare($sqlQuery_3);

    $result->execute([
        $author,
    ]);

    $sqlQuery_4 = "INSERT INTO authors_books(author_id, book_id) VALUES ((SELECT id FROM author WHERE name=?),(SELECT id FROM book WHERE title=?))";

    $result = $pdo->prepare($sqlQuery_4);

    $result->execute([
        $author, $title,
    ]);

    if (count($images) !== 0) {
        foreach ($images as $image) {
            $sqlQuery_5 = "INSERT INTO images(image, book_id) VALUES (?,(SELECT id FROM book WHERE title=?))";

            $result = $pdo->prepare($sqlQuery_5);

            $result->execute([
                $image, $title,
            ]);
        }
    }
    createPage($id);
}

function createPage($id)
{
    $path = 'public/pages/' . $id . '.php';
    $file = fopen($path, "w");
    $content = file_get_contents("page-template.php");
    fwrite($file, $content);
    fclose($file);
    $result = '<div style="margin-top:50px;font-size:22px;
text-align:center;">' . 'Your book have been added!' . '</div>';

    echo ($result);
}

header("Refresh:3; url=public");