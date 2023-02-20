<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Controller;

class StaticController
{
    public function index() {
        Controller::render('static',[]);
    }

    public function page1() {
        Controller::render('page1',[]);
    }
}
