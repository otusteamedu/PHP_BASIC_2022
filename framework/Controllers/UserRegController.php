<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Services\UserService;
use Otus\Mvc\Core\View;

class UserRegController
{
    public function userReg() {
        UserService::userRegServ();
    }

    
    public function newUser(): View {
        View::render('noreg',[
            'title' => 'Страница регистрации',
            'resault' => 'Зарегистрируйтесь'
        ]);
    }
  
}
