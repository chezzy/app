<?php

namespace App\System\Routes;


class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath =  'App/System/Routes/routes.php';
        $this->routes = include($routesPath);
    }

    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                $segments = explode ($path, '/');

                $controller = ucfirst(array_shift($segments)).'Controller';
                $action = array_shift($segments);


            }
        }

    }
    
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    
}