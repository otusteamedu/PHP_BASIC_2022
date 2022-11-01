<?php
    $title = 'Библиотека';
    require 'head.php';
    
    // на этапе сборки compose-проекта в php.ini прописывается include_path = ".:/var/www/html/src"
    require 'model/getBooks.php';
    require 'model/buildBookRows.php';
    require 'model/getFormData.php';
    
    $books = getBooks();
    $booksTableRows = buildBookRows($books);
    $searchString = getFormData()['search'] ?: '';
?>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
            <a href="/" class="navbar-brand"> <img src="/images/home.png"> </a>
            <h1 class="navbar-text"> Библиотека </h1>
            <div class="navbar-text">&nbsp;</div>
        </nav>
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div>
                        <form method="post">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" value="<?=$searchString;?>" placeholder="Поиск по названию или автору (введите слово полностью)">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-info">Найти</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Название</th>
                                <th>Авторы</th>
                                <th>Год выхода</th>
                                <th>Число страниц</th>
                            </tr>
                        </thead>
                        <tbody><?=$booksTableRows;?></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer>
       <?php include 'foot.php'; ?>
    </footer>
</body>

</html>
