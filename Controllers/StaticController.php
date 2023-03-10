<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

class StaticController extends BaseController
{
    public function index() {
         echo "<pre>"; 
        print_r($this->user); 
        echo "</pre>";

        View::render('static',[]);
    }

    public function page1() {
        View::render('page1',[]);
    }
}
