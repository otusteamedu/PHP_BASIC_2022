<?php

/**
 * Установить remember-токен для пользователя.
 *
 * @return string remember-токен
 */
function setUserRememberToken(string|int $userId): string
{
    $conn = dbСonnect();
    $remember_token = bin2hex(random_bytes(7));
    $sql = '
        UPDATE `user`
        SET `remember_token` = :remember_token
        WHERE `id` = :userId
    ';
    $pstmt = $conn->prepare($sql);
    $pstmt->bindValue(':remember_token', $remember_token);
    $pstmt->bindValue(':userId', $userId, PDO::PARAM_INT);
    $pstmt->execute();
    
    return $remember_token;
}
