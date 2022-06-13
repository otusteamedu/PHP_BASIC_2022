<?php
require_once '../libs/library.php';
require_once '../libs/auth.php';
require_once '../libs/img.php';
require_once '../libs/library-actions.php';

?>
<div class="library">
    <div class="container">
        <?php
        if(isset($_GET['book_id'])){
            echo "<p><a href='index.php'>Назад</a></p>";
        }
        ?>

        <?php
        if(empty($books)){
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
                if(!isAdmin() and $book['status'] == 0) continue;
                $authorsList = getAuthorsByBook($book);
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
                                    echo "<a href='index.php?action=show&book_id={$book['isbn']}'>Подробнее...</a>";
                                    if(isAdmin()){
                                        echo " &nbsp; &nbsp;<a href='index.php?action=delete&book_id={$book['isbn']}'>Удалить</a>";
                                        if(getBookStatus($book['isbn']) === 1)
                                            echo " &nbsp; &nbsp;<a href='index.php?action=hide&book_id={$book['isbn']}'>Спрятать</a>";
                                        else
                                            echo " &nbsp; &nbsp;<a href='index.php?action=show_book&book_id={$book['isbn']}'>Показать</a>";
                                    }
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
        <?php
        if(!isset($_GET['action']))
            include_once "../views/paginator.php"
        ?>
        <?php if(!isset($_GET['book_id'])){ ?>
        <hr>
        <div class="container">
            <div class="row">
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
                <?php if(isAdmin()){ ?>
                <div class="col">
                    <p>Добавить книгу:</p>
                    <form action="./index.php?action=add_book" method="post">
                        <label for="isbn">isbn</label>
                        <input type="text" name="isbn" id="isbn" maxlength="13">
                        <label for="title">название</label>
                        <input type="text" name="title" id="title">
                        <label for="authors">авторы</label>
                        <select name="authors">
                        <?php
                        $authors = getAuthors();
                        foreach ($authors as $author){
                            echo "<option value='{$author['author_id']}'>{$author['fio']}</option>";
                        }
                        ?>
                        </select>
                        <label for="genre">авторы</label>
                        <select name="genre">
                            <?php
                            $genres = getGenres();
                            foreach ($genres as $genre){
                                echo "<option value='{$genre['genre_id']}'>{$genre['description']}</option>";
                            }
                            ?>
                        </select>
                        <label for="pages">кол-во страниц</label>
                        <input type="text" name="pages" id="pages">
                        <label for="issue_year">год выпуска</label>
                        <input type="text" name="issue_year" id="issue_year">
                        <input type="submit" value="Добавить">
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>