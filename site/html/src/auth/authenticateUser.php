<?php

/**
 * Аутентифицировать пользователя по логину и паролю с опциональной возможностью запомнить сессию
 */
function authenticateUser(string $login, string $password, bool $remember): bool
{
    $userAuthenticated = checkUser($login, $password);
    // если пользователь аутентифицирован
    if ($userAuthenticated) {
        // установить сессионные переменные для пользователя
        setUserSession($userAuthenticated);
        
        // запомнить пользователя, если включена эта опция
        if ($remember) {
            $remember_token = setUserRememberToken($userAuthenticated['id']);
            setcookie('remember_token', $remember_token, time() + 3600 * 24 * 30);
        }

        return true;
    }
    
    return false;
}
