<?php

namespace App\Models;
use App\Core\Database;
use App\Core\Logger;

class Chat {
  public static function listMessages() {
    $pdo = Database::connect();
    $query = $pdo->prepare('SELECT * FROM messages ORDER BY message_date DESC');
    $query->execute();
    $result = $query->fetchAll();
    return $result;
  }

  public static function addMessage($username) {

    $pdo = Database::connect();
    $result = $pdo->prepare('INSERT INTO `messages` (`message_text`, `username`) VALUES (?, (SELECT username FROM users WHERE username=?))');

    try {
      $result->execute([$_POST['message'], $username]);

    } catch (\Exception $ex) {

      Logger::getLogger()->info("Message not send");
      Logger::getLogger()->error("Exception", [$ex->getMessage()]);
      Logger::getLogger()->debug("Request params", $_REQUEST);

      return false;
    }
    return true;
  }
}