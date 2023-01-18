<?php

namespace HW\HW18\Models;
use HW\HW18\Core\Database;

class Auth {

  public static function authenticate($username, $password): bool {

    $pdo = Database::connect();

    $data = $pdo->prepare('SELECT 1 FROM users where username = ? and password = ?');
    $data->execute([$username, md5($password)]);
    $result = $data->fetchAll();

    return count($result) > 0;
  }
}