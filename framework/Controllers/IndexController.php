<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

class IndexController
{
    public function index() 
    {
        View::render('info',[
            'title' => 'Index page',
            'text' => 'главной странице',
            'annotation' => 'сейчас есть 2 контроллера index и home'
        ]);
    }

    public function test() 
    {
        View::render('info',[
            'title' => 'Index page',
            'text' => 'тестовой странице',
            'annotation' => 'ты на методе test'
        ]);
    }
}
