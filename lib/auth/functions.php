<?php

require_once'../../db/function_db.php';

function login()
{

    if (!checkToken()) {
        auth();
    }
}

/* Функция авторизации*/
function authorize(string $user, string $password): array
{
    $db = connect();
    $result = $db->prepare('SELECT username, id, is_admin from users where username = :username and password = :password');
    $result->bindParam(':username', $user, PDO::PARAM_STR);
    $result->bindParam(':password', md5($password), PDO::PARAM_STR);
    $result->execute();
    if ($result->rowCount() == 0) {
        return [];
    }
    return $result->fetch(PDO::FETCH_ASSOC);
}

/* Функция проверки токена */
function checkToken()
{

    if (!empty($_COOKIE['remember_token'])) {
        $userData = getUserDataByToken($_COOKIE['remember_token']);
        if (empty($userData['id'])) {
            return false;
        }
        $_SESSION['user_id'] = intval($userData['id']);
        $_SESSION['username'] = $userData['username'];
        $_SESSION['is_admin'] = boolval($userData['is_admin']);

        return true;
    }

    return false;
}

/* Функция аутентификации */
function auth()
{
    if (!empty($_POST['action']) && $_POST['action'] === 'auth') {
        $authResult = authorize($_POST['login'], $_POST['password']);

        if (empty($authResult)) {
            $_SESSION['error'] = 'Неправильное имя пользователя или пароль!';
        } else {
            $_SESSION['user_id'] = intval($authResult['id']);
            $_SESSION['username'] = $authResult['username'];
            $_SESSION['is_admin'] = boolval($authResult['is_admin']);
            if ($_POST['remember_me'] === 'on') {
                $token = uniqid();
                setRememberToken($_SESSION['user_id'], $token);
                setcookie('remember_token', $token, time() + 3600 * 24 * 30 * 6, '/');
            }
        }
        header('Location: /');
    }
}

/* Функция, что б разлогиниться */
function logout()
{
    if (!empty($_COOKIE['remember_token'])) {
        setcookie('remember_token', '', -1);
    }
    header('Location: /');
}

