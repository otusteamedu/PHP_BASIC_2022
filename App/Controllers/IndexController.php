<?php

namespace App\Controllers;
use App\Core\Redirect;
use App\Core\Session;
use App\Core\View;

class IndexController {
  public function index() {
    $user = Session::get('username');
    if (!empty($user)) {
      View::render('personal', [
        'title' => 'personal page of ' . $user,
        'name' => $user,
      ]);
    } else {
      Redirect::redirect('/');
    }
  }
}