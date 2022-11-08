<?php

/**
 * Очистить и завершить сессию пользователя на сайте.
 */
function destroySession(): void
{
    startSession();
    // выход из сессии влечёт за собой также сброс remember-токена
    deleteUserRememberToken($_SESSION['user_id']);
    setcookie('remember_token');
    setcookie(session_name(), session_id(), time() - 60 * 60 * 24);
    session_unset();
    session_destroy();
}
