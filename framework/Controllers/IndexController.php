<?php

namespace Otus\Mvc\Controllers;

class IndexController
{

    public function index() {
        View::render('info',[
            'title'=> 'Hell Dante',
            'name' => 'всяк сюда входящий'
        ]);
    }

}