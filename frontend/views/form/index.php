<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Button;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\models\Boat */

//$this->title = $basicinfo->basic_info_id;
//$this->params['breadcrumbs'][] = ['label' => 'Basic Information'];
//$this->params['breadcrumbs'][] = $this->title;

?>




<div class="basicinfo-view">
    <h1>Your Details</h1>    
    <table><hr></hr></table>
    
    <h3><b>Basic Information</b></h3>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'first_name',
            'last_name',
            'DOB',
            'gender',
            'country',
            'mobile_no',
            'corr_address',
            'permanent_address',
            'batch',
            'website',
            'hobbies',
            'marital_status',
            'status',
        ],
    ]) ?>
    <div class="col-2" align="right">
      
 <?= Html::a('Edit Details', ['basic-info-update','id'=>Yii::$app->user->getId()], ['class' => 'btn btn-primary']) ?>
         
 </div>
</div>
<div class="educational-details-view">

    <h3><b><?= Html::encode('Educational Details') ?></b></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'degree',
            'grade',
            'stream',
            
        ],
    ]) ?>
    <div class="col-2" align="right">
  <?= Html::a('Edit Details', ['educational-details-update','id'=>Yii::$app->user->getId()], ['class' => 'btn btn-primary']) ?>
</div>
</div>
<div class="project-view">

    <h3><b><?= Html::encode('Areas of Interest') ?></b></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'year',
            'domain',
            'description',
        ],
    ]) ?>

    <div class="col-2" align="right">
 <?= Html::a('Edit Details', ['projects-update','id'=>Yii::$app->user->getId()], ['class' => 'btn btn-primary']) ?>
</div>
</div>
<div class="technical-proficiency-view">
   

    <h3><b><?= Html::encode('Technical Proficiency') ?></b></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'skill',
            'level',
            
        ],
    ]) ?>
    <div class="col-2" align="right">
 <?= Html::a('Edit Details', ['technical-proficiency-update','id'=>Yii::$app->user->getId()], ['class' => 'btn btn-primary']) ?>
</div>
</div>
<div class="work-experience-view">

    <h3><b><?= Html::encode('Work-Experience') ?></b></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'type',
            'company_name',
            'job_title',
            'start_date',
         ],
    ]) ?>
    <div class="col-2" align="right">
 <?= Html::a('Edit Details', ['work-experience-update','id'=>Yii::$app->user->getId()], ['class' => 'btn btn-primary']) ?>
</div>
</div>
