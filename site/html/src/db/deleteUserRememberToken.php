<?php

/**
 * Найти пользователя по remember-токену.
 *
 * @return bool
 */
function deleteUserRememberToken(string|int $userId): bool
{
    $conn = dbСonnect();
    $sql = '
        UPDATE `user`
        SET `remember_token` = NULL
        WHERE `id` = :userId
    ';
    $pstmt = $conn->prepare($sql);
    $pstmt->bindValue(':userId', $userId, PDO::PARAM_INT);

    return $pstmt->execute();
}
