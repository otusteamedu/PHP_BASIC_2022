<?php

namespace Otus\Mvc\Services;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\UserAuth as EloquentUserAuth;
use Otus\Mvc\Models\Eloquent\UserReg as EloquentUserReg;

class UserService
{
    public static function userLoginServ()
    {
        if(EloquentUserAuth::login()) {
            View::render('reg',[
                'title' => 'Страница аутентификации',
                'name' => $_POST['username'],
                'result' => 'Успешная авторизация'
            ]);
        } else {
            View::render('noreg',[
                'title' => 'Страница аутентификации',
                'result' => 'Не верные учетные данные!'
            ]);
        }
    }

    public static function userLogoutServ()
    {
        if(EloquentUserAuth::logout()) {
            header('location: /index/index' );
        } else {
            View::render('404',[
                'title' => 'Неудачный выход',
                'result' => 'Все сломалось и Вы не сможете выйти'
            ]);
        }
    }

    public static function userRegServ()
    {
        if(EloquentUserReg::register()) {
            View::render('reg',[
                'title' => 'Страница регистрации',
                'name' => $_SESSION['login'],
                'result' => 'Успешная регистрация'
            ]);
        } else {
            View::render('reg',[
                'title' => 'Страница регистрации',
                'name' => $_POST['username'],
                'result' => 'Регистрация не прошла, логин занят'
            ]);
        }
    }
    
}