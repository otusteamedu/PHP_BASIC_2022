<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

/**
 * Контроллер действий, относящихся к управлению пользователями
 */
class UserController
{
    public function index()
    {
        View::render('user/index.twig', [
            'title' => 'Личный кабинет',
            'pageName' => 'Личный кабинет',
            'userName' => $userName ?? 'Anonymous',
            'name' => $name ?? 'Anonymous'
        ]);
    }
}
