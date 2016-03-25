<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\BasicInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="basic-info-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php 
// with an ActiveForm instance 
?>
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 25]) ?>
    
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 25]) ?>
    
    <?= $form->field($model, 'DOB')->widget
        (
            DatePicker::className(), 
                [
                    // inline too, not bad
                    'inline' => false, 
                    // modify template for custom rendering
                    //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                    'clientOptions' => 
                        [
                            'autoclose' => false,
                            'format' => 'dd-M-yyyy'
                        ]
                ]
        );
    ?>
 
    
    <?= $form->field($model, 'gender')->radioList(array('1'=>'Male',2=>'Female')); ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'mobile_no')->textInput() ?>

    <?= $form->field($model, 'corr_address')->textArea(['maxlength' => 100]) ?>

    <?= $form->field($model, 'permanent_address')->textArea(['maxlength' => 100]) ?>

    <?= $form->field($model, 'batch')->textInput(['maxlength' => 25]) ?>
    
    <?= $form->field($model, 'website')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'hobbies')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'marital_status')->dropDownList(['N'=>'Select','Single'=>'Single', 'Engaged'=>'Engaged','Married'=>'Married', 'Divorced'=>'Divorced','Widowed'=>'Widowed']); ?>
    
    <?= $form->field($model, 'status')->dropDownList(['N' => 'Select', 'Alumni' => 'Alumni', 'Student' => 'Student']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Next' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         
    </div>
  

    <?php ActiveForm::end(); ?>

</div>
