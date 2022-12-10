<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

class HomeController
{
    public function index()
    {
        View::render('home/index.twig', [
            'title' => 'Личный кабинет',
            'pageName' => 'Личный кабинет',
            'userName' => $userName ?? 'Anonymous',
            'name' => $name ?? 'Anonymous'
        ]);
    }
}
