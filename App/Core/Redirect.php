<?php

namespace App\Core;

class Redirect {
  public static function redirect($to) {
    header("Location: $to");
  }
}