<?php

namespace App\Controllers;


class FrontController extends AbstractController
{
    private $defaultController = 'IndexController';
    private $defaultAction = 'actionIndex';

    public function run()
    {
        $controller = (ucfirst(isset($_GET['controller'])) . 'Controller') ?: $this->defaultController;
        $action = ('action' . ucfirst(isset($_GET['action']))) ?: $this->defaultAction;

        $controller = new $controller();
        $controller->$action();
    }

    private function getRoute(array $url)
    {
        // TODO
    }
}