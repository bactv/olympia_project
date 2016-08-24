<?php
/**
 * Created by PhpStorm.
 * User: bac_b
 * Date: 24/08/2016
 * Time: 8:48 CH
 */
namespace frontend\controllers;

use frontend\components\FrontendController;
use Yii;

class HomeController extends FrontendController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}