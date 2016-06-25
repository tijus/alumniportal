<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Projects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-form">

    <?php $form = ActiveForm::begin(); ?>

  



    <?= $form->field($model, 'domain')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Next' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        
        <?php
        if($model->isNewRecord)
        {
        echo "&nbsp;&nbsp;&nbsp;";
        echo Html::a('Skip', ['form/technical-proficiency']);
        echo "&nbsp;&nbsp;&nbsp;";
         echo Html::a('Skip All', ['form/members-area']);
        }
        else
        {}
         ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
