<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Controller;

class IndexController
{
    public function index() {

        Controller::render('info',[
            'title' => 'Заработало'
        ]);
    }

    public function main() {

        Controller::render('main',[
            'title' => 'Главная',
            'text' => 'Как то так'
        ]);
    }
}
