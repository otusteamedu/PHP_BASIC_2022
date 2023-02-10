<?php

namespace Otus\Mvc\Controllers;


use Otus\Mvc\Core\View;




class IndexController
{
    public function index() {

        View::render('info',[
            'title' => 'Главная страница',
            'name' => 'Anonymous user',
        ]);
    }

}
