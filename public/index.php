<?php
    require_once '../db.php';
    $pdo = InitDBConnection();
    if(!$pdo){
        header("HTTP/1.1 503 Database is unavailable");
        exit;
    }
    if(!IsEmptyInputFormData($_GET)){
        $books = GetFilteredBooks($pdo, $_GET);
    }else{
        $books = GetAllBooks($pdo);
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
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
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
                    $authorsList = GetAuthorsByBook($pdo, $book);
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