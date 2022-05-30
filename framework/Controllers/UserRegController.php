<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Database;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\UserReg as EloquentUserReg;
use Otus\Mvc\Models\OtusORM\Users as OtusORMUsers;
use Otus\Mvc\Models\Doctrine\User as DoctrineUser;
use PDO;
class UserRegController
{
    public function regNewUser() {
        if(EloquentUserReg::register() == true) {
            View::render('reg',[
                'title' => 'Страница регистрации',
                'name' => $_SESSION['username'],
                'resault' => 'Успешная регистрация'
            ]);
        } else {
            View::render('reg',[
                'title' => 'Страница регистрации',
                'name' => $_POST['username'],
                'resault' => 'Регистрация не прошла, логин занят'
            ]);
        }
    }
    
}
