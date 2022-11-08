<?php

/**
 * Устанавливает переменные сессии аутентифицированного пользователя.
 */
function setUserSession(array $userAuthenticated): void
{
    startSession();
    $_SESSION['user_id'] = $userAuthenticated['id'];
    $_SESSION['display_name'] = $userAuthenticated['display_name'];
    $_SESSION['roles'] = $userAuthenticated['roles'];
    session_regenerate_id();
}
