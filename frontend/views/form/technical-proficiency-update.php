<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Owner */

$this->title = 'Update your Technical Proficiency: '
//$this->params['breadcrumbs'][] = ['label' => 'Basic', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="technical-proficiency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('technicalproficiency_form', [
        'model' => $model,
    ]) ?>

</div>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

