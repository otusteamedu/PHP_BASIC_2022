<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

class IndexController
{
    public function index()
    {
        View::render('index/index.twig', [
            'title' => 'Главная',
            'pageName' => 'Список задач',
            'userName' => $userName ?? 'Anonymous'
        ]);
    }

    public function info() {
        ob_start();
        phpinfo();
        $phpinfo = ob_get_clean();

        View::render('index/info.twig', [
            'title' => 'phpinfo',
            'pageName' => 'phpinfo',
            'userName' => $userName ?? 'Anonymous',
            'phpinfo' => $phpinfo
        ]);
    }
}
