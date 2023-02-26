<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

class IndexController
{
    public function index() {

        View::render('info',[
            'title' => 'Заработало'
        ]);
    }

    public function main() {

        View::render('main',[
            'title' => 'Главная',
            'text' => 'Как то так'
        ]);
    }
}
