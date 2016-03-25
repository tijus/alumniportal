<?php


namespace frontend\widgets;
use yii\helpers\Html;
use frontend\models\BasicInfo;
use Yii;


class Notifications extends \yii\bootstrap\Widget
{
  public $message;
     
    public function init(){
        parent::init();
        $basicinfo = \frontend\models\BasicInfo::findOne(Yii::$app->user->getId());
        $edudet = \frontend\models\EducationalDetails::findOne(Yii::$app->user->getId());
        $projects= \frontend\models\Projects::findOne(Yii::$app->user->getId());
        $techprof = \frontend\models\TechnicalProficiency::findOne(Yii::$app->user->getId());
        $workexp = \frontend\models\WorkExperience::findOne(Yii::$app->user->getId());
        if(is_null($basicinfo)){
            $this->message= 0;
        }
         else if(is_null($edudet))
        {
            $this->message=20;
        }
        
        else if(is_null($projects)){
            $this->message= 40;
        }

        else if(is_null($techprof)){
            $this->message= 60;
        }
        else if(is_null($workexp)){
            $this->message= 80;
        }
        else{
            $this->message= 100;
        }
    }
     
    public function run(){
        return Html::encode($this->message);
    }
  
}

    

