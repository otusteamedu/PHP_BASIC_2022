<?php

namespace HW\HW18\Core;

class Redirect {
  public static function redirect($to) {
    header("Location: $to");
  }
}
