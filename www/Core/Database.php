<?php

namespace HW\HW18\Core;

class Database {

  public static function connect() {
    $config = parse_ini_file("../config/config.ini", true, INI_SCANNER_TYPED);

    $pdo = new \PDO("mysql:host={$config['host']};port={$config['port']};dbname={$config['db']};}",
      $config['username'],
      $config['password'],
      [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
      ]);

    return $pdo;
  }
}