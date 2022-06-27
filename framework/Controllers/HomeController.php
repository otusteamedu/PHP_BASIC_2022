<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

class HomeController
{
    public function index() {
        View::render('info',[
            'title' => 'InfoPage',
            'text' => 'домашней странице',
            'annotation' => 'Короткие ссылки: наберите home/php-info или home-info и посмотрите версию php'
        ]);
    }

    public function info() {
        phpinfo();
    }
}
