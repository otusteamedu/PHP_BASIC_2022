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
    Redirect::redirect("/Personal/index/?action-msg=$result");
  }
  public function editEvent() {
    $result = Event::editEvent();
    Redirect::redirect("/Personal/index/?action-msg=$result");
  }
  public function deleteEvent() {
    $result = Event::deleteEvent();
    Redirect::redirect("/Personal/index/?action-msg=$result");
  }

  public function join() {
    if (!empty($_GET['action']) && $_GET['action'] === 'join') {
      $result = Event::joinEvent($_GET['event_id'], $_GET['user']);
      Redirect::redirect("/Personal/index/?action-msg=$result");
    }
  }

  public function cancel() {
    if (!empty($_GET['action']) && $_GET['action'] === 'cancel') {
      $result = Event::cancelEvent($_GET['event_id'], $_GET['user']);
      Redirect::redirect("/Personal/index/?action-msg=$result");
    }
  }
}
