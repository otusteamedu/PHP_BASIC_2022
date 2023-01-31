<?php

namespace App\Controllers;

use App\Core\Redirect;
use App\Core\View;
use App\Models\Auth;
use App\Models\Event;

class EventController {

  public function index() {

    if (!empty(Auth::get('username'))) {
      $result = Event::listAllEvents();
      View::render('event', [
        'title' => 'Events',
        'events' => $result[0],
        'pagination' => $result[1],
      ]);
    } else {
      Redirect::redirect('/');
    }
  }

  public function addEvent() {
    $result = Event::addEvent();
    if ($result) {
      Redirect::redirect('/Event/index');
    } else {
      $user = Auth::get('username');
      $result = Event::listAllEvents();
      View::render('admin', [
        'title' => 'Admin page',
        'name' => $user,
        'error' => 'Event not created, please try again',
        'events' => $result[0],
        'pagination' => $result[1],
      ]);
    }
  }
}