<?php

namespace HW\HW18\Models;
use HW\HW18\Core\Database;

class Auth {

  public static function authenticate($username, $password): bool {
    $pdo = Database::connect();

    $data = $pdo->prepare('SELECT 1 FROM users where username = ? and password = ?');
    $data->execute([$username, hash('sha256', $password)]);
    $result = $data->fetch();

    if ($result) {
      return (password_verify($result["password"], $result["password_hash"]));
    } else {
      return $result;
    }
  }
}