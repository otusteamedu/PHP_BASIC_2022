<?php

namespace App\Controllers;

use App\Core\Redirect;
use App\Core\View;
use App\Core\Session;
use App\Models\Chat;

class ChatController {
  public function index() {

    if (!empty(Session::get('username'))) {
      View::render('chat', [
        'title' => '',
        'messages' => Chat::listMessages(),
      ]);
    } else {
      Redirect::redirect('/');
    }
  }

  public function addMessage() {
    $user = Session::get('username');
    if (!empty($user)) {
      $result = Chat::addMessage(Session::get('username'));
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