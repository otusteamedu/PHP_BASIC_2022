<?php

namespace App\Models;
use App\Core\Database;
use App\Core\Logger;

class Auth {

  public static function authenticate($username, $password): bool {

    $data = parse_ini_file("../config/config.ini", true, INI_SCANNER_TYPED);
    $pepper = $data['pepper']['secret'];
    $password_peppered = hash_hmac('sha256', $password, $pepper);

    $pdo = Database::connect();
    $query = $pdo->prepare('SELECT password_hash FROM users where username = ?');
    $query->execute([$username]);
    $result = $query->fetch();

    if ($result) {
      $verify = password_verify($password_peppered, $result["password_hash"]);
      if (!$verify) {
        Logger::getLogger()->info("Authentication failed - wrong password");
        Logger::getLogger()->debug("Request params", $_REQUEST);
      }
      return $verify;
    } else {
      Logger::getLogger()->info("Authentication failed - wrong username");
      Logger::getLogger()->debug("Request params", $_REQUEST);
      return $result;
    }
  }
}