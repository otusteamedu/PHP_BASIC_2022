<?php

/**
 * Проверяет наличие заданной привилегии у текущего пользователя.
 * Роль ROLE_USER по умолчанию есть у всех зарегистрированных пользователей.
 */
function isGranted(string $role = 'ROLE_USER'): bool
{
    startSession();
    
    if (
        isset($_SESSION['roles']) &&
        in_array($role, json_decode($_SESSION['roles']))
    ) {
        return true;
    }

    return false;
}
