<?php

namespace App\Controllers;


use App\Model;

class NewsController extends AbstractController
{
    public function actionIndex()
    {
        var_dump(Model::findById(1));
        $this->render('boom', [
            'news' => [1, 2, 3]
        ]);

        return true;
    }

    public function actionView($id)
    {
        echo $id;
        return true;
    }
}