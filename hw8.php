<?php

include ('lib/ini.php');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>
<body>

    <main>

        <?php

        if($isLogined){

            $searchString = '';
            if (isset($_POST['start']) && isset($_POST['search']) && $_POST['search'] != ''){
                $searchString = $_POST['search'];
            }

            if (isset($_POST['add'])){
            		if (addBook_bind($db, $_POST, $isAdmin)){
            			header('Location: /hw8.php');
            		}
            }

//$listBooks = getBooks($db, $searchString);

            $listBooks = getBooks_bind($db, $searchString);



            ?>
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">название</th>
                        <th scope="col">автор</th>
                        <th scope="col">кол-во страниц</th>
                        <th scope="col">жанр</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($listBooks as $k => $book){
                        echo showBookTpl($book, $isAdmin);
                    }
                    ?>
                </tbody>
            </table>
            <form method="POST" action="">
                <div class="form-group">
                    ПОИСК: <input  class="form-control" type="text" name="search" value="<?=$searchString?>" placeholder="Введите название или автора">
                    <input class="btn btn-primary mb-2" type="submit" name="start" value="Искать">
                    <?php 
                    if ($searchString){
                        ?>
                        <input class="btn btn-secondary mb-2" type="submit" name="reset" value="Сбросить">
                        <?
                    }
                    ?>
                </div>
            </form>

            <form method="POST" action="">
                <div class="form-group">
                    <input  class="form-control" type="text" name="name" value="" placeholder="Введите название книги">
                    <input  class="form-control" type="text" name="author_last_name" value="" placeholder="Введите фамилию автора">
                    <input  class="form-control" type="text" name="author_name" value="" placeholder="Введите имя автора">
                    <?php
                    echo showGenreSelect($db);
                    ?>
                    <input  class="form-control" type="text" name="count_pages" value="" placeholder="Введите кол-во страниц">
                    <input class="btn btn-secondary mb-2" type="submit" name="add" value="Добавить">
                </div>
            </form>
            <?php
        } else {
            include ('loginForm.php');
        }
        ?>

    </main>
    <script type="text/javascript">
        $(document).on('click', '.x-remove', function(event) {
            var id = $(this).attr('data-id');
            $.post("ajax.php", { act: "remove_book", id: id},function(data){
                if(data == id){
                    $('#book_' + id).remove();
                }
            });
        });
    </script>
</body>
</html>
