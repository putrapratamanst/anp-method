<?php

use frontend\models\Berkas;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Biodata */

$this->title = $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Biodata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="x_panel">

    <div class="biodata-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-paper-plane"> Email Verifikasi Jabfung</i>', ['email', 'id' => $model->id], ['class' => 'btn btn-success pull-right']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'nama_lengkap',
                'nip',
                // 'user_id',
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
        <table id="w0" class="table table-striped table-bordered detail-view">
            <tbody>
                <tr>
                    <th style="text-align: center;">Jenis Berkas</th>
                    <th style="text-align: center;">Status Berkas</th>
                </tr>
                <?php
                $berkas = Berkas::find()->where(['biodata_id' => $model->id])->one();
                $attribute = $berkas->attributeLabels();
                foreach ($berkas as $key => $value) {
                ?>
                    <tr>
                        <?php if (strpos($key, 'nama_berkas') !== false) { ?>
                            <td><?= $attribute[$key]; ?></td>
                            <td><?php 
                            if($value){
                                echo "Sudah Diupload";
                            } else {
                                echo "Belum Diupload";
                            } ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
