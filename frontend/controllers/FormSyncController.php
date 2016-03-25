<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class FormSyncController extends \yii\web\Controller
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
                   $basicinfo = \frontend\models\BasicInfo::findOne(Yii::$app->user->getId());
                   $edudet = \frontend\models\EducationalDetails::findOne(Yii::$app->user->getId());
                   $projects= \frontend\models\Projects::findOne(Yii::$app->user->getId());
                   $techprof = \frontend\models\TechnicalProficiency::findOne(Yii::$app->user->getId());
                   $workexp = \frontend\models\WorkExperience::findOne(Yii::$app->user->getId());

                    if(is_null($basicinfo))
                    {
                        $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form/basic-info',302);
                    }
                    else if(is_null($edudet))
                    {
                        $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form/educational-details',302);
                    }
                     else if(is_null($projects))
                    {
                        $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form/projects',302);
                    }
                     else if(is_null($techprof))
                    {
                        $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form/technical-proficiency',302);
                    }
                     else if(is_null($workexp))
                    {
                        $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form/work-experience',302);
                    }
                    else
                    {
                        $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form/members-area',302);
                    }
        }
        return $this->render('membersarea');}
 public function actionKjsieit()
    {
          return $this->render('kjsieit');
        
    }


}
