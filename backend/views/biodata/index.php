<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BiodataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Biodata';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="x_panel">

    <div class="biodata-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'nip',
                'nama_lengkap',
                // 'user_id',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                //'pendidikan',
                //'pangkat',
                //'position',
                //'work_unit',
                //'jabatan',
                //'prodi',
                //'jurusan',

                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}',],
            ],
        ]); ?>


    </div>
</div>
