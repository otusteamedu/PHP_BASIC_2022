<?php

namespace HW\HW18\Controllers;

use HW\HW18\Core\Redirect;
use HW\HW18\Core\View;
use HW\HW18\Models\Auth;

session_start();

class AuthController {

  public function auth() {

    if (!empty($_POST['user']) && !empty($_POST['password'])) {

      $result = Auth::authenticate($_POST['user'], $_POST['password']);

      if ($result === null) {
        View::render('auth', [
          'error' => 'Wrong username or password!',
          'title' => 'Log In',
        ]);
      } else {
        View::render('personal', [
          'title' => 'personal page of ' . $_POST['user'],
          'name' => $_POST['user'],
        ]);
      }
    } else {
      Redirect::redirect('/');
    }
  }
  public function logout() {
    if (!empty($_GET['action']) && $_GET['action'] === 'exit') {

      session_destroy();
      Redirect::redirect('/');
    }
  }
}