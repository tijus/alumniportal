<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
//use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model frontend\models\BasicInfo */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php if($model->isNewRecord)
{
    
?>
<div class="basic-info-form">
    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>
    
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
                    //template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                    'clientOptions' => 
                        [
                            'autoclose' => false,
                            'format' => 'dd-M-yyyy'
                        ]
                ]
        );
    ?>
  
 
    
    <?= $form->field($model, 'gender')->radioList(array('M'=>'Male','F'=>'Female')); ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'mobile_no')->textInput() ?>

    <?= $form->field($model, 'corr_address')->textArea(['maxlength' => 100]) ?>

    <?= $form->field($model, 'permanent_address')->textArea(['maxlength' => 100]) ?>

    <?= $form->field($model, 'batch')->dropDownList([''=>'Select', '2005'=>'2005', '2006'=>'2006', '2007'=>'2007', '2008'=>'2008', '2009'=>'2009', '2010'=>'2010', '2011'=>'2011', '2012'=>'2012', '2013'=>'2013', '2014'=>'2014', '2015'=>'2015', '2016'=>'2016', '2017'=>'2017', '2018'=>'2018', '2019'=>'2019', '2020'=>'2020']); ?>

   
    
    <?= $form->field($model, 'website')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'hobbies')->textInput(['maxlength' => 50]) ?>

    
    
    <?= $form->field($model, 'status')->dropDownList(['' => 'Select', 'Alumni' => 'Alumni', 'Student' => 'Student']); ?>
    
    <div class="form-group">
        <?= Html::submitButton('Next' , ['class' => 'btn btn-success' ]) ?>
         <?php ActiveForm::end(); ?>

</div>
         
    </div>
<?php }
else
{
    ?>

    <div class="basic-info-form">
    <?php $form = ActiveForm::begin(); ?>
    
    <?php 
// with an ActiveForm instance 
?>
  
    <?= $form->field($model, 'country')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'mobile_no')->textInput() ?>

    <?= $form->field($model, 'corr_address')->textArea(['maxlength' => 100]) ?>

    <?= $form->field($model, 'permanent_address')->textArea(['maxlength' => 100]) ?>

    
    
    <?= $form->field($model, 'website')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'hobbies')->textInput(['maxlength' => 50]) ?>

    
    
    <?= $form->field($model, 'status')->dropDownList(['N' => 'Select', 'Alumni' => 'Alumni', 'Student' => 'Student']); ?>
    
    <div class="form-group">
        <?= Html::submitButton('Update' , ['class' => 'btn btn-primary' ]) ?>
         <?php ActiveForm::end(); ?>

</div>
        
    </div>
         
    <?php
} 
?>
  

   
