<?php

require_once('config.php');

function connect()
{
    return new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USERNAME, PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}


/* Функция записи токена */
function setRememberToken(int $user_id, string $token)
{
    $db = connect();
    $result = $db->prepare('UPDATE users SET remember_token = :token WHERE id = :id');
    $result->bindParam(':token', $token, PDO::PARAM_STR);
    $result->bindParam(':id', $user_id, PDO::PARAM_INT);
    $result->execute();
}

/* Функция рестора сессии */
function getUserDataByToken(string $token)
{
    $db = connect();
    $result = $db->prepare('SELECT username, id, is_admin FROM users WHERE remember_token = :token');
    $result->bindParam(':token', $token, PDO::PARAM_STR);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}

/* Функция вывода списка книг */
function getBookList()
{
    $db = connect();
    $result = $db->prepare('SELECT * FROM `library`');
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

/* Функция вывода инфы о выбранной книге */
function getBookById($id)
{
    $db = connect();
    $result = $db->prepare('SELECT * FROM `library` WHERE id = :id');
    $result->bindParam('id', $id);
    $result->execute();
    return $result->fetch(PDO::FETCH_ASSOC);
}

/* Функция добавления книги */
function addBook($book)
{
    if (!empty($_POST['bookname'] && $_POST['author'] && $_POST['page_count'] && $_POST['year_of_issue'])) {
        $db = connect();
        $bookname = $book['bookname'];
        $author = $book['author'];
        $page_count = $book['page_count'];
        $year_of_issue = $book['year_of_issue'];
        $result = $db->prepare('INSERT INTO `library` 
    (`bookname`, `author`, `page_count`, `year_of_issue`)
    VALUES (:bookname, :author, :page_count, :year_of_issue)');
        $result->bindParam('bookname', $bookname);
        $result->bindParam('author', $author);
        $result->bindParam('page_count', $page_count);
        $result->bindParam('year_of_issue', $year_of_issue);
        $result->execute();
        $id = $db->lastInsertId();
    }
    return ($id);
}

/* Функция удаления книги */
function deleteBook($id)
{
    $db = connect();
    $result = $db->prepare('DELETE FROM `library` WHERE id = :id');
    $result->bindParam('id', $id);
    return $result->execute();
}

/* Функция добавления изображения */
function addPicture($bookId,$name)
{
    $db = connect();
    $number_id = $bookId;
    $namepic = $name;
    $result = $db->prepare('INSERT INTO `illustrations`
    (`book_id`, `link`)
    VALUES (:book_id, :link)');
    $result->bindParam('book_id', $number_id);
    $result->bindParam('link', $namepic);
    return $result->execute();
}

/* Функция получения изображения по id книги */
function getPictureById($id)
{
    $db = connect();
    $result = $db->prepare('SELECT link FROM `illustrations` WHERE book_id = :book_id');
    $result->bindParam('book_id', $id);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);

}
