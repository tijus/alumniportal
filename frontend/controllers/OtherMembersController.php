<?php

namespace frontend\controllers;

class OtherMembersController extends \yii\web\Controller
{
    public function actionMembers()
    {
        return $this->render('members');
    }

}
