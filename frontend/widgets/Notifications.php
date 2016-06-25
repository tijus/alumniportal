<?php


namespace frontend\widgets;
use yii\helpers\Html;
use frontend\models\BasicInfo;
use Yii;


class Notifications extends \yii\bootstrap\Widget
{
  public $message;
  public $bar;
    public function init(){

        parent::init();
        $basicinfo = \frontend\models\BasicInfo::findOne(Yii::$app->user->getId());
        $edudet = \frontend\models\EducationalDetails::findOne(Yii::$app->user->getId());
        $projects= \frontend\models\Projects::findOne(Yii::$app->user->getId());
        $techprof = \frontend\models\TechnicalProficiency::findOne(Yii::$app->user->getId());
        $workexp = \frontend\models\WorkExperience::findOne(Yii::$app->user->getId());
        $bar=0;
        if(!is_null($basicinfo))
        {
            $bar=20;
        }
        if(!is_null($edudet))
        {
            $bar=$bar+20;
        }
        if(!is_null($projects))
        {
            $bar=$bar+20;
        }

        if(!is_null($techprof))
        {
            $bar=$bar+20;
        }
        if(!is_null($workexp))
        {
            $bar=$bar+20;
        }
        else
        {
            $bar=$bar;
        }

        $this->message=$bar;
    }

    
     
    public function run(){
        return Html::encode($this->message);
    }
  
}