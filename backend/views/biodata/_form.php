<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Jabatan;
use frontend\models\Jurusan;
use frontend\models\Prodi;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Biodata */
/* @var $form yii\widgets\ActiveForm */

$jabatan = Jabatan::find()->all();
$jabatanList = ArrayHelper::map($jabatan, 'id', 'nama');

$prodi = Prodi::find()->all();
$prodiList = ArrayHelper::map($prodi, 'id', 'nama_prodi');

$jurusan = Jurusan::find()->all();
$jurusanList = ArrayHelper::map($jurusan, 'id', 'nama');
?>


<div class="biodata-form">



    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pendidikan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pangkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jabatan')->dropDownList(
        $jabatanList, 
        ['prompt' => 'Pilih Jabatan']
    ); ?>

    <?= $form->field($model, 'prodi')->dropDownList(
        $prodiList,
        ['prompt' => 'Pilih Prodi']
    ); ?>

    <?= $form->field($model, 'jurusan')->dropDownList(
        $jurusanList,
        ['prompt' => 'Pilih Jurusan']
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
