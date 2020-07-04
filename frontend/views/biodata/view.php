<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Biodata */

$this->title = $model->nama_lengkap;
// $this->params['breadcrumbs'][] = ['label' => 'Biodatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="biodata-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_lengkap',
            'nip',
            'user_id',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'pendidikan',
            'pangkat',
            'position',
            'work_unit',
            'prodis.nama_prodi',
            'jabatans.nama',
            'jurusans.nama',
        ],
    ]) ?>

</div>
