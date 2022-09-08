<?php

namespace Hell\Mvc\Controllers;

use Hell\Mvc\Core\View;

class IndexController
{

    public function index() {
        View::render('info',[
            'title'=> 'Hell Dante',
            'name' => 'всяк сюда входящий'
        ]);
    }

    public function other() {
        View::render('info',[
            'title'=> 'Niflheim',
            'name' => 'ибо ты в объятиях Хель'
        ]);
    }

}