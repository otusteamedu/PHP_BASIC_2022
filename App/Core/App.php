<?php

namespace App\Core;

class App {

  public static function action() {
    $rout = new Routing;
    $path = $rout->getPath();
    $controller = $path['Controller'];
    $action = $path['Action'];
    if ($controller === "404" || $action === "404") {
      return;
    } else {
      call_user_func_array(array(new $controller, $action), []);
    }
  }
}