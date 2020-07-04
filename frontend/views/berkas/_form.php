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

    <?= $form->field($model, 'nama_berkas2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas8')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas9')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas11')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas12')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas13')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas14')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas16')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas17')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas18')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas19')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas20')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas21')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas22')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas23')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas24')->textInput(['maxlength' => true]) ?>

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
