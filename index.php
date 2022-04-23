<?php
    declare(strict_types=1);

    function IsEmptyInputFormData(array $inputData): bool
    {
        foreach ($inputData as $item){
            if(!empty($item)) return false;
        }
        return true;
    }

    $books = null;
    try {
        $pdo = new PDO('mysql:host=otus;dbname=library', 'root', '',
            array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My first html page</title>
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    if(!IsEmptyInputFormData($_GET)){
        $filter = [];
        $filterQuery = '';
        $availableParams = ['isbn', 'pages', 'issue_year'];
        if(!empty($_GET['authors'])){
            $filterQuery .= 'isbn IN
                            (SELECT book_id FROM books_authors
                            INNER JOIN authors ON authors.author_id = books_authors.author_id 
                            WHERE authors.fio LIKE ?) and ';
            $filter[] = "%{$_GET['authors']}%";
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
            $books = $pdo->prepare('SELECT books.isbn, books.title, books.issue_year, books.pages, books.description FROM books WHERE ' . $filterQuery);
            $books->execute($filter);
        }
    }else{
        $books = $pdo->query('SELECT isbn, title, issue_year, pages, description FROM books');
    }
    ?>
    <div class="library">
        <div class="container">
            <?php
            if(empty($books) or $books->rowCount() === 0){
                echo "
                    <div class='row'>
                        <div class='col'>
                            <div class='book'>
                                Нет книг с заданными параметрами
                            </div>
                        </div>
                    </div>
                ";
            }else{
                foreach ($books as $book){
                    $authorsList = '';
                    $authors = $pdo->query("SELECT authors.fio FROM authors
                                            INNER JOIN books_authors ON books_authors.author_id = authors.author_id
                                            WHERE books_authors.book_id = {$book['isbn']}");
                    foreach ($authors as $author){
                        $authorsList .= $author['fio'] . '<BR>';
                    }
                    echo "
                        <div class='row'>
                            <div class='col'>
                                <div class='book'>
                                    <h3>{$book['isbn']} --- {$book['title']} --- {$book['pages']} страниц --- {$book['issue_year']} год выпуска</h3>
                                    <p>
                                        Авторы: {$authorsList}
                                    </p>
                                    <p>
                                        Описание книги:<br>
                                        {$book['description']}
                                    </p>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
            ?>
            <hr>
            <div class="row">
                <div class="search-block">
                    <div class="col">
                        <p>Поиск книг по параметрам:</p>
                        <form action="" method="get" name="searсh_books">
                            <label for="isbn">isbn</label>
                            <input type="search" name="isbn" id="isbn" value="<?= isset($_GET['isbn']) ? $_GET['isbn'] : '' ?>">
                            <label for="title">название</label>
                            <input type="search" name="title" id="title" value="<?= isset($_GET['title']) ? $_GET['title'] : '' ?>">
                            <label for="authors">авторы</label>
                            <input type="search" name="authors" id="authors" value="<?= isset($_GET['authors']) ? $_GET['authors'] : '' ?>">
                            <label for="pages">кол-во страниц</label>
                            <input type="search" name="pages" id="pages" value="<?= isset($_GET['pages']) ? $_GET['pages'] : '' ?>">
                            <label for="issue_year">год выпуска</label>
                            <input type="search" name="issue_year" id="issue_year" value="<?= isset($_GET['issue_year']) ? $_GET['issue_year'] : '' ?>">
                            <input type="submit" value="Поиск">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>