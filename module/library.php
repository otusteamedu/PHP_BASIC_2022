<?php
require_once '../libs/library.php';

if(isset($_GET['book_id'])){
    $books = GetFilteredBooks(array('isbn' => $_GET['book_id']));
}
else {
    $books = initLibrary();
}
?>
<div class="library">
    <div class="container">
        <?php
        if(empty($books) or $books->rowCount() === 0){
            ?>
            <div class='row'>
                <div class='col'>
                    <div class='book'>
                        Нет книг с заданными параметрами
                    </div>
                </div>
            </div>
            <?php
        }else{
            foreach ($books as $book){
                $authorsList = GetAuthorsByBook($book);
                ?>
                <div class='row'>
                    <div class='col'>
                        <div class='book'>
                            <h3><?php echo "{$book['isbn']} --- {$book['title']} --- {$book['pages']} страниц --- {$book['issue_year']} год выпуска"; ?></h3>
                            <p>
                                Авторы: <?= $authorsList?>
                            </p>
                            <p>
                                Описание книги:<br>
                                <?= $book['description']?>
                            </p>
                            <p>
                                <?php if(!isset($_GET['book_id'])){
                                    echo "<a href='index.php?book_id={$book['isbn']}'>Подробнее...</a>";
                                }else{
                                    require_once '../module/gallery.php';
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <?php if(!isset($_GET['book_id'])){ ?>
        <hr>
        <div class="row">
            <div class="search-block">
                <div class="col">
                    <p>Поиск книг по параметрам:</p>
                    <form action="./index.php?action=filter_books" method="post" name="searсh_books">
                        <label for="isbn">isbn</label>
                        <input type="search" name="isbn" id="isbn" value="<?= isset($_POST['isbn']) ? $_POST['isbn'] : '' ?>">
                        <label for="title">название</label>
                        <input type="search" name="title" id="title" value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>">
                        <label for="authors">авторы</label>
                        <input type="search" name="authors" id="authors" value="<?= isset($_POST['authors']) ? $_POST['authors'] : '' ?>">
                        <label for="pages">кол-во страниц</label>
                        <input type="search" name="pages" id="pages" value="<?= isset($_POST['pages']) ? $_POST['pages'] : '' ?>">
                        <label for="issue_year">год выпуска</label>
                        <input type="search" name="issue_year" id="issue_year" value="<?= isset($_POST['issue_year']) ? $_POST['issue_year'] : '' ?>">
                        <input type="submit" value="Поиск">
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>