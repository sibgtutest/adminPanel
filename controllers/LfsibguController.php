<?php

namespace app\controllers;

use yii\web\Controller;;

class LfsibguController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect('http://lfsibgu.ru');
        //return '11111111';
    }
}