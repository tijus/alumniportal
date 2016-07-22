<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Owner */

$this->title = 'Generate Resume';
//$this->params['breadcrumbs'][] = ['label' => 'Basic', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resume-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('resume_form', [
        'model' => $model,
    ]) ?>

</div>
