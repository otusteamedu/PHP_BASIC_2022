<?php

namespace Otus\Mvc\Core;

class App
{
    /**
     * @var array Таблица сокращенных названий маршрутов
     */
    protected static $routes = [
        'info' => ['index', 'info'],
        '404' => ['alert', 'page404'],
        'error1' => ['alert', 'error1'],
    ];

    public static function run()
    {
        // контроллер и действие по умолчанию
        $controller_name = "Otus\\Mvc\\Controllers\\IndexController";
        $action_name = "index";

        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        if (array_key_exists($path, self::$routes)) {
            $controller = self::$routes[$path][0];
            $controller_name = self::makeControllerName($controller);
            $action_name = self::$routes[$path][1];
        } elseif ($path !== "") {
            @list($controller, $action) = explode("/", $path, 2);
            if (isset($controller)) {
                $controller_name = self::makeControllerName($controller);
            }

            if (isset($action)) {
                $action_name = $action;
            }
        }

        // Проверить существование контроллера
        if (!class_exists($controller_name, true)) {
            //redirect to 404
            self::redirectTo('404');
        }

        // Проверить существование метода
        if (!method_exists($controller_name, $action_name)) {
            //redirect to 404
            self::redirectTo('404');
        }

        $controller = new $controller_name();
        $controller->$action_name();
    }

    /**
     *  Перенаправление
     *
     * @param string $path путь к методу в стандартной форме: <ctrlName>/<methodName>
     *                     (короткое название контроллера и имя метода, разделенные слэшем)
     */
    public static function redirectTo(string $path): void
    {
        header('Location: /' . $path);
        exit;
    }

    /**
     * Сгенерировать полное имя контроллера
     *
     * @param string $ctrlName сокращенное имя контроллера
     *
     * @return string полное имя контроллера
     */
    protected static function makeControllerName(string $ctrlName): string
    {

        return 'Otus\\Mvc\\Controllers\\' . ucfirst($ctrlName) . 'Controller';
    }
}
