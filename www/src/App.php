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
      View::render('404');
      $this->controller = "404";
    } else {
      $this->controller = $controller;
      return $this;
    }
  }

  public function setAction($action) {
    if ($this->controller !== "404") {
      $reflector = new \ReflectionClass($this->controller);
      if (!$reflector->hasMethod($action)) {
        View::render('404');
        $this->action = "404";
      } else {
        $this->action = $action;
        return $this;
      }
    }
  }

  public function action() {
    if ($this->action === "404" || $this->controller === "404") {
      return;
    } else {
      call_user_func_array(array(new $this->controller, $this->action), []);
    }
  }
}
