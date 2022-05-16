<?php

namespace Otus\Mvc\Controllers;
use Otus\Mvc\Core\View;
class BooksController
{
    public function search() {
        View::render('view_books',[
            'title' => 'OTUS - книжный магазин',
            'value' => 'Показываем реузльтат поиска'
        ]);
    }

    public function view() {
        View::render('view_books',[
            'title' => 'OTUS - книжный магазин',
            'value' => 'Показываем полный список книг'
        ]);
    }
}