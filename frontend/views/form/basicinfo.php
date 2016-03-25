
<?php


use yii\helpers\Html;

//
///* @var $this yii\web\View */
///* @var $model frontend\models\BasicInfo */
//
$this->title = 'Basic Information';
//$this->params['breadcrumbs'][] = ['label' => 'Basic Info', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="basic-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('basicinfo_form', [
        'model' => $model,
    ]) ?>

</div>
