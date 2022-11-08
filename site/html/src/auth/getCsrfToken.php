<?php

function getCsrfToken(string $form_name): string
{
    $token = uniqid();
    startSession();
    $_SESSION[$form_name] = $token;

    return md5($token);
}
