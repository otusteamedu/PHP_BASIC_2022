<?php

namespace App\Controllers;

use App\Core\Redirect;
use App\Core\View;
use App\Models\Auth;

session_start();

class AuthController {

  public function auth() {

    $result = Auth::authenticate($_POST['user'], $_POST['password']);

    if ($result) {
      $_SESSION['username'] = $_POST['user'];
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

      session_destroy();
      Redirect::redirect('/');
    }
  }
}