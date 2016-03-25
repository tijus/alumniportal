<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProfilePics */

$this->title = $model->profile_pic_id;
$this->params['breadcrumbs'][] = ['label' => 'Profile Pics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-pics-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->profile_pic_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->profile_pic_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'profile_pic_id',
            'image_path',
        ],
    ]) ?>

</div>
