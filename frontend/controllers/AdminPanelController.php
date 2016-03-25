<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class AdminPanelController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	if(Yii::$app->user->getId()==0)
    	{
    		return $this->render('index');
    	}
    	else
    	{
    		throw new ForbiddenHttpException;
    		
    	}

        
    }

}
