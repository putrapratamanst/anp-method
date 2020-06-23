<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="row">
        <div class="col-lg-12">
            <img src="<?= Yii::getAlias('@web/template/production/') ?>images/logo_poltekpos.png" alt="..." class="img profile_img">
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['autocomplete' => 'off']]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<div class="separator">
    <div>
        <h1><i class="fa fa-home"></i> POLITEKNIK POS INDONESIA</h1>
        <p>©<?= date('Y'); ?> All Rights Reserved. POLITENIK POS INDONESIA</p>
    </div>
</div>
