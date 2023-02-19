<?php

namespace App\Models;
use App\Core\Database;
use App\Core\Logger;

class Event {

  public static function listAllEvents() {
    $pdo = Database::connect();

    $query = 'SELECT  events.id, events.name, events.date, events.time, group_concat(users.username) AS usernames FROM events
    LEFT JOIN events_users ON events.id = events_users.event_id
    LEFT JOIN users ON users.id = events_users.user_id
    GROUP BY events.id
    ORDER BY events.date, events.time';

    $username = NULL;
    $queryCount = 'SELECT events.id FROM events';
    $resCount = $pdo->prepare($queryCount);
    $resCount->execute();
    $dataCount = $resCount->fetchAll();
    $count = count($dataCount);

    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

    $Paginator = new Paginator($pdo, $query, $count, $username);
    $results = $Paginator->getData($page);
    $pagination = $Paginator->createLinks();

    return [$results, $pagination];
  }

  public static function getUserId($username) {
    $pdo = Database::connect();
    $query = 'SELECT users.id FROM users WHERE users.username = ?';
    $res = $pdo->prepare($query);
    $res->execute([$username]);
    $data = $res->fetch();
    $id = ($data['id']);
    return $id;
  }

  public static function listUserEvents($username) {

    $pdo = Database::connect();
    $id = self::getUserId($username);

    $queryCount = "SELECT event_id FROM events_users where user_id = $id";
    $resCount = $pdo->prepare($queryCount);
    $resCount->execute();
    $dataCount = $resCount->fetchAll();
    $count = count($dataCount);

    $query = "SELECT events.id, events.name, events.date, events.time FROM events
    JOIN events_users ON events.id = events_users.event_id
    JOIN users ON users.id = events_users.user_id
    WHERE users.id=$id
    ORDER BY events.date, events.time";

    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $user = (isset($_GET['username'])) ? $_GET['username'] : $username;

    $Paginator = new Paginator($pdo, $query, $count, $user);
    $results = $Paginator->getData($page);
    $pagination = $Paginator->createLinks();

    return [$results, $pagination];
  }

  public static function calendarView() {
    $calendar = new Calendar();
    $data = $calendar->getData();
    return $data;
  }

  public static function eventByDate() {
    $date = (isset($_GET['date'])) ? $_GET['date'] : date('Y-m-d');
    $pdo = Database::connect();

    $query = 'SELECT  events.id, events.name, events.date, events.time, group_concat(users.username) AS usernames FROM events
    LEFT JOIN events_users ON events.id = events_users.event_id
    LEFT JOIN users ON users.id = events_users.user_id
    WHERE events.date = ?
    GROUP BY events.id
    ORDER BY events.date, events.time';
    $res = $pdo->prepare($query);
    $res->execute([$date]);
    $data = $res->fetchAll();
    return $data;
  }

  public static function addEvent() {

    $pdo = Database::connect();
    $query = 'INSERT INTO events(name, date, time) VALUES (?,?,?)';
    $result = $pdo->prepare($query);
    $message = "The event created!";
    try {
      $result->execute([$_POST['event-name'], $_POST['event-date'], $_POST['event-time']]);
    } catch (\Exception$ex) {
      Logger::getLogger()->info("Event not created");
      Logger::getLogger()->error("Exception", [$ex->getMessage()]);
      Logger::getLogger()->debug("Request params", $_REQUEST);
      $message = "Event not created, please try again";
    }
    return $message;
  }
  public static function editEvent() {

    $data = explode(",", $_POST['event-prev']);
    $message = 'Nothing to update';

    $nameUpd = ($data[0] === $_POST['event-name-new']);
    $dateUpd = ($data[1] === $_POST['event-date-new']);
    $timeUpd = ($data[2] === $_POST['event-time-new']);

    if ($nameUpd && $dateUpd && $timeUpd) {
      return $message;
    }

    $id = $_POST['event-id'];
    $pdo = Database::connect();
    $query = "UPDATE events SET name=?, date=?, time=? WHERE id = $id";
    $result = $pdo->prepare($query);

    try {
      $result->execute([$_POST['event-name-new'], $_POST['event-date-new'], $_POST['event-time-new']]);
      $message = "The event updated!";
    } catch (\Exception$ex) {
      Logger::getLogger()->info("Event not edited");
      Logger::getLogger()->error("Exception", [$ex->getMessage()]);
      Logger::getLogger()->debug("Request params", $_REQUEST);
      $message = "Event not updated, please try again";
    }
    return $message;
  }
  public static function deleteEvent() {

    $id = $_POST['event-id'];
    $pdo = Database::connect();
    $query = "DELETE FROM events WHERE events.id=?";
    $result = $pdo->prepare($query);
    $message = "The event deleted!";
    try {
      $result->execute([$id]);
    } catch (\Exception$ex) {
      Logger::getLogger()->info("Event not deleted");
      Logger::getLogger()->error("Exception", [$ex->getMessage()]);
      Logger::getLogger()->debug("Request params", $_REQUEST);
      $message = "Event not deleted, please try again";
    }
    return $message;
  }

  public static function joinEvent() {
    $pdo = Database::connect();
    $user_id = self::getUserId($_POST['username']);
    $event_id = $_POST['event-id'];
    $query = "INSERT INTO events_users (`event_id`, `user_id`) VALUES (?, ?)";
    $res = $pdo->prepare($query);
    $message = "You joined the event!";
    try {
      $res->execute([
        $event_id, $user_id,
      ]);
    } catch (\Throwable$ex) {
      Logger::getLogger()->info("Error message:", [$ex->getMessage()]);
      Logger::getLogger()->error("Error trace:", $ex->getTrace());
      Logger::getLogger()->debug("Request params:", $_REQUEST);
      $message = "Something went wrong, please, try again later";
    }
    return $message;
  }

  public static function cancelEvent() {
    $pdo = Database::connect();
    $user_id = self::getUserId($_POST['username']);
    $event_id = $_POST['event-id'];
    $query = "DELETE FROM events_users WHERE event_id=? AND user_id=?";
    $res = $pdo->prepare($query);
    $message = "You cancelled the event!";
    try {
      $res->execute([
        $event_id, $user_id,
      ]);
    } catch (\Throwable$ex) {
      Logger::getLogger()->info("Error message:", [$ex->getMessage()]);
      Logger::getLogger()->error("Error trace:", $ex->getTrace());
      Logger::getLogger()->debug("Request params:", $_REQUEST);
      $message = "Something went wrong, please, try again later";
    }
    return $message;
  }
}
