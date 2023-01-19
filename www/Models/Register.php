<?php

namespace HW\HW18\Models;
use HW\HW18\Core\Database;

class Register {
  public static function register($username, $password): bool {
    $pdo = Database::connect();
    $password = hash('sha256', $password);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $result = $pdo->prepare('INSERT INTO users(username, password, password_hash) values(?,?,?)');
    try {
      $result->execute([$username, $password, $hash]);
    } catch (\Exception $ex) {
      return false;
    }
    return true;
  }
}