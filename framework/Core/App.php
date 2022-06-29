<?php

namespace Otus\Mvc\Core;
use Dotenv\Dotenv;

class App
{
    protected static $routes = [
        'raceViewer/createRace' => ['raceViewer','createRace'],
        'created-race' => ['raceViewer','createRace']
    ];

    public static function run()
    {
        Database::bootEloquent();

        $controller_name = "Otus\\Mvc\\Controllers\\IndexController";
        $action_name = "index";

        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        if(array_key_exists($path,self::$routes))
        {
            $controller = self::$routes[$path][0];
            $controller_name = "Otus\\Mvc\\Controllers\\{$controller}Controller";
            $action_name = self::$routes[$path][1];
        } else {
            if($path !== "")
            {
                @list($controller, $action) = explode("/", $path, 2);
                if (isset($controller)){
                    $controller_name = "Otus\\Mvc\\Controllers\\{$controller}Controller";
                }
                if (isset($action)){
                    $action_name = $action;
                }
            }
        }


        // Check controller exists.
        if(!class_exists($controller_name,true) || !method_exists($controller_name, $action_name))   {
            //redirect to 404
            View::render('error',[
                'title' => '400 - Bad request',
                'error_code' => '400 - Bad request',
                'result' => 'Нет такой страницы'
            ]);
        }

        $controller = new $controller_name();
        $controller->$action_name();



    }
}
