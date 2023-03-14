<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Users\Service\UsersService;

class IndexController extends BaseController
{
    public function index() {

        View::render('info',[
            'title' => 'Заработало'
        ]);
    }

    public function loginPage() {
        View::render('loginform');
    }

    public function login() {
        if(!empty($_POST['user']) && !empty($_POST['password'])) {
            $user = UsersService::loginUser($_POST['user'], $_POST['password']);
            if ($user){
                View::render('info',[
                    'title' => 'Заработало'
                ]);
            }
        }
    }

    public function main() {


        $user = UsersService::getListUsers([]);
echo "<pre>"; 
print_r($user); 
echo "</pre>";
        View::render('main',[
            'title' => 'Главная',
            'text' => 'Как то так'
        ]);
    }
}
