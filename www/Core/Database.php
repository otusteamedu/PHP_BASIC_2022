<?php

namespace HW\HW17\Core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {
  public static function bootEloquent() {
    $config = parse_ini_file("../config/config.ini", true, INI_SCANNER_TYPED);
    $capsule = new Capsule();
    $capsule->addConnection([
      "driver" => $config["driver"],
      "host" => $config["host"],
      "port" => $config["port"],
      "database" => $config["db"],
      "username" => $config["user"],
      "password" => $config["password"],
    ]);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
  }
}