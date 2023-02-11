<?php

namespace Otus\Mvc\Core;

class App
{
    protected $routes = [
        'home/php-info' => ['Home', 'info'],
        'home-info' => ['Home', 'info']
    ];

    public function run()
    {

        $controller_name = "Otus\\Mvc\\Controllers\\IndexController";
        $action_name = "index";

        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        if (array_key_exists($path, $this->routes)) {
            $controller = $this->routes[$path][0];
            $controller_name = "Otus\\Mvc\\Controllers\\{$controller}Controller";
            $action_name = $this->routes[$path][1];
        } else {
            if ($path !== "") {
                @list($controller, $action) = explode("/", $path, 2);
                if (isset($controller)) {
                    $controller_name = "Otus\\Mvc\\Controllers\\{$controller}Controller";
                }
                if (isset($action)) {
                    $action_name = $action;
                }
            }
        }

        if (!class_exists($controller_name, true)) {
            View::render('404');
        }

        if (!method_exists($controller_name, $action_name)) {
            View::render('404');
        }

        $controller = new $controller_name();
        $controller->$action_name();
    }
}
