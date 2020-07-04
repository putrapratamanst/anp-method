<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BerkasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berkas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'biodata_id') ?>

    <?= $form->field($model, 'nama_berkas1') ?>

    <?= $form->field($model, 'alamat_berkas1') ?>

    <?= $form->field($model, 'nama_berkas2') ?>

    <?php // echo $form->field($model, 'alamat_berkas2') ?>

    <?php // echo $form->field($model, 'nama_berkas3') ?>

    <?php // echo $form->field($model, 'alamat_berkas3') ?>

    <?php // echo $form->field($model, 'nama_berkas4') ?>

    <?php // echo $form->field($model, 'alamat_berkas4') ?>

    <?php // echo $form->field($model, 'nama_berkas5') ?>

    <?php // echo $form->field($model, 'alamat_berkas5') ?>

    <?php // echo $form->field($model, 'nama_berkas6') ?>

    <?php // echo $form->field($model, 'alamat_berkas6') ?>

    <?php // echo $form->field($model, 'nama_berkas7') ?>

    <?php // echo $form->field($model, 'alamat_berkas7') ?>

    <?php // echo $form->field($model, 'nama_berkas8') ?>

    <?php // echo $form->field($model, 'alamat_berkas8') ?>

    <?php // echo $form->field($model, 'nama_berkas9') ?>

    <?php // echo $form->field($model, 'alamat_berkas9') ?>

    <?php // echo $form->field($model, 'nama_berkas10') ?>

    <?php // echo $form->field($model, 'alamat_berkas10') ?>

    <?php // echo $form->field($model, 'nama_berkas11') ?>

    <?php // echo $form->field($model, 'alamat_berkas11') ?>

    <?php // echo $form->field($model, 'nama_berkas12') ?>

    <?php // echo $form->field($model, 'alamat_berkas12') ?>

    <?php // echo $form->field($model, 'nama_berkas13') ?>

    <?php // echo $form->field($model, 'alamat_berkas13') ?>

    <?php // echo $form->field($model, 'nama_berkas14') ?>

    <?php // echo $form->field($model, 'alamat_berkas14') ?>

    <?php // echo $form->field($model, 'nama_berkas15') ?>

    <?php // echo $form->field($model, 'alamat_berkas15') ?>

    <?php // echo $form->field($model, 'nama_berkas16') ?>

    <?php // echo $form->field($model, 'alamat_berkas16') ?>

    <?php // echo $form->field($model, 'nama_berkas17') ?>

    <?php // echo $form->field($model, 'alamat_berkas17') ?>

    <?php // echo $form->field($model, 'nama_berkas18') ?>

    <?php // echo $form->field($model, 'alamat_berkas18') ?>

    <?php // echo $form->field($model, 'nama_berkas19') ?>

    <?php // echo $form->field($model, 'alamat_berkas19') ?>

    <?php // echo $form->field($model, 'nama_berkas20') ?>

    <?php // echo $form->field($model, 'alamat_berkas20') ?>

    <?php // echo $form->field($model, 'nama_berkas21') ?>

    <?php // echo $form->field($model, 'alamat_berkas21') ?>

    <?php // echo $form->field($model, 'nama_berkas22') ?>

    <?php // echo $form->field($model, 'alamat_berkas22') ?>

    <?php // echo $form->field($model, 'nama_berkas23') ?>

    <?php // echo $form->field($model, 'alamat_berkas23') ?>

    <?php // echo $form->field($model, 'nama_berkas24') ?>

    <?php // echo $form->field($model, 'alamat_berkas24') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
