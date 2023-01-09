<?php

namespace Hw\Env\Controllers;

use Hw\Env\View;

class IndexController {
  public function index() {
    View::render('nav', [
      'title' => 'Index',
      'page' => 'home',
    ]);
  }

  public function test() {
    View::render('nav', [
      'title' => 'Test',
      'page' => 'test',
    ]);
  }

  public function new () {
    View::render('nav', [
      'title' => 'New',
      'page' => 'new',
    ]);
  }
}
