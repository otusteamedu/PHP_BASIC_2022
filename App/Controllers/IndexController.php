<?php

namespace App\Controllers;
use App\Core\View;

class IndexController {
  public function index() {
    View::render('auth', [
      'title' => 'Home page',
    ]);
  }
}