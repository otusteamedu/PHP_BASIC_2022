<?php

declare(strict_types=1);

function initDBConnection(string $dsn, string $login, string $pwd = ''): PDO
{
    try {
        return new PDO($dsn, $login, $pwd,
            array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function getUserByName(PDO $pdo, string $login): array
{
    $user = $pdo->prepare('SELECT * FROM users WHERE user_name = ?');
    $user->execute([$login]);
    if($user->rowCount() > 0)
        return $user->fetch();
    else
        return [];
}

function getUserIdByToken(PDO $pdo, string $token): int
{
    $user = $pdo->prepare('SELECT id FROM users WHERE token = ?');
    $user->execute([$token]);
    if($user->rowCount() > 0)
        return (int)$user->fetch()['id'];
    else
        return 0;
}

function setToken(PDO $pdo, int $userId, string $token): void
{
    $user = $pdo->prepare('UPDATE users SET token = ? WHERE id = ?');
    $user->execute([$token, $userId]);
}


