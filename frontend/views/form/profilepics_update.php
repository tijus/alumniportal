<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProfilePics */

$this->title = 'Update Profile Pics: ' . ' ' . $model->profile_pic_id;
$this->params['breadcrumbs'][] = ['label' => 'Profile Pics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->profile_pic_id, 'url' => ['view', 'id' => $model->profile_pic_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-pics-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('profilepics_form', [
        'model' => $model,
    ]) ?>

</div>


