<?php

/**
 * Найти пользователя по логину.
 *
 * @return array
 */
function findUserByLogin(string $login): array
{
    $conn = dbСonnect();
    $pstmt = $conn->prepare('SELECT * FROM `user` WHERE `login` = :login');
    $pstmt->bindValue(':login', $login);
    $pstmt->execute();
    $users = $pstmt->fetchAll(PDO::FETCH_ASSOC);

    return $users[0] ?? [];
}
