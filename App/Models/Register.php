<?php

namespace App\Models;
use App\Core\Database;
use App\Core\Logger;

class Register {
  public static function register($username, $password): bool {

    $data = parse_ini_file("../config/config.ini", true, INI_SCANNER_TYPED);
    $pepper = $data['pepper']['secret'];
    $password_peppered = hash_hmac('sha256', $password, $pepper);
    $password_hashed = password_hash($password_peppered, PASSWORD_BCRYPT);

    $pdo = Database::connect();
    $result = $pdo->prepare('INSERT INTO users(username, password_hash) values(?,?)');
    try {
      $result->execute([$username, $password_hashed]);
    } catch (\Exception$ex) {

      Logger::getLogger()->info("Registration failed");
      Logger::getLogger()->error("Exception", [$ex->getMessage()]);
      Logger::getLogger()->debug("Request params", $_REQUEST);

      return false;
    }
    return true;
  }
}