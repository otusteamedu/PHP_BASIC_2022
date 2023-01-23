<?php

namespace App\Controllers;
use App\Core\View;

class PersonalController {
  public function index() {
    session_start();
    View::render('personal', [
      'title' => 'personal page of ' . $_SESSION['username'],
      'name' => $_SESSION['username'],
    ]);
  }
}