<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\WorkExperience */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resume-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'carreer_obj')->textInput(['maxlength' => 100]) ?>
   
    <?= $form->field($model, 'awards')->textInput(['maxlength' => 100]) ?>
    <?= $form->field($model, 'languagesknown')->textInput(['maxlength' => 100]) ?>
    <?= $form->field($model, 'sem1')->textInput(['maxlength' => 5]) ?>
    <?= $form->field($model, 'sem2')->textInput(['maxlength' => 5]) ?>
    <?= $form->field($model, 'sem3')->textInput(['maxlength' => 5]) ?>
    <?= $form->field($model, 'sem4')->textInput(['maxlength' => 5]) ?>
    <?= $form->field($model, 'sem5')->textInput(['maxlength' => 5]) ?>
    <?= $form->field($model, 'sem6')->textInput(['maxlength' => 5]) ?>
    <?= $form->field($model, 'sem7')->textInput(['maxlength' => 5]) ?>
    <?= $form->field($model, 'sem8')->textInput(['maxlength' => 5]) ?>

    


    <div class="form-group">
         <?= Html::submitButton($model->isNewRecord ? 'Generate Resume' : 'Generate Resume', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
