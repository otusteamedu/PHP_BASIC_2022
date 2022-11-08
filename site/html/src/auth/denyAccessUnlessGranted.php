<?php

/**
 * Запрещает просмотр (перенаправляет на главную страницу) в случае отсутствия заданной привилегии.
 *
 * @param string уровень привилегий
 */
function denyAccessUnlessGranted(string $role = 'ROLE_ADMIN'): void
{
    if (!isGranted($role)) {
        header('Location: /');
        exit();
    }
}
