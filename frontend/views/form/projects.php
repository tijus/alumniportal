<!--<nav>
  <ul class="pagination">
    <li class="disabled">
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="disabled"><a href="#">Basic Information<span class="sr-only">(current)</span></a></li>
    <li class="disabled"><a href="#">Educational details</a></li>
    <li class="active"><a href="#">Areas Of Interest</a></li>
    <li><a href="index.php?r=technical-proficiency/create">Technical Proficieny</a></li>
    <li><a href="index.php?r=work-experience/create">Work Experience</a></li>
    <li>
      <a href="index.php?r=technical-proficiency/create" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>-->
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Projects */

$this->title = 'Areas of Interest';
//$this->params['breadcrumbs'][] = ['label' => 'Areas of Interest', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('projects_form', [
        'model' => $model,
    ]) ?>

</div>
