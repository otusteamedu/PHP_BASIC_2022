<?php

namespace HW\HW17\Core;

class Redirect {
  public static function redirect($to) {
    header("Location: $to");
  }
}