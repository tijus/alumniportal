<!--<nav>
  <ul class="pagination">
    <li class="disabled">
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="disabled"><a href="#">Basic Information<span class="sr-only">(current)</span></a></li>
    <li class="active"><a href="#">Educational details</a></li>
    <li><a href="index.php?r=projects/create">Areas Of Interest</a></li>
    <li><a href="index.php?r=technical-proficiency/create">Technical Proficieny</a></li>
    <li><a href="index.php?r=work-experience/create">Work Experience</a></li>
    <li>
      <a href="index.php?r=projects/create" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>-->
<?php

use yii\helpers\Html;
//
//
///* @var $this yii\web\View */
///* @var $model frontend\models\EducationalDetails */
//
$this->title = 'Educational Details';
//$this->params['breadcrumbs'][] = ['label' => 'Educational Details', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="educational-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('educationaldetails_form', [
        'model' => $model,
    ]) ?>

</div>
