<?php

require_once 'db.php';
require_once 'resize.php';

function authenticate($username, $password): bool
{
    $pdo = connect();
    $result = $pdo->prepare('SELECT 1 FROM users where username = ? and password = ?');
    $result->execute([$username, md5($password)]);
    return $result->rowCount() > 0;
}

function getBooks(): array
{
    $pdo = connect();
    $result = $pdo->query(
        "SELECT book.id, book.title, author.name, book.pages, book.year, book.url
FROM author
INNER JOIN authors_books ON authors_books.author_id = author.id
INNER JOIN book ON authors_books.book_id = book.id"
    );
    $result->execute();
    $data = $result->fetchAll();
    return $data;
}

function searchBooks($query): array
{
    $pdo = connect();

    $sqlQuery = "SELECT book.id, book.title, author.name, book.pages, book.year, book.url
FROM author
INNER JOIN authors_books ON authors_books.author_id = author.id
INNER JOIN book ON authors_books.book_id = book.id
WHERE (author.name like ? or book.title like ?)";

    $result = $pdo->prepare($sqlQuery);
    $result->execute([
        "%$query%", "%$query%",
    ]);
    $data = $result->fetchAll();
    return $data;
}

function addBooksButton($user): string
{
    $pdo = connect();
    $result = $pdo->prepare('SELECT is_admin FROM users WHERE username = ?');
    $result->execute([$user]);
    $data = $result->fetchAll();
    $result = '';
    if ($data[0]['is_admin']) {
        $result = 'admin';
    }
    return $result;
}

function createPage($id): string
{
    $path = 'public/pages/' . $id . '.php';
    $file = fopen($path, "w");
    $content = file_get_contents("templates/page-template.php");
    fwrite($file, $content);
    fclose($file);
    $result = 'Your book have been added!';

    return ($result);
}

function uploadPhotos($size): array
{
    $images = [];

    foreach ($_FILES['image']['tmp_name'] as $value) {
        $mimetype = mime_content_type($value);
        if (!in_array($mimetype, array('image/jpeg', 'image/jpg'))) {
            array_push($images, 'type is depricated');
            return $images;
        }
    }

    foreach ($_FILES as $value) {
        for ($i = 0; $i < $size; $i++) {
            $filename = uniqid() . '_' . $value['name'][$i];
            $fullimage = 'public/images/' . $filename;

            move_uploaded_file($value['tmp_name'][$i], $fullimage);

            $miniature = resizeImage($fullimage, 100, 100);
            imagejpeg($miniature, 'public/mini/' . $filename);

            array_push($images, $filename);
        }
    }
    return $images;
}

function addBook($title, $author, $pages, $year, $images): string
{
    $pdo = connect();

    //Add the book to the table 'book'
    $sqlQuery_1 = "INSERT INTO book(title, pages, year) VALUES (?,?,?)";

    $result = $pdo->prepare($sqlQuery_1);

    $result->execute([
        $title, $pages, $year,
    ]);

    //Get the id of the added book and create the url for the books's page based on the book's id
    $id = $pdo->lastInsertId();

    $url = 'pages/' . $id . '.php';

    //Add the url to the table 'book'
    $sqlQuery_2 = "UPDATE book SET url=? WHERE id=$id";

    $result = $pdo->prepare($sqlQuery_2);

    $result->execute([
        $url,
    ]);

    // Check if author already exists
    $sqlQuery_3 = ("SELECT id FROM author WHERE NAME = ?");
    $result = $pdo->prepare($sqlQuery_3);

    $result->execute([
        $author,
    ]);

    $data = $result->fetchAll();

    // if the author already exists
    if (count($data) > 0) {
        $author_id = $data[0]['id'];
        $sqlQuery = "INSERT INTO authors_books(author_id, book_id) VALUES (?, ?)";

        $result = $pdo->prepare($sqlQuery);

        $result->execute([
            $author_id, $id,
        ]);

        //if the author is brand new
    } else {

        $sqlQuery_4 = "INSERT INTO author(name) VALUES (?)";

        $result = $pdo->prepare($sqlQuery_4);

        $result->execute([
            $author,
        ]);

        $sqlQuery_5 = "INSERT INTO authors_books(author_id, book_id) VALUES ((SELECT id FROM author WHERE name=?),(SELECT id FROM book WHERE title=?))";

        $result = $pdo->prepare($sqlQuery_5);

        $result->execute([
            $author, $title,
        ]);
    }

    // if the images were uploaded, add them to the'images' table
    if (count($images) !== 0) {
        foreach ($images as $image) {
            $sqlQuery_6 = "INSERT INTO images(image, book_id) VALUES (?,?)";

            $result = $pdo->prepare($sqlQuery_6);

            $result->execute([
                $image, $id,
            ]);
        }
    }
    // create the page for the added book
    $result = createPage($id);
    return $result;
}

function gallery($id): array
{
    $pdo = connect();

    $result = $pdo->query(
        "SELECT title FROM book WHERE id = $id"
    );
    $result->execute();
    $name = $result->fetchAll();

    echo '<h1 class="book-title">' . $name[0]['title'] . '</h1>';

    $result = $pdo->query(
        "SELECT image FROM images WHERE book_id = $id"
    );
    $result->execute();
    $data = $result->fetchAll();

    $files = [];

    for ($i = 0; $i < sizeof($data); $i++) {
        foreach ($data[$i] as $value) {
            array_push($files, $value);
        }
    }
    return $files;
}
