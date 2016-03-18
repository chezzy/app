<?php

namespace App\Controllers;


class FrontController extends AbstractController
{
    private $defaultController = 'index';
    private $defaultAction = 'index';

    public function run()
    {
        $routes = $this->getRoute();
        $controller = $routes['controller'];
        $action = $routes['action'];
        //var_dump($routes);

        //$controller = new $routes['controller']();
        //$controller->$routes['action']();

        $obj = '\App\Controllers\\' .$controller;
        $controller = new $obj();
        $controller->$action();
    }

    private function getRoute()
    {
        $routes = [];

        $routes['controller'] = (isset($_GET['controller'])) ?: $this->defaultController;
        $routes['controller'] = ucfirst(strtolower($routes['controller'])) . 'Controller';
        $routes['action'] = (isset($_GET['action'])) ?: $this->defaultAction;
        $routes['action'] = 'action' . ucfirst(strtolower($routes['action']));

        return $routes;
    }
}