<?php

/**
 * @see https://habr.com/ru/post/182352/
 */
function startSession(): bool
{
    if (session_id()) {
        return true;
    }

    return session_start();
}
