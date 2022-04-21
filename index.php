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
            if(isset($_POST['remember_me']))
            {
                setcookie('remember_token', $result['token'], time()+3600);
            }
        } else {
            echo '<p class="error">Неверные пароль или имя пользователя!</p>';
        }
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTUS Photo</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<?php
if(!empty($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['message_id']))
    {
        db_delete_message($_GET['message_id']);
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

    if(!empty($_POST['message']))
    {
        $secure_message = htmlspecialchars($_POST['message']);
        if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0)
        {
            $allowedExtensions = ['jpg','jpeg','png'];
            $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            if(in_array($ext, $allowedExtensions))
            {
                $uniq_name = uniqid().$_FILES['picture']['name'];
                $min_uniq_name = 'min-'.$uniq_name;
                if (!getimagesize($_FILES['picture']['tmp_name'])) {
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
                   // imagejpeg($image_p, NULL, 75);
                    imagedestroy($image_p);
                } else {
                    unset($uniq_name);
                }
            }
        }
        $element = [
            'user_id' => isset($_POST['user_id']),
            'message' => $secure_message,
        ];
        if(isset($min_uniq_name))
        {
            $element['picture'] = $min_uniq_name;
            $element['picture_full'] = $uniq_name;
        }
        db_add_message($element['user_id'], $element['message'], $element['picture'], $element['picture_full']);
    }

?>
<?php if(isset($_SESSION['is_auth']) && $_SESSION['is_auth']): ?>
<?php echo "Привет, {$_SESSION['username']} (id#{$_SESSION['user_id']})<br> Можешь редактировать альбом"; ?>
<h2>Форма загрузки новых картинок с описанием</h2>
<form action="/index.php" method="post" enctype="multipart/form-data">
    <label for="user_id">ID пользователя:</label>
    <input type="text" name="user_id" /><br>
    <label for="message">Название картинки:</label>
    <textarea name="message"></textarea><br>
    <input type="file" name="picture" accept=".jpg,.jpeg" />
    <input type="hidden" name="form_token" value="afg37rv32"/>
    <input type="submit" value="Отправить!">
    <button type="submit" name="logout" value="logout">Выйти</button>
</form>
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


<h2>Фотогаллерея:</h2>
<body>
<table class="table">
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
<?php
    $data = db_get_all_messages();
    foreach ($data as $otus_albom) {
        echo "<tr><th><a href=\"/images/{$otus_albom['picture_full']}\"><img width=150px src=\"/images/{$otus_albom['picture']}\" /></a></th>  
        <th>{$otus_albom['username']}</th>  
        <th>{$otus_albom['message']}</th> 
        <th>{$otus_albom['created_at']}</th> 
        <th><a href=/index.php?action=delete&message_id={$otus_albom['id']}>Удалить</a></th></tr> ";
    }
?>
