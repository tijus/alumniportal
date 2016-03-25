<?php
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Message */


$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-create">

   

    <?= $this->render('message_form', [
        'model' => $model,
        'var' => $var,
    ]) ?>

</div>