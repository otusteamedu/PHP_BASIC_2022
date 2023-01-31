<?php

namespace App\Models;
use App\Core\Database;
use App\Core\Logger;

class Event {

  public static function listAllEvents() {
    $pdo = Database::connect();
    $query = 'SELECT events.type, events.topic, events.date, events.time FROM events ORDER BY date';

   /*  $query = 'SELECT events.type, events.topic, events.date, events.time, users.username FROM events
    LEFT JOIN events_users ON events.id = events_users.event_id
    LEFT JOIN users ON users.id = events_users.user_id
    ORDER BY date'; */

    $username = NULL;
    $queryCount = 'SELECT events.id FROM events';
    $resCount = $pdo->prepare($queryCount);
    $resCount->execute();
    $dataCount = $resCount->fetchAll();
    $count = count($dataCount);

    $limit = (isset($_GET['limit'])) ? $_GET['limit'] : '4';
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

    $Paginator = new Paginator($pdo, $query, $count, $username);
    $results = $Paginator->getData($limit, $page);
    $pagination = $Paginator->createLinks();

    return [$results, $pagination];
  }

  public static function listUserEvents($username) {

    $pdo = Database::connect();
    $queryId = 'SELECT users.id FROM users WHERE users.username = ?';
    $resId = $pdo->prepare($queryId);
    $resId->execute([$username]);
    $dataId = $resId->fetch();
    $id = ($dataId['id']);

    $queryCount = "SELECT event_id FROM events_users where user_id = $id";
    $resCount = $pdo->prepare($queryCount);
    $resCount->execute();
    $dataCount = $resCount->fetchAll();
    $count = count($dataCount);

    $query = "SELECT events.type, events.topic, events.date, events.time FROM users
    INNER JOIN events_users ON events_users.user_id = users.id
    INNER JOIN events ON events_users.user_id = events.id
    WHERE users.id=$id
    ORDER BY date";

    $limit = (isset($_GET['limit'])) ? $_GET['limit'] : '4';
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $user = (isset($_GET['username'])) ? $_GET['username'] : $username;

    $Paginator = new Paginator($pdo, $query, $count, $user);
    $results = $Paginator->getData($limit, $page);
    $pagination = $Paginator->createLinks();

    return [$results, $pagination];

  }

  public static function addEvent() {

    $pdo = Database::connect();
    $query = 'INSERT INTO events(type, topic, date, time) VALUES (?,?,?,?)';
    $result = $pdo->prepare($query);

    try {
      $result->execute([$_POST['event-type'], $_POST['event-topic'], $_POST['event-date'], $_POST['event-time']]);

    } catch (\Exception$ex) {

      Logger::getLogger()->info("Event not created");
      Logger::getLogger()->error("Exception", [$ex->getMessage()]);
      Logger::getLogger()->debug("Request params", $_REQUEST);

      return false;
    }
    return true;
  }
}