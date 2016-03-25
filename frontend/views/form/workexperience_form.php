<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\WorkExperience */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-experience-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList([' '=>'Select','Internship'=>'Internship', 'Job'=>'Job']); ?>
   
    <?= $form->field($model, 'company_name')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'job_title')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'start_date')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
