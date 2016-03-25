<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DiscussionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Discussions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discussion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <a href="../../../vendor/yiisoft/yii2/grid/ActionColumn.php"></a>
        <?= Html::a('Create Discussion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'discussion_id',
            'discussion_name',
            'discussion_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
