<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EducationalDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="educational-details-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'degree')->dropDownList([' '=>'Select','FE'=>'First Year Engineering','SE'=>'Second Year Engineering','TE'=>'Third Year Engineering','BE'=>'Fourth Year Engineering','O'=>'Others']); ?>

    <?= $form->field($model, 'grade')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'stream')->dropDownList([' '=>'Select','CS'=>'Computer Engineering','ETX'=>'Electronics','EXTC'=>'Electronics and Telecommunication','IT'=>'Information Technology']); ?>
    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Next' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php 
        {
        if($model->isNewRecord)
        {
         echo Html::a('Skip', ['form/projects']); 
         echo Html::a('Skip All', ['form/members-area']);
        }
        else
        {
            
           
        }
        }?>
         
    </div>

    <?php ActiveForm::end(); ?>

</div>
