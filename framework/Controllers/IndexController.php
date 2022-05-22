<?php

namespace Otus\Mvc\Controllers;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\OtusORM\Main;
class IndexController
{
    public function index() {
        $main = new Main;
        View::render('index', $main->getAppInfo());
    }
}
