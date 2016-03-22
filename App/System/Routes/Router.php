<?php

namespace App\System\Routes;


class Router
{
    private $routes;
    private $controller;
    private $action;
    private $namespace;

    public function __construct()
    {
        $routesPath =  __DIR__ . '/routes.php';
        if (!file_exists($routesPath)) {
            return null;
        }

        $this->routes = require_once $routesPath;
    }

    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $segments = explode('/', $path);
                $this->controller = ucfirst(array_shift($segments)).'Controller';
                $this->action = 'action'.ucfirst(array_shift($segments));
                $this->namespace = 'App\Controllers';

                $result = $this->process();

                if (null != $result) {
                    break;
                }
            }
        }

    }

    private function process()
    {
        $class = '\\' . $this->namespace . '\\' . $this->controller;
        $controller = new $class();
        $action = $this->action;
        return $controller->$action();
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


}