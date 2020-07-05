<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KriteriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kriterias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kriteria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kriteria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'kriteria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
