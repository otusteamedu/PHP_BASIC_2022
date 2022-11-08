<?php

/**
 * Сгенерировать новый csrf-токен для заданной формы и прописать его в сессии.
 *
 * @param string $form_name название сессионой переменной, идентифицирующая форму,
 *  и в которой будет хранится сгенерированный токен.
 *
 * @return string md5-хэш токена
 */ 
function getCsrfToken(string $form_name): string
{
    $token = uniqid();
    startSession();
    $_SESSION[$form_name] = $token;

    return md5($token);
}
