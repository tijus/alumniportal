<?php

namespace frontend\controllers;
use frontend\models\BasicInfo;

class UpdateDetailsController extends \yii\web\Controller
{
    
    public function actionIndex()
    {
        return $this->render('index');
    }
     public function actionBasicInfo($id)
    {
        $model = $this->findModel(Yii::$app->user->getId());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['form/index', 'id' => $model->id]);
        } else {
            return $this->render('basicinfo', [
                'model' => $model,
            ]);
        }
    }
     protected function findModel()
    {
        if (($model = BasicInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
