<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Database;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\UserAuth as EloquentUserAuth;
use Otus\Mvc\Models\OtusORM\Users as OtusORMUsers;
use Otus\Mvc\Models\Doctrine\User as DoctrineUser;
use PDO;
class UserAuthController
{
    public function loginUser() {
        if(EloquentUserAuth::login() == true) {
            View::render('reg',[
                'title' => 'Страница аутентификации',
                'name' => $_POST['username'],
                'resault' => 'Успешная авторизация'
            ]);
        } else {
            View::render('noreg',[
                'title' => 'Страница аутентификации',
                'resault' => 'Не верные учетные данные'
            ]);
        }
    }


    public static function logoutUser() {
        if(EloquentUserAuth::logout() == true){
            header('location: /index/index' );
        } else {
            View::render('404',[
                'title' => 'Не удачный выход',
                'resault' => 'Все сломалось и Вы не сможете выйти'
            ]);
        }
    }
    
}
