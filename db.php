<?php

declare(strict_types=1);

function InitDBConnection(string $dsn, string $login, string $pwd = ''): PDO
{
    try {
        return new PDO($dsn, $login, $pwd,
            array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function GetUserIdByNameAndPwd(PDO $pdo, string $login, string $pwd): int
{
    $user = $pdo->prepare('SELECT id FROM users WHERE user_name = ? AND pwd = ?');
    $user->execute([$login, $pwd]);
    if($user->rowCount() > 0)
        return (int)$user->fetch()['id'];
    else
        return 0;
}

function GetUserIdByToken(PDO$pdo, string $token): int
{
    $user = $pdo->prepare('SELECT id FROM users WHERE token = ?');
    $user->execute([$token]);
    if($user->rowCount() > 0)
        return (int)$user->fetch()['id'];
    else
        return 0;
}

function SetToken(PDO $pdo, int $userId, string $token): void
{
    $user = $pdo->prepare('UPDATE users SET token = ? WHERE id = ?');
    $user->execute([$token, $userId]);
}


