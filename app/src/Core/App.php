<?php

namespace Otus\Mvc\Core;

class App
{
    protected static $routes = [
        'lessons/spec' => ['lessons', 'linux'],
        'info' => ['home', 'info']
    ];

    public static function run()
    {
        // конроллер и действие по умолчанию
        $controller_name = "Otus\\Mvc\\Controllers\\IndexController";
        $action_name = "index";

        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        if (array_key_exists($path, self::$routes)) {
            $controller = self::$routes[$path][0];
            $controller_name = self::makeControllerName($controller);
            $action_name = self::$routes[$path][1];
        } elseif ($path !== "") {
            @list($controller, $action) = explode("/", $path, 2);
            if (isset($controller))
            {
                $controller_name = self::makeControllerName($controller);
            }

            if (isset($action))
            {
                $action_name = $action;
            }
        }

        // Check controller exists.
        if (!class_exists($controller_name, true))
        {
            //redirect to 404
            View::render('404');
        }

        if(!method_exists($controller_name, $action_name))
        {
            //redirect to 404
            View::render('404');
        }

        $controller = new $controller_name();
        $controller->$action_name();
    }

    protected static function makeControllerName(string $ctrlName): string
    {

        return 'Otus\\Mvc\\Controllers\\' . ucfirst($ctrlName) . 'Controller';
    }
}
