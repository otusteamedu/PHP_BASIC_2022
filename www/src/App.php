<?php

namespace Hw\Env;

class App {
  const DEFAULT_ACTION = "index";
  const DEFAULT_CONTROLLER = "Index";

  protected $controller = self::DEFAULT_CONTROLLER;
  protected $action = self::DEFAULT_ACTION;

  public function __construct() {
    $this->parseUri();
  }

  protected function parseUri() {
    $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
    if ($path === "") {
      $this->setController($this->controller);
      $this->setAction($this->action);
    } else {
      list($controller, $action) = explode("/", $path, 2);
      if (isset($controller)) {
        $this->setController($controller);
      }
      if (isset($action)) {
        $this->setAction($action);
      }
    }
  }

  public function setController($controller) {
    $controller = ucfirst(strtolower($controller)) . "Controller";
    $controller = "Hw\\Env\\Controllers\\" . $controller;
    if (!class_exists($controller)) {
      header("HTTP/1.0 404 Not Found");
      echo "<h1>404 Not Found</h1>";
      echo "Controller not found";
      exit();
    }
    $this->controller = $controller;
    return $this;
  }

  public function setAction($action) {
    $reflector = new \ReflectionClass($this->controller);
    if (!$reflector->hasMethod($action)) {
      header("HTTP/1.0 404 Not Found");
      echo "<h1>404 Not Found</h1>";
      echo "Method not found";
      exit();
    }
    $this->action = $action;
    return $this;
  }

  public function action() {
    call_user_func_array(array(new $this->controller, $this->action), []);
  }
}
