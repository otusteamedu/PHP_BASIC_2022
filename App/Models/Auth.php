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

  public static function isAdmin($username) {
    $pdo = Database::connect();
    $query = $pdo->prepare('SELECT is_admin FROM users where username = ?');
    $query->execute([$username]);
    $result = $query->fetch();
    return $result ["is_admin"];
  }

  public static function set($param, $value) {
    session_start();
    if (!array_key_exists($param, $_SESSION)) {
      $_SESSION[$param] = $value;
    }
  }
  public static function get($param, $default = '') {
    session_start();
    if (array_key_exists($param, $_SESSION)) {
      return $_SESSION[$param];
    }
    return $default;
  }
  public static function logout() {
    session_start();
    session_destroy();
  }
}