<?php
namespace Otus\Mvc\Core;

class Routes {
    protected static $routes = [
        'secret/top' => ['Index','main'],
        'docker-info' => ['Static','page1']
    ];
    public $controller_name = '';
    public $action_name = '';

    public function __construct($path)
    {
        if(array_key_exists($path,self::$routes))
        {
            $controller = self::$routes[$path][0];
            $this->controller_name = "Otus\\Mvc\\Controllers\\{$controller}Controller";
            $this->action_name = self::$routes[$path][1];
        } else {
            if($path !== "")
            {
                @list($controller, $action) = explode("/", $path, 2);
                if (isset($controller)){
                    $this->controller_name = "Otus\\Mvc\\Controllers\\{$controller}Controller";
                }
                if (isset($action)){
                    $this->action_name = $action;
                }
            }
        }
    }

}
?>