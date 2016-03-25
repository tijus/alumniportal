<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ProfilePics */

$this->title = 'Create Profile Pics';
$this->params['breadcrumbs'][] = ['label' => 'Profile Pics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-pics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('profilepics_form', [
        'model' => $model,
    ]) ?>

</div>
