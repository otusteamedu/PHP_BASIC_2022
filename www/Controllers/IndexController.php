<?php

namespace HW\HW18\Controllers;

use HW\HW18\Core\View;

class IndexController {
  public function index() {
    View::render('auth', [
      'title' => 'Home page',
    ]);
  }
}
