
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\WorkExperience */
$this->title = 'Generate Resume: '

//$this->params['breadcrumbs'][] = ['label' => 'Work Experiences', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resume-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('resume_form', [
        'model' => $model,
    ]) ?>

</div>
