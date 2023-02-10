<?php

namespace App\Core;

class App {

  public static function action() {

    $rout = new Routing;
    $path = $rout->getPath();
    $controller = $path['Controller'];
    $action = $path['Action'];

    try {
      call_user_func_array(array(new $controller, $action), []);
    } catch (\Throwable $ex) {
      Logger::getLogger()->info("Error message:", [$ex->getMessage()]);
      Logger::getLogger()->error("Error trace:", $ex->getTrace());
      Logger::getLogger()->debug("Request params:", $_REQUEST);

      NotFound::notFound($ex);
    }
  }
}
