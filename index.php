<?php
session_start();
include_once 'db.php';
include_once 'imgResizer.php';

if(isset($_COOKIE['remember_token']))
{
    $result = authenticate_by_token($_COOKIE['remember_token']);
    if($result !== false)
    {
        $_SESSION['id'] = $result['uid'];
        $_SESSION['username'] = $result['username'];
    }
}


//==================================== аутентификация по логину и паролю ===============================

if (!empty($_GET) && $_GET['action'] === 'auth' && !empty($_POST) && $_POST['form_token']='afg37rv32'){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $userInfo = userAuth($username, $password, isset($_POST['remember_me']));
        if (isset($userInfo['uid'])){
            $_SESSION['id'] = $userInfo['uid'];
            $_SESSION['username'] = $userInfo['username'];
            if(isset($_POST['remember_me']))
            {
                setcookie('remember_token', $userInfo['token'], time()+3600);
            }
        }

    }

//==================================== Загрузка изображений =============================================

    if (isset($_POST) && !empty($_FILES['picture']['size']) && $_POST['form_token'] !== 'afg37rv32')
        die('Токен неверный!!!');

    // папка с изображениями
    $pictureDir = 'gallery/';
    if (!is_dir($pictureDir))
        mkdir($pictureDir);

    // папка с изображениями уменьшенных копий
    $pictureDirMin = 'gallery/min/';
    if (!is_dir($pictureDirMin))
        mkdir($pictureDirMin);

    $pictures = scandir($pictureDirMin);

    if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0){
       
       $allowedExtensions = ['jpg','jpeg','png','gif'];
       $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
       if(in_array($ext, $allowedExtensions))
         {
            $uniq_name = uniqid().$_FILES['picture']['name'];
            if(move_uploaded_file($_FILES['picture']['tmp_name'],'gallery/'.$uniq_name))
            {
                SetImgSize('gallery/'.$uniq_name, 350, 240, 1, 'gallery/min/'.$uniq_name);
                unset($uniq_name);
            } else die('Изображение не загружено!!!');
         }
        $pictures = scandir($pictureDirMin);
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="services">
        <div class="container">
            <div class="block-main-caption">
                <h1 class="main-caption">Фотогаллерея
                    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) echo (', пользователь: '.$_SESSION['username'])?>
                </h1>
            </div>

            <div class="flex-container">
                <?php
                if (isset($pictures)) {
                    foreach ($pictures as $picture) 
                    {
                        if ($picture !== '.' && $picture !== '..')
                        { 
                ?>
                            <div class="item">
                                <a href="<?php echo($pictureDir.$picture); ?>" target="_blank" >
                                    <img class="image-gallery" src="<?php echo($pictureDirMin.$picture); ?>" alt="<?php echo($picture); ?>"/>
                                </a>    
                            </div>
                <?php
                        }
                    }
                }

                ?>

                <?php if (!isset($_SESSION['id'])) {?>
                    <div>
                        <form action="index.php?action=auth" method="post">
                            <label for="username">Имя пользователя:</label>
                            <input style="width: 45%" type="text" name="username"/>

                            <label for="password">Пароль:</label>
                            <input style="width: 45%" type="password" name="password"/>

                            <label for="remember_me">Запомнить меня:</label>
                            <input type="checkbox" name="remember_me" /><br>

                            <input type="hidden" name="form_token" value="afg37rv32"/>

                            <input type="submit" value="Вход">
                        </form>
                    </div>
                <?php }?>

                <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {?>
                    <div class="block-button">
                        <form action="index.php" method="post" enctype="multipart/form-data">
                            <input type="file" id="idPicture" name="picture"/>
                            <input type="hidden" name="form_token" value="afg37rv32"/>
                            <input type="submit" value="Отправить!">
                        </form>
                    </div>
                <?php }?>

        </div>
    </div>
    <div>
        <p style="text-align: center;">All rights reserved &copy; 2001 - <?php echo(date('Y'));?>
        </p>
    </div>
</body>
</html>