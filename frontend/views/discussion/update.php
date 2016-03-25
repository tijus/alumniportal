<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Discussion */

$this->title = 'Update Discussion: ' . ' ' . $model->discussion_id;
$this->params['breadcrumbs'][] = ['label' => 'Discussions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->discussion_id, 'url' => ['view', 'id' => $model->discussion_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="discussion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
