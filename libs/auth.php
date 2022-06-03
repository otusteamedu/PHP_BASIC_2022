<?php
declare(strict_types=1);

use JetBrains\PhpStorm\Pure;

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
            setToken($user['id'], $token);
            setcookie('token', $token, time()+3600);
        }
    }
}

function authenticateByToken(string $token): void
{
    $userId = getUserIdByToken($token);
    if($userId > 0) {
        $_SESSION['is_auth'] = 1;
    }
}

function logout(): void
{
    session_destroy();
}