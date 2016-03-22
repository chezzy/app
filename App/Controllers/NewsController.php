<?php

namespace App\Controllers;


class NewsController extends AbstractController
{
    public function actionIndex()
    {
        echo 'all';
        return true;
    }

    public function actionView($id)
    {
        echo $id;
        return true;
    }
}