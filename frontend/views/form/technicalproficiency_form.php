<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TechnicalProficiency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technical-proficiency-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'skill')->textInput(['maxlength' => 20]) ?>

  <?= $form->field($model, 'level')->dropDownList([' '=>'Select','Beginner'=>'Beginner', 'Intermediate'=>'Intermediate','Professional'=>'Professional']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Next' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php
        if($model->isNewRecord)
        {
          echo "&nbsp;&nbsp;&nbsp;";
          echo Html::a('Skip', ['form/work-experience']);
          echo "&nbsp;&nbsp;&nbsp;";
           echo Html::a('Skip All', ['form/members-area']);
        } 
           else{}?>
        
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
