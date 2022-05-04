<?php
require_once 'lib/users.php';

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