<?php

namespace App\Controllers;


use App\View;

abstract class AbstractController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function render($template, $data, $return)
    {
        $this->view->render($template, $data, $return);
    }
}