<?php

/**
 * Аутентификация пользователя по remember-токену.
 *
 * @return bool
 */
function rememberUser(): bool
{
    // проверить и очистить $_COOKIE['remember_token'], если он есть
    $rememberToken = filter_input(INPUT_COOKIE, 'remember_token', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($rememberToken)) {
        
        return false;
    }

    $user = findUserByRememberToken($rememberToken);
    if ($user) {
        setUserSession($user);

        return true;
    }

    return false;
}
