<?php

namespace Otus\Mvc\Controllers;
use Otus\Mvc\Core\View;
class UsersController
{
    public function login() {
        View::render('login',[
            'title' => 'OTUS - книжный магазин',
        ]);
    }

    public function logout() {
        View::render('logout',[
            'title' => 'OTUS - книжный магазин',
        ]);
    }
}