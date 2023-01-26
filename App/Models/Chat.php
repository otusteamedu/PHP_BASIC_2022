<?php

namespace App\Models;
use App\Core\Database;
use App\Core\Logger;

class Chat {

  public static function listMessages() {
    $pdo = Database::connect();
    $query = 'SELECT * FROM messages ORDER BY message_date DESC';
    $countQuery = 'SELECT COUNT(*) FROM messages';

    $limit = (isset($_GET['limit'])) ? $_GET['limit'] : '5';
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

    $Paginator = new Paginator($pdo, $query, $countQuery);
    $results = $Paginator->getData($limit, $page);
    $pagination = $Paginator->createLinks();

    return [$results, $pagination];
  }

  public static function addMessage($username) {

    $pdo = Database::connect();
    $result = $pdo->prepare('INSERT INTO `messages` (`message_text`, `username`) VALUES (?,?)');

    try {
      $result->execute([$_POST['message'], ucfirst($username)]);

    } catch (\Exception$ex) {

      Logger::getLogger()->info("Message not send");
      Logger::getLogger()->error("Exception", [$ex->getMessage()]);
      Logger::getLogger()->debug("Request params", $_REQUEST);

      return false;
    }
    return true;
  }
}