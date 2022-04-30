 <?php
    session_start();
    include_once 'db.php';

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: index.php' );
    }

    if(isset($_COOKIE['remember_token']))
    {
        $result = authenticate_by_token($_COOKIE['remember_token']);
        if($result !== false)
        {
            $_SESSION['is_auth'] = true;
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
        }
    }

    if (isset($_POST['register'])) {
        $password = $_POST['password'];
        $hash_paswd = password_hash($password, PASSWORD_BCRYPT);
        $result = db_add_newuser($_POST['username'], $hash_paswd, $_POST['password'], isset($_POST['remember_me']));
    }

    if(!empty($_GET['action']) && $_GET['action'] === 'login')
    {
        $password = $_POST['password'];
        $result = authenticate($_POST['username'], $_POST['password'], isset($_POST['remember_me']));
        if($result !== false)
        {
            $_SESSION['is_auth'] = true;
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['is_admin'] = intval($result['is_admin']) === 1;
            if(isset($_POST['remember_me']))
            {
                setcookie('remember_token', $result['token'], time()+3600);
            }
        } else {
            echo '<p class="error">Неверные пароль или имя пользователя!</p>';
        }
    }
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

<?php
    if(!empty($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['book_id']))
    {
        db_delete_book($_GET['book_id']);
    }

    if(!empty($_POST['form_token']) && $_POST['form_token'] !== 'afg37rv32')
    {
        die('WRONG TOKEN! CSRF ATTACK!');
    }

    if(!empty($_POST['user_id']))
    {
        $user = $_POST['user_id'];
        if(!preg_match('/^[a-zA-Z0-9]+$/',$user))
            echo '<BR>Username incorrect!<BR>';
    }

    if(!empty($_POST['book_name']) && !empty($_POST['book_author']))
    {
        $secure_book_name = htmlspecialchars($_POST['book_name']);
        $secure_book_author = htmlspecialchars($_POST['book_author']);
    
        if(!empty($_POST['book_created_dt']))
        {
            $book_created_dt = $_POST['book_created_dt'];
            if(!preg_match('/^[0-9]{4}/',$book_created_dt))
                echo '<BR>Недопустимый формат<BR>';
        }

        if(!empty($_POST['book_page']))
        {
            $book_page = $_POST['book_page'];
            if(!preg_match('/^[0-9]{4}/',$book_page))
                echo '<BR>Недопустимый формат<BR>';
        }

        if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0)
        {
            $allowedExtensions = ['jpg','jpeg','png'];
            $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            if(in_array($ext, $allowedExtensions))
            {
                $uniq_name = uniqid().$_FILES['picture']['name'];
                $min_uniq_name = 'min-'.$uniq_name;
                if (!getimagesize($_FILES['picture']['tmp_name']))
                {
                    die('<BR>А где картинка?? А я Вам доверял....<BR>');
                }
            
                if(move_uploaded_file($_FILES['picture']['tmp_name'],'images/'.$uniq_name))
                {
                    $percent = 0.5;
                    header('Content-Type: image/jpeg');
                    list($width, $height) = getimagesize('images/'.$uniq_name);
                    $new_width = round($width * $percent);
                    $new_height = round($height * $percent);
                    $image_p = imagecreatetruecolor($new_width, $new_height);
                    $min_uniq_name_image = imagecreatefromjpeg('images/'.$uniq_name);
                    imagecopyresampled($image_p, $min_uniq_name_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                    imagejpeg($image_p, 'images/'.$min_uniq_name);
                    imagedestroy($image_p);
                } else
                {
                    unset($uniq_name);
                }
            }
        }
        $element = [
            'user_id' => $_SESSION['user_id'],
            'book_name' => $secure_book_name,
            'book_author' => $secure_book_author,
            'book_page'=> $book_page,
            'book_created_dt'=> $book_created_dt,

        ];
        if(isset($min_uniq_name))
        {
            $element['picture'] = $min_uniq_name;
            $element['picture_full'] = $uniq_name;
        }

        $result = db_add_book($element['book_name'], $element['book_author'], $element['book_page'], $element['book_created_dt']);
        if($result !== false) 
        {
            $_SESSION['book_id'] = $result['book_id'];
            $element['book_id'] = $result['book_id'];
            db_add_images($element['user_id'], $element['book_id'], $element['picture'], $element['picture_full']);
        }
    }
?>
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
        <th><a href=book.php?book_id={$otus_albom['book_id']}>Подробнее</a></th> ";
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



    

