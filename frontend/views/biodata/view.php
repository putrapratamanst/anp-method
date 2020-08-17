<?php

use frontend\models\Berkas;
use frontend\models\Biodata;
use frontend\models\Jurusan;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Biodata */

$userName = Yii::$app->user->identity->username;
$biodata = Biodata::find()->where(['nama_lengkap' => $userName])->one();
$checkBerkas = Berkas::find()->where(['biodata_id' => $biodata->id])->one();
$route = [
    "/berkas/create",
    'id' => $biodata->id
];

if ($checkBerkas) {
    $route = [
        "/berkas/view",
        'id' => $checkBerkas->id
    ];
}
$this->title = $model->nama_lengkap;
// $this->params['breadcrumbs'][] = ['label' => 'Biodatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="biodata-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Upload Berkas', $route, ['class' => 'btn btn-danger pull-right']) ?>

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
        ],
    ]) ?>
    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr>
                <th style="text-align: center;">Matakuliah</th>
            </tr>
            <?php
            if ($biodataToJurusan) {
                foreach ($biodataToJurusan as $key => $value) {
                    $matakuliah = Jurusan::find()->where(['id' => $value['id_jurusan']])->one();
            ?>
                    <tr>
                        <td><?= $matakuliah->nama?></td>
                    </tr>

            <?php }
            }

            ?>
            <?php ?>
        </tbody>
    </table>
</div>
