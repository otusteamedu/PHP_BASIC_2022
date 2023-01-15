<?php

namespace HW\HW17\Controllers;

use HW\HW17\Core\View;

class IndexController {
  public function index() {
    View::render('auth', [
      'title' => 'Home page',
    ]);
  }
}