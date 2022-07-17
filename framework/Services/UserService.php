<?php

namespace Otus\Mvc\Services;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\UserAuth as EloquentUserAuth;
use Otus\Mvc\Models\Eloquent\UserReg as EloquentUserReg;

class UserService
{
    public static function userLoginServ() {
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

    public static function userLogoutServ() {
        if(EloquentUserAuth::logout() == true){
            header('location: /index/index' );
        } else {
            View::render('404',[
                'title' => 'Не удачный выход',
                'resault' => 'Все сломалось и Вы не сможете выйти'
            ]);
        }
    }

    public static function userRegServ() {
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