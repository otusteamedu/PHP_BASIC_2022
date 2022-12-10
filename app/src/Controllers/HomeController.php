<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

class HomeController
{
    public function index() {
        View::render('info', [
            'title' => 'InfoPage',
            'name' => 'Dmitry'
        ]);
    }

    public function info() {
        echo $_ENV['PROJECT_DIR'];

        phpinfo();
    }
}
