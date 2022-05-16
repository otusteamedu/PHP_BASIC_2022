<?php

namespace Otus\Mvc\Controllers;
use Otus\Mvc\Core\View;
class IndexController
{
    public function index() {
        View::render('index',[
            'title' => 'OTUS - книжный магазин',
            'appName' => 'Книжный Магазин'
        ]);
    }
}
