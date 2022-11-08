<?php

/**
 * Найти пользователя по remember-токену.
 *
 * @return array
 */
function findUserByRememberToken(string $rememberToken): array
{
    $conn = dbСonnect();
    $pstmt = $conn->prepare('SELECT * FROM `user` WHERE `remember_token` = :remember_token');
    $pstmt->bindValue(':remember_token', $rememberToken);
    $pstmt->execute();
    $users = $pstmt->fetchAll(PDO::FETCH_ASSOC);

    return $users[0] ?? [];
}
