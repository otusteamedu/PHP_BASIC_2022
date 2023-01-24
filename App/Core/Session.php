<?php

namespace App\Core;

class Session {

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