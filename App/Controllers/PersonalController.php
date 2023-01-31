<?php

namespace App\Controllers;
use App\Core\Redirect;
use App\Core\View;
use App\Models\Auth;
use App\Models\Event;

class PersonalController {

  public function index() {
    $user = Auth::get('username');
    $is_admin = Auth::isAdmin($user);

    if (!empty($user)) {
      if ($is_admin) {
        $result = Event::listAllEvents();
        View::render('admin', [
          'title' => 'Admin page',
          'name' => $user,
          'events' => $result[0],
          'pagination' => $result[1],
        ]);
      } else {
        $result = Event::listUserEvents($user);
        View::render('personal', [
          'title' => 'Personal page of ' . $user,
          'name' => $user,
          'events' => $result[0],
          'pagination' => $result[1],
        ]);
      }
    } else {
      Redirect::redirect('/');
    }
  }
}