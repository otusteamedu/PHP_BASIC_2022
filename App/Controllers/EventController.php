<?php

namespace App\Controllers;

use App\Core\Redirect;
use App\Core\View;
use App\Models\Auth;
use App\Models\Event;

class EventController {

  public function index() {
    $user = ucfirst(Auth::get('username'));
    if (!empty($user)) {
      $result = Event::listAllEvents();
      View::render('event', [
        'title' => 'Events',
        'events' => $result[0],
        'pagination' => $result[1],
        'user' => $user,
      ]);
    } else {
      Redirect::redirect('/');
    }
  }

  public function addEvent() {

    $result = Event::addEvent();
    unset($_POST);
    Redirect::redirect("/Personal/index/?action-msg=$result");
  }

  public function editEvent() {

    $result = Event::editEvent();
    unset($_POST);
    Redirect::redirect("/Personal/index/?action-msg=$result");
  }

  public function deleteEvent() {

    $result = Event::deleteEvent();
    unset($_POST);
    Redirect::redirect("/Personal/index/?action-msg=$result");
  }

  public function join() {

    $result = Event::joinEvent();
    unset($_POST);
    Redirect::redirect("/Event/index/?action-msg=$result");
  }

  public function cancel() {

    $result = Event::cancelEvent();
    unset($_POST);
    Redirect::redirect("/Event/index/?action-msg=$result");
  }
}
