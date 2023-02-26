<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

class StaticController
{
    public function index() {
        View::render('static',[]);
    }

    public function page1() {
        View::render('page1',[]);
    }
}
