<?php

namespace App\Controllers;

use App\Core\Redirect;
use App\Core\View;
use App\Models\Auth;
use App\Models\Chat;

class ChatController {

  public function index() {
    if (!empty(Auth::get('username'))) {
      $result = Chat::listMessages();
      View::render('chat', [
       'title' => 'Chat',
        'messages' => $result[0],
        'pagination' => $result[1],
      ]);
    } else {
      Redirect::redirect('/');
    }
  }

  public function addMessage() {
    $user = Auth::get('username');
    if (!empty($user)) {
      $result = Chat::addMessage($user);
      if ($result) {
        Redirect::redirect('/chat/index');
      } else {
        View::render('chat', [
          'title' => 'Chat',
          'messages' => Chat::listMessages(),
          'error' => 'Message not sent, please try again',
        ]);
      }
    } else {
      Redirect::redirect('/');
    }
  }
}