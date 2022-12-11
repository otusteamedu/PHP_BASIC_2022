<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

/**
 * Контроллер отображения основных разделов сайта
 */
class IndexController
{
    public function index()
    {
        View::render('index/index.twig', [
            'title' => 'Главная',
            'pageName' => 'Главная',
            'userName' => $userName ?? 'Anonymous'
        ]);
    }

    /**
     * Вывести phpinfo()
     */
    public function info()
    {
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
