<?php
declare(strict_types=1);

function isAuthorized():bool
{
    return (isset($_SESSION['is_auth']) and $_SESSION['is_auth'] === 1);
}

function authenticate(PDO $pdo, string $login, string $pwd, bool $remember): void
{
    $user = getUserByName($pdo, $login);
    if(!empty($user) and (password_verify($pwd, $user['pwd']))) {
        $_SESSION['is_auth'] = 1;
        if ($remember) {
            $token = uniqid();
            setToken($pdo, $user['id'], $token);
            setcookie('token', $token, time()+3600);
        }
    }
}

function authenticateByToken(PDO $pdo, string $token): void
{
    $userId = getUserIdByToken($pdo, $token);
    if($userId > 0) {
        $_SESSION['is_auth'] = 1;
    }
}

function logout(): void
{
    session_destroy();
}