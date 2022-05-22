<?php

namespace Otus\Mvc\Controllers;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\OtusORM\Books;

class BooksController
{

    public function search() {
        $books = new Books;
        View::render('view_books', $books->getBookSearch());
    }

    public function view() {
        $books = new Books;
        View::render('view_books', $books->getBookView());
    }
}