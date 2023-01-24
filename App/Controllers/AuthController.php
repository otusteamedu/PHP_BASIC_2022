<?php

namespace App\Controllers;

use App\Core\Redirect;
use App\Core\Session;
use App\Core\View;
use App\Models\Auth;

class AuthController {

  public function auth() {

    $result = Auth::authenticate($_POST['user'], $_POST['password']);

    if ($result) {
      Session::set('username', $_POST['user']);
      Redirect::redirect('/personal/index');
    } else {
      View::render('auth', [
        'error' => 'Wrong username or password!',
        'title' => 'Log In',
      ]);
    }
  }
  public function logout() {
    if (!empty($_GET['action']) && $_GET['action'] === 'exit') {
      Session::logout();
      Redirect::redirect('/');
    }
  }
}