<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Database;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\User as EloquentUser;
use Otus\Mvc\Models\OtusORM\Users as OtusORMUsers;
use Otus\Mvc\Models\Doctrine\User as DoctrineUser;
use PDO;
class AuthController
{
    public function login() {
        if(isset($_POST['username']))
        {
            $user_log = EloquentUser::where('name', '=', $_POST['username'])->first();
        }
        if($user_log !== null) {
            foreach (EloquentUser::where('name', '=', $_POST['username'])->get() as $user) {
                $password = $_POST['password'];
                if (password_verify($password,$user->password)){
                    $_SESSION['is_auth'] = true;
                    $_SESSION['username'] = $user->name;
                    $_SESSION['user_id'] = $user->id;
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
        } else {
            View::render('noreg',[
                'title' => 'Страница аутентификации',
                'resault' => 'Не верные учетные данные'
            ]);
        }
        
    }

    public function register() {

        if(isset($_POST['username']))
        {
            $user_reg = EloquentUser::where('name', '=', $_POST['username'])->first();
            if($user_reg == null) {
                $user = new EloquentUser();
                $password = $_POST['password'];
                $hash_paswd = password_hash($password, PASSWORD_BCRYPT);
                $user->name = $_POST['username'];
                $user->password = $hash_paswd;
                $user->save();
            } else {
                View::render('reg',[
                'title' => 'Страница регистрации',
                'name' => $_POST['username'],
                'resault' => 'Регистрация не прошла, логин занят'
                ]);
            }
        }
        $_SESSION['is_auth'] = true;
        $_SESSION['username'] = $user->name;
        $_SESSION['user_id'] = $user->id;
        View::render('reg',[
            'title' => 'Страница регистрации',
            'name' => $user->name,
            'resault' => 'Успешная регистрация'
        ]);
    }
    
}
