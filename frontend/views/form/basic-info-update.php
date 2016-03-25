<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Owner */

$this->title = 'Update your Basic Information: '
//$this->params['breadcrumbs'][] = ['label' => 'Basic', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="basic-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('basicinfo_form', [
        'model' => $model,
    ]) ?>

</div>
