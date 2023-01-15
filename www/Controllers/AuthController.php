<?php

namespace HW\HW17\Controllers;

use HW\HW17\Core\Redirect;
use HW\HW17\Core\View;
use HW\HW17\Models\User;

session_start();

class AuthController {

  public function auth() {

    if (!empty($_POST['user']) && !empty($_POST['password'])) {

      $result = User::authenticate($_POST['user'], $_POST['password']);

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