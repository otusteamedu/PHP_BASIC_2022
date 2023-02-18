<?php

namespace App\Controllers;

use App\Core\Redirect;
use App\Core\View;
use App\Models\Auth;
use App\Models\Register;

class AuthController {

  public function registration() {

    $data = parse_ini_file("../config/config.ini", true, INI_SCANNER_TYPED);
    $registration_enabled = $data['registration']['enabled'];

    if ($registration_enabled) {
      View::render('registration', [
        'title' => 'Registration',
      ]);
    } else {
      View::render('registration-closed', [
         'title' => 'Registration'
      ]
    );
    }
  }

  public function register() {

    $result = Register::register($_POST['user'], $_POST['password']);

    if ($result) {
      View::render('registration', [
        'message' => 'Registration completed successfully! You can login now.',
        'title' => 'Registration',
      ]);
    } else {
      View::render('registration', [
        'error' => 'Sorry, that username is already in use',
        'title' => 'Registration',
      ]);
    }
  }

  public function auth() {
    if (!empty($_POST['user']) && $_POST['password']) {

      $result = Auth::authenticate($_POST['user'], $_POST['password']);

      if ($result) {
        Redirect::redirect('/personal/index');
      } else {
        View::render('auth', [
          'error' => 'Wrong username or password!',
          'title' => 'Log In',
        ]);
      }
    } else {
      Redirect::redirect('/');
    }
  }

  public function logout() {
    if (!empty($_GET['action']) && $_GET['action'] === 'exit') {
      Auth::logout();
      Redirect::redirect('/');
    }
  }
}
