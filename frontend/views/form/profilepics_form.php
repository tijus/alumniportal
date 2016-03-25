<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProfilePics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-pics-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?php
	if ($model->image_path) {
	    echo '<img src="'.\Yii::$app->request->BaseUrl.'/'.$model->image_path.'" width="90px">&nbsp;&nbsp;&nbsp;';
	    echo Html::a('Delete Logo', ['deleteimg', 'id'=>$model->profile_pic_id, 'field'=> 'logo'], ['class'=>'btn btn-danger']).'<p>';
	}
	?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


