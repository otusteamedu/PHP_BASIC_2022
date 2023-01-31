<?php

namespace App\Controllers;
use App\Core\View;
use App\Models\Register;

class RegistrationController {
  public function index() {
    View::render('registration', [
      'title' => 'Registration',
    ]);
  }

  public function registration() {
    $result = Register::register($_POST['user'], $_POST['password']);
    if ($result) {
      View::render('registration', [
        'message' => 'Registration completed successfully! ',
        'title' => 'Registration',
      ]);
    } else {
      View::render('registration', [
        'error' => 'Sorry, that username is already in use',
        'title' => 'Registration',
      ]);
    }
  }
}