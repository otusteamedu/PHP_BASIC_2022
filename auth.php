<?php

function IsAuthorized(PDO $pdo):bool
{
    if(isset($_SESSION['is_auth']) and $_SESSION['is_auth'] === 1)
        return true;
    else
        return false;
}

function Authenticate(PDO $pdo, string $login, string $pwd, bool $remember): void
{
    $pwdHash = md5($pwd);
    $userId = GetUserIdByNameAndPwd($pdo, $login, $pwdHash);
    if($userId > 0) {
        $_SESSION['is_auth'] = 1;
        if ($remember) {
            $token = uniqid();
            SetToken($pdo, $userId, $token);
            setcookie('token', $token, time() + 3600);
        }
    }
}

function AuthenticateByToken(PDO $pdo, string $token): void
{
    $userId = GetUserIdByToken($pdo, $token);
    if($userId > 0) {
        $_SESSION['is_auth'] = 1;
    }
}