<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Berkas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berkas-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'nama_berkas1')->fileInput() ?>

    <?php

    if ($model->nama_berkas1) {
        $nama_berkas1 = str_replace($baseUrl, "", $model->nama_berkas1);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas1');",
            $nama_berkas1,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas2')->fileInput() ?>

    <?php

    if ($model->nama_berkas2) {
        $nama_berkas2 = str_replace($baseUrl, "", $model->nama_berkas2);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas2');",
            $nama_berkas2,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas3')->fileInput() ?>

    <?php

    if ($model->nama_berkas3) {
        $nama_berkas3 = str_replace($baseUrl, "", $model->nama_berkas3);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas3');",
            $nama_berkas3,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas4')->fileInput() ?>

    <?php

    if ($model->nama_berkas4) {
        $nama_berkas4 = str_replace($baseUrl, "", $model->nama_berkas4);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas4');",
            $nama_berkas4,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas5')->fileInput() ?>

    <?php

    if ($model->nama_berkas5) {
        $nama_berkas5 = str_replace($baseUrl, "", $model->nama_berkas5);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas5');",
            $nama_berkas5,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas1')->fileInput() ?>

    <?php

    if ($model->nama_berkas6) {
        $nama_berkas6 = str_replace($baseUrl, "", $model->nama_berkas6);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas6');",
            $nama_berkas6,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas7')->fileInput() ?>

    <?php

    if ($model->nama_berkas7) {
        $nama_berkas7 = str_replace($baseUrl, "", $model->nama_berkas7);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas7');",
            $nama_berkas7,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas8')->fileInput() ?>

    <?php

    if ($model->nama_berkas8) {
        $nama_berkas8 = str_replace($baseUrl, "", $model->nama_berkas8);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas8');",
            $nama_berkas8,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas9')->fileInput() ?>

    <?php

    if ($model->nama_berkas9) {
        $nama_berkas9 = str_replace($baseUrl, "", $model->nama_berkas9);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas9');",
            $nama_berkas9,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas10')->fileInput() ?>

    <?php

    if ($model->nama_berkas10) {
        $nama_berkas10 = str_replace($baseUrl, "", $model->nama_berkas10);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas10');",
            $nama_berkas10,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas11')->fileInput() ?>

    <?php

    if ($model->nama_berkas11) {
        $nama_berkas11 = str_replace($baseUrl, "", $model->nama_berkas11);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas11');",
            $nama_berkas11,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas12')->fileInput() ?>

    <?php

    if ($model->nama_berkas12) {
        $nama_berkas12 = str_replace($baseUrl, "", $model->nama_berkas12);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas12');",
            $nama_berkas12,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas13')->fileInput() ?>

    <?php

    if ($model->nama_berkas13) {
        $nama_berkas13 = str_replace($baseUrl, "", $model->nama_berkas13);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas13');",
            $nama_berkas13,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas14')->fileInput() ?>

    <?php

    if ($model->nama_berkas14) {
        $nama_berkas14 = str_replace($baseUrl, "", $model->nama_berkas14);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas14');",
            $nama_berkas14,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas15')->fileInput() ?>

    <?php

    if ($model->nama_berkas15) {
        $nama_berkas15 = str_replace($baseUrl, "", $model->nama_berkas15);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas15');",
            $nama_berkas15,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas16')->fileInput() ?>

    <?php

    if ($model->nama_berkas16) {
        $nama_berkas16 = str_replace($baseUrl, "", $model->nama_berkas16);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas16');",
            $nama_berkas16,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas17')->fileInput() ?>

    <?php

    if ($model->nama_berkas17) {
        $nama_berkas17 = str_replace($baseUrl, "", $model->nama_berkas17);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas17');",
            $nama_berkas17,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas18')->fileInput() ?>

    <?php

    if ($model->nama_berkas18) {
        $nama_berkas18 = str_replace($baseUrl, "", $model->nama_berkas18);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas18');",
            $nama_berkas18,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <?= $form->field($model, 'nama_berkas19')->fileInput() ?>

    <?php

    if ($model->nama_berkas19) {
        $nama_berkas19 = str_replace($baseUrl, "", $model->nama_berkas19);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas19');",
            $nama_berkas19,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">
    <?= $form->field($model, 'nama_berkas20')->fileInput() ?>

    <?php

    if ($model->nama_berkas20) {
        $nama_berkas20 = str_replace($baseUrl, "", $model->nama_berkas20);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas20');",
            $nama_berkas20,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">
    <?= $form->field($model, 'nama_berkas21')->fileInput() ?>

    <?php

    if ($model->nama_berkas21) {
        $nama_berkas21 = str_replace($baseUrl, "", $model->nama_berkas21);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas21');",
            $nama_berkas21,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">
    <?= $form->field($model, 'nama_berkas22')->fileInput() ?>

    <?php

    if ($model->nama_berkas22) {
        $nama_berkas22 = str_replace($baseUrl, "", $model->nama_berkas22);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas22');",
            $nama_berkas22,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">
    <?= $form->field($model, 'nama_berkas23')->fileInput() ?>

    <?php

    if ($model->nama_berkas23) {
        $nama_berkas23 = str_replace($baseUrl, "", $model->nama_berkas23);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas23');",
            $nama_berkas23,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">
    <?= $form->field($model, 'nama_berkas24')->fileInput() ?>

    <?php

    if ($model->nama_berkas24) {
        $nama_berkas24 = str_replace($baseUrl, "", $model->nama_berkas24);

        echo Html::a(
            "Lihat $model->getAttributeLabel('nama_berkas24');",
            $nama_berkas24,
            [
                'title' => 'Go!',
                'target' => '_blank'
            ]
        );
    }
    ?>
    <hr class="new5">

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
    hr.new5 {
        border-top: 1px dashed red;
    }
</style>
