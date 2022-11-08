<?php

/**
 * Проверка того, что переданный токен соответствует csrf-токену указанной формы.
 * 
 * @param string $csrf_token значение поля _csrf_token формы.
 * @param string $form_name название сессионой переменной, которой должен соответствовать проверяемый токен.
 * 
 * @return bool
 */
function checkCsrfToken(string $csrf_token, string $form_name): bool
{
    startSession();
    $csrf_token = preg_replace('/[^a-f0-9]/', '', $csrf_token);
    if (empty($csrf_token) || empty($_SESSION[$form_name]) || $csrf_token !== md5($_SESSION[$form_name])) {
        return false;
    }
    unset($_SESSION['csrf_token']);

    return true;
}
