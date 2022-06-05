<?php
declare(strict_types=1);
require_once 'config.php';

function initDBConnection(string $dsn, string $login, string $pwd = ''): PDO|false
{
    try {
        return new PDO($dsn, $login, $pwd, array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        print "Database connection error!";
        return false;
    }
}

$config = getConfig()['database'];
if(empty($config)){
    header("HTTP/1.1 503 Config file is unavailable");
    exit;
}

$connection = initDBConnection("{$config['db']}:host={$config['host']};dbname={$config['dbname']}", $config['login'], $config['pwd']);
if(!$connection){
    header("HTTP/1.1 503 Database is unavailable");
    exit;
}

function getDBConnection():PDO
{
    global $connection;
    return $connection;
}

function getUserByName(string $login): array
{
    $pdo = getDBConnection();
    $user = $pdo->prepare('SELECT * FROM users WHERE user_name = ?');
    $user->execute([$login]);
    if($user->rowCount() > 0)
        return $user->fetch();
    else
        return [];
}

function getUserByToken(string $token): array
{
    $pdo = getDBConnection();
    $user = $pdo->prepare('SELECT * FROM users WHERE token = ?');
    $user->execute([$token]);
    if($user->rowCount() > 0)
        return $user->fetch();
    else
        return [];
}

function setToken(int $userId, string $token): void
{
    $pdo = getDBConnection();
    $user = $pdo->prepare('UPDATE users SET token = ? WHERE id = ?');
    $user->execute([$token, $userId]);
}


function getAllBooksFromDB(): array
{
    $pdo = getDBConnection();
    return $pdo->query('SELECT isbn, title, issue_year, pages, description FROM books')->fetchAll();
}

function getFilteredBooksFromDB(array $filterData): array
{
    $filter = [];
    $books = null;
    $filterQuery = '';
    $availableParams = ['isbn', 'pages', 'issue_year'];
    $pdo = getDBConnection();
    if (!empty($filterData['authors'])) {
        $filterQuery .= 'JOIN books_authors ON books.isbn = books_authors.book_id
                         JOIN authors ON books_authors.author_id = authors.author_id
                         WHERE authors.fio LIKE ? and ';
        $filter[] = "%{$filterData['authors']}%";
    } else {
        $filterQuery .= ' WHERE ';
    }
    if (!empty($filterData['title'])) {
        $filterQuery .= 'title LIKE ? and ';
        $filter[] = "%{$filterData['title']}%";
    }
    foreach ($filterData as $key => $param) {
        if (!empty($param) and (in_array($key, $availableParams))) {
            $filter[] = $param;
            $filterQuery .= $key . ' = ? and ';
        }
    }
    if (!empty($filter)) {
        $filterQuery = substr($filterQuery, 0, mb_strlen($filterQuery) - 5);
        $books = $pdo->prepare('SELECT books.isbn, books.title, books.issue_year, books.pages, books.description FROM books ' . $filterQuery);
        $books->execute($filter);
    }
    if($books == null){
        return getAllBooksFromDB();
    }
    return $books->fetchAll();
}

function getAuthorsByBook(array $book): string
{
    $authorsList = '';
    $pdo = getDBConnection();
    $authors = $pdo->prepare("SELECT authors.fio FROM authors
                                            INNER JOIN books_authors ON books_authors.author_id = authors.author_id
                                            WHERE books_authors.book_id = ?");
    $authors->execute([$book['isbn']]);
    foreach ($authors as $author) {
        $authorsList .= $author['fio'] . '<BR>';
    }
    return $authorsList;
}

function bindImageToBook(string $bookId, string $fileName):bool
{
    $pdo = getDBConnection();
    $images = $pdo->prepare("INSERT INTO images(image_name,book_isbn) VALUES(?, ?)");
    return $images->execute([$fileName, $bookId]);

}

function getImagesByBook(string $bookId): array
{
    $pdo = getDBConnection();
    $images = $pdo->prepare("SELECT * FROM images WHERE book_isbn = ?");
    $images->execute([$bookId]);
    return $images->fetchAll();
}


function addBookToDB(array $bookInfo):void
{
    $pdo = getDBConnection();
    try{
        $pdo->beginTransaction();
        $book = $pdo->prepare("INSERT INTO books(isbn, title, genre, pages, issue_year) VALUES(?, ?, ?, ?, ?)");
        $book->execute([$bookInfo['isbn'], $bookInfo['title'], $bookInfo['genre'], $bookInfo['pages'], $bookInfo['issue_year']]);
        $book = $pdo->prepare("INSERT INTO books_authors VALUES(?, ?)");
        $book->execute([$bookInfo['isbn'], $bookInfo['authors']]);
        $pdo->commit();
    }catch (Exception $ex){
        $pdo->rollBack();
    }
}

function getAuthorsFromDB(): array
{
    $pdo = getDBConnection();
    $images = $pdo->prepare("SELECT * FROM authors");
    $images->execute();
    return $images->fetchAll();
}

function getGenresFromDB(): array
{
    $pdo = getDBConnection();
    $images = $pdo->prepare("SELECT * FROM genre");
    $images->execute();
    return $images->fetchAll();
}

function deleteBookFromDB(string $bookId):void
{
    $pdo = getDBConnection();
    try{
        $pdo->beginTransaction();
        $book = $pdo->prepare("DELETE FROM books WHERE isbn = ?");
        $book->execute([$bookId]);
        $book = $pdo->prepare("DELETE FROM books_authors WHERE book_id = ?");
        $book->execute([$bookId]);
        $pdo->commit();
    }catch (Exception $ex){
        $pdo->rollBack();
    }
}