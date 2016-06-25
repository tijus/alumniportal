<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EducationalDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="educational-details-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'degree')->dropDownList([' '=>'Select','First Year Engineering'=>'First Year Engineering','Second Year Engineering'=>'Second Year Engineering','Third Year Engineering'=>'Third Year Engineering','Fourth Year Engineering'=>'Fourth Year Engineering','O'=>'Others']); ?>

    <?= $form->field($model, 'grade')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'stream')->dropDownList([' '=>'Select','Computer Engineering'=>'Computer Engineering','Electronics'=>'Electronics','Electronics and Telecommunication'=>'Electronics and Telecommunication','Information Technology'=>'Information Technology']); ?>
    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Next' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php 
        {
        if($model->isNewRecord)
        {
         echo "&nbsp;&nbsp;&nbsp;";
         echo Html::a('Skip', ['form/projects']); 
         echo "&nbsp;&nbsp;&nbsp;";
         echo Html::a('Skip All', ['form/members-area']);
        }
        else
        {
            
           
        }
        }?>
         
    </div>

    <?php ActiveForm::end(); ?>

</div>
