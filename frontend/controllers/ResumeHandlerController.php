<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ResumeHandlerController extends \yii\web\Controller
{
 public function actionIndex()
    {
   if(Yii::$app->user->isGuest)
        {
             $this->redirect(Yii::$app->request->baseUrl.'/index.php',302);
        }
        else if(Yii::$app->user->getId()===0)
        {
            $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=admin-panel/index',302);
        }
        else {
                   $resume = \frontend\models\Resume::findOne(Yii::$app->user->getId());
                   

                    if(is_null($resume))
                    {
                        $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form/resume',302);
                    }
                    else
                    {
                        $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form/resume-update&id='.Yii::$app->user->getId(),302);
                    }
                    
        }
        return $this->render('index');}
 


}
