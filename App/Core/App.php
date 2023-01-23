<?php

namespace App\Core;

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
      $path_arr = explode("/", $path, 2);

      if (count($path_arr) < 2) {
        $this->setController($path_arr[0]);
        $this->setAction($this->action);
      } else {
        $this->setController($path_arr[0]);
        $this->setAction($path_arr[1]);
      }
    }
  }

  public function setController($controller) {

    $controller = "App\\Controllers\\" . ucfirst(strtolower($controller)) . "Controller";
    if (!class_exists($controller)) {
      View::render('404');
      $this->controller = "404";
    } else {
      $this->controller = $controller;
    }
    return $this;
  }

  public function setAction($action) {
    if ($this->controller !== "404") {
      if (!method_exists($this->controller, $action)) {
        View::render('404');
        $this->action = "404";
      } else {
        $this->action = $action;
      }
      return $this;
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