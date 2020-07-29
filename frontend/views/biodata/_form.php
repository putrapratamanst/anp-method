<?php

use dosamigos\datepicker\DatePicker;
use frontend\models\Jabatan;
use frontend\models\Jurusan;
use frontend\models\Prodi;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Biodata */
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
    <?php if ($model->isNewRecord) { ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?php } ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(
        DatePicker::className(),
        [
            // inline too, not bad
            'inline' => true,
            // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd '
            ]
        ]
    ); ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(
        ['laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan'],
        ['prompt' => 'Pilih Jenis Kelamin']
    ); ?>

    <?= $form->field($model, 'pendidikan')->dropDownList(
        ['s1' => 'S1', 's2' => 'S2', 's3' => 'S3'],
        ['prompt' => 'Pilih Pendidikan']
    ); ?>
    <?= $form->field($model, 'pangkat')->dropDownList(
        ['dosen_tetap' => 'Dosen Tetap']
    ); ?>

    <!-- <?= $form->field($model, 'pangkat')->textInput(['maxlength' => true]) ?> -->

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
        <?php if (!$model->isNewRecord) {?>
        <?= Html::a('Back', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?php } ?>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
