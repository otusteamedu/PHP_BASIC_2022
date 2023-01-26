<?php

namespace App\Controllers;
use App\Core\Redirect;
use App\Core\View;
use App\Models\Auth;

class PersonalController {
  public function index() {
    $user = Auth::get('username');
    if (!empty($user)) {
      View::render('personal', [
        'title' => 'Personal page of ' . $user,
        'name' => $user,
      ]);
    } else {
      Redirect::redirect('/');
    }
  }
}