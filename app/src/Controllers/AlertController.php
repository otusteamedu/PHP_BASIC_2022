<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\View;

/**
 * Контроллер для отображения различных предупредительных сообщений
 */
class AlertController
{
    /**
     * Отобразить сообщение о ненайденной странице
     */
    public function page404()
    {
        View::render('alert/404.twig', [
            'title' => 'Страница не найдена',
            'userName' => $userName ?? 'Anonymous',
        ]);
    }

    /**
     * Вывести ошибку, если отсутствует(нельзя прочитать) файл шаблона страницы
     */
    public function error1()
    {
        View::render('alert/danger.twig', [
            'title' => 'Ошибка',
            'message' => "Ошибка чтения страницы",
            'userName' => $userName ?? 'Anonymous',
        ]);
    }
}
