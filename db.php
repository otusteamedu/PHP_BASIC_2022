<?php
declare(strict_types=1);

$pdo = InitDBConnection();

function InitDBConnection(): PDO|false
{
    try {
        return new PDO('mysql:host=otus;dbname=library', 'root', '',
            array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        print "Database connection error!";
        return false;
    }
}

function GetAllBooks(PDO $pdo): PDOStatement
{
    return $pdo->query('SELECT isbn, title, issue_year, pages, description FROM books');
}

function GetFilteredBooks(PDO $pdo, array $filter): PDOStatement
{
    $filter = [];
    $books = null;
    $filterQuery = '';
    $availableParams = ['isbn', 'pages', 'issue_year'];
    if(!empty($_GET['authors'])){
        $filterQuery .= 'JOIN books_authors ON books.isbn = books_authors.book_id
                         JOIN authors ON books_authors.author_id = authors.author_id
                         WHERE authors.fio LIKE ? and ';
        $filter[] = "%{$_GET['authors']}%";
    }else{
        $filterQuery .= ' WHERE ';
    }
    if(!empty($_GET['title'])){
        $filterQuery .= 'title LIKE ? and ';
        $filter[] = "%{$_GET['title']}%";
    }
    foreach($_GET as $key => $param){
        if(!empty($param) and (in_array($key, $availableParams))){
            $filter[] = $param;
            $filterQuery .= $key . ' = ? and ';
        }
    }
    if(!empty($filter)){
        $filterQuery = substr($filterQuery, 0, mb_strlen($filterQuery) - 5);
        $books = $pdo->prepare('SELECT books.isbn, books.title, books.issue_year, books.pages, books.description FROM books ' . $filterQuery);
        $books->execute($filter);
    }
    return $books;
}

function GetAuthorsByBook(PDO $pdo, array $book): string
{
    $authorsList = '';
    $authors = $pdo->prepare("SELECT authors.fio FROM authors
                                            INNER JOIN books_authors ON books_authors.author_id = authors.author_id
                                            WHERE books_authors.book_id = ?");
    $authors->execute([$book['isbn']]);
    foreach ($authors as $author){
        $authorsList .= $author['fio'] . '<BR>';
    }
    return $authorsList;
}