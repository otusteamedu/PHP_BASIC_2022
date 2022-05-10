<?php
declare(strict_types=1);
require_once 'config.php';

function initDBConnection(string $dsn, string $login, string $pwd = ''): PDO|false
{
    try {
        return new PDO('mysql:host=otus;dbname=library', 'root', '',
            array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
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

function getUserByName(PDO $pdo, string $login): array
{
    $user = $pdo->prepare('SELECT * FROM users WHERE user_name = ?');
    $user->execute([$login]);
    if($user->rowCount() > 0)
        return $user->fetch();
    else
        return [];
}

function getUserIdByToken(PDO $pdo, string $token): int
{
    $user = $pdo->prepare('SELECT id FROM users WHERE token = ?');
    $user->execute([$token]);
    if($user->rowCount() > 0)
        return (int)$user->fetch()['id'];
    else
        return 0;
}

function setToken(PDO $pdo, int $userId, string $token): void
{
    $user = $pdo->prepare('UPDATE users SET token = ? WHERE id = ?');
    $user->execute([$token, $userId]);
}


function GetAllBooks(): PDOStatement
{
    $pdo = getDBConnection();
    return $pdo->query('SELECT isbn, title, issue_year, pages, description FROM books');
}

function GetFilteredBooks(array $filterData): PDOStatement
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
    return $books;
}

function GetAuthorsByBook(array $book): string
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

