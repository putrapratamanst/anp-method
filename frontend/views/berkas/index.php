<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BerkasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berkas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berkas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Berkas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'biodata_id',
            'nama_berkas1',
            'alamat_berkas1',
            'nama_berkas2',
            //'alamat_berkas2',
            //'nama_berkas3',
            //'alamat_berkas3',
            //'nama_berkas4',
            //'alamat_berkas4',
            //'nama_berkas5',
            //'alamat_berkas5',
            //'nama_berkas6',
            //'alamat_berkas6',
            //'nama_berkas7',
            //'alamat_berkas7',
            //'nama_berkas8',
            //'alamat_berkas8',
            //'nama_berkas9',
            //'alamat_berkas9',
            //'nama_berkas10',
            //'alamat_berkas10',
            //'nama_berkas11',
            //'alamat_berkas11',
            //'nama_berkas12',
            //'alamat_berkas12',
            //'nama_berkas13',
            //'alamat_berkas13',
            //'nama_berkas14',
            //'alamat_berkas14',
            //'nama_berkas15',
            //'alamat_berkas15',
            //'nama_berkas16',
            //'alamat_berkas16',
            //'nama_berkas17',
            //'alamat_berkas17',
            //'nama_berkas18',
            //'alamat_berkas18',
            //'nama_berkas19',
            //'alamat_berkas19',
            //'nama_berkas20',
            //'alamat_berkas20',
            //'nama_berkas21',
            //'alamat_berkas21',
            //'nama_berkas22',
            //'alamat_berkas22',
            //'nama_berkas23',
            //'alamat_berkas23',
            //'nama_berkas24',
            //'alamat_berkas24',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
