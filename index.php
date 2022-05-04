 <?php
    session_start();
    require_once 'lib/auth.php';
    require_once 'lib/users.php';
    require_once 'lib/db.php';
    require_once 'lib/book_post.php';
    
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTUS Lib</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
</head>


<?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']) { ?>
    <?php echo "Привет, {$_SESSION['username']} (id#{$_SESSION['user_id']})<br> Можешь добавлять новые книги"; ?>
    <h2>Форма загрузки новых книг с описанием</h2>
    <form action="/index.php" method="post" enctype="multipart/form-data">
        <p><label for="book_name">Название книги:<br>
        <input type="text" name="book_name"="30"></label></p>
        <p><label for="book_author">Автор:<br>
        <input type="text" name="book_author" size="30"></label></p>
        <p><label for="book_page">Количество страниц:<br>
        <input type="text" name="book_page" size="5"></label></p>
        <p><label for="book_created_dt">Год написания:<br>
        <input type="text" name="book_created_dt"size="4"></label></p><br>
        <p><input type="file" name="picture" accept=".jpg,.jpeg" />
        <input type="hidden" name="form_token" value="afg37rv32"/>
        <input type="submit" value="Добавить новую книгу!"></p>
    </form>
<?php } ?>
<?php if(isset($_SESSION['is_auth']) && $_SESSION['is_auth']): ?>
    <form action="/index.php" method="post" enctype="multipart/form-data">
    <button type="submit" name="logout" value="logout">Выйти</button>
    </form>
    <h2>Библиотека:</h2>
    <body>
    <table class="table">
    <tbody>
    <thead>
        <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        </tr>
    </thead>
    <tbody>
    <script src="js/lightbox-plus-jquery.js"></script>
    </body>
    <?php
    $data = db_get_all_bookinfo();
    foreach ($data as $otus_albom) {
        echo "<tr><th><a href=book.php?book_id={$otus_albom['book_id']}><img width=150px src=\"/images/{$otus_albom['picture']}\" /></a></th>  
        <th>{$otus_albom['book_name']}</th>  
        <th>{$otus_albom['book_author']}</th> 
        <th><a href=book_page.php?book_id={$otus_albom['book_id']}>Подробнее</a></th> ";
        if(!empty($_SESSION['is_admin']) && $_SESSION['is_admin'])
        {
            echo "<th><a href=\"/index.php?action=delete&book_id={$otus_albom['book_id']}\">Удалить</a> </th></tr>";
        }
    }
    ?>

<?php else: ?>
    <form action="/index.php?action=login" method="post">
        <label for="user">Имя пользователя:</label>
        <input type="text" name="username" /><br>
        <label for="password">Пароль:</label>
        <input type="text" name="password" /><br>
        <label for="remember_me">Запомнить меня:</label>
        <input type="checkbox" name="remember_me" /><br>
        <button type="submit" name="register" value="register">Регистрация</button>
        <input type="submit" value="Войти">
    </form>
<?php endif; ?>



    

