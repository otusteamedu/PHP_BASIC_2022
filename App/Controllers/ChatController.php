<?php

namespace App\Controllers;

use App\Core\Redirect;
use App\Core\View;
use App\Models\Chat;

session_start();

class ChatController {
  public function index() {

    if (!empty($_SESSION['username'])) {
      View::render('chat', [
        'title' => '',
        'messages' => Chat::listMessages(),
      ]);
    } else {
      Redirect::redirect('/');
    }
  }

  public function addMessage() {
    if (!empty($_SESSION['username'])) {
      $result = Chat::addMessage($_SESSION['username']);

      if ($result) {
        Redirect::redirect('/chat/index');
      } else {
        View::render('chat', [
          'title' => '',
          'messages' => Chat::listMessages(),
          'error' => 'Message not sent, please try again',
        ]);
      }
    } else {
      Redirect::redirect('/');
    }
  }
}