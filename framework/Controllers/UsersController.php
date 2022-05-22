<?php

namespace Otus\Mvc\Controllers;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\OtusORM\Users;

class UsersController
{
    public function login() {
        $users = new Users;
        View::render('login', $users->userLogin());
    }

    public function logout() {
        $users = new Users;
        View::render('logout', $users->userLogout());
    }
}