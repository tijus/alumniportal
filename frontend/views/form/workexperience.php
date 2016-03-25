<!--<nav>
  <ul class="pagination">
    <li class="disabled">
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="disabled"><a href="#">Basic Information<span class="sr-only">(current)</span></a></li>
    <li class="disabled"><a href="#">Educational details</a></li>
    <li class="disabled"><a href="#">Areas Of Interest</a></li>
    <li class="disabled"><a href="#">Technical Proficieny</a></li>
    <li class="active"><a href="#">Work Experience</a></li>
    <li>
      <a href="index.php?r=members-area/index" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>-->
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\WorkExperience */

$this->title = 'Work Experience';
//$this->params['breadcrumbs'][] = ['label' => 'Work Experiences', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-experience-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('workexperience_form', [
        'model' => $model,
    ]) ?>

</div>
