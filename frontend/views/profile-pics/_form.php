<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProfilePics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-pics-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image_path')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
