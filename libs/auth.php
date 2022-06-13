<?php
declare(strict_types=1);

require_once '../libs/db.php';


function isAuthorized():bool
{
    return (isset($_SESSION['is_auth']) and $_SESSION['is_auth'] === 1);
}

function isAdmin():bool
{
    return (isAuthorized() and $_SESSION['is_admin']);
}

function authenticate(string $login, string $pwd, bool $remember): void
{
    $user = getUserByName($login);
    if(!empty($user) and (password_verify($pwd, $user['pwd']))) {
        $_SESSION['is_auth'] = 1;
        $_SESSION['name'] = $user['user_name'];
        $_SESSION['is_admin'] = $user['role'] === '1'?: false;
        if ($remember) {
            $token = uniqid();
            setToken((int)$user['id'], $token);
            setcookie('token', $token, time()+3600);
        }
    }
}

function authenticateByToken(string $token): void
{
    $user = getUserByToken($token);
    if(!empty($user)) {
        $_SESSION['is_auth'] = 1;
        $_SESSION['name'] = $user['user_name'];
        $_SESSION['is_admin'] = $user['role'] === '1'?: false;
    }
}

function logout(): void
{
    setcookie('token', '', time()+3600);
    session_destroy();
}

function checkRegForm(array $formData): array
{
    $login = isset($formData['login']) ? $formData['login'] : '';
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $login)){
        return array('login' => 'Неверный формат почты');
    }

    if(!empty(getUserByName($formData['login']))){
        return array('login' => 'Такой пользователь уже существует.');
    }

    $pwd = isset($formData['pwd']) ? $formData['pwd'] : '';
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,15}$/", $pwd)){
        return array('pwd' => 'Слишком простой пароль. Длина 8-15 символов в верхнем и нижнем регистре, цифр и спецсимволов. ');
    }

    return array();
}

function addNewUser(array $formData): void
{
    $formData['login'] = trim($formData['login']);
    $formData['pwd'] = password_hash(trim($formData['pwd']), PASSWORD_BCRYPT );
    addNewUserInDB($formData);
}
