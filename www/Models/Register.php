<?php

namespace HW\HW18\Models;
use HW\HW18\Core\Database;

class Register {
  public static function register($username, $password): bool {
    $pdo = Database::connect();
    $result = $pdo->prepare('INSERT INTO users(username, password) values(?,?)');
    try {
      $result->execute([$username, md5($password)]);
    } catch (\Exception $ex) {
      return false;
    }
    return true;
  }
}