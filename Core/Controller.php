<?php
namespace Otus\Mvc\Core;
use Otus\Mvc\Core\{View,Routes};
use Otus\Mvc\Models\Users\Service\UsersService;

class Controller {

    protected static $exceptionsForNoLogined = ['Index'];

    public static function run()
    {   


        /*$controller_name = "Otus\\Mvc\\Controllers\\IndexController";
        $action_name = "index";*/

        session_start();
        $user = UsersService::loginUserByToken();
        if (!$user) {
            $controller = new $route->index();
            $controller->loginPage();
        } else {
            $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
            $route = new Routes($path);

            // Check controller exists.
            if(!class_exists($route->controller_name,true)) {
                //redirect to 404
                View::render('404');
                return;
            }

            if(!method_exists($route->controller_name, $route->action_name)) {
                //redirect to 404
                View::render('404');
                return;
            }
            $controller = new $route->controller_name();
            $controller->setUser($user);
            $controller->{$route->action_name}();
        }

    }
} 

?>