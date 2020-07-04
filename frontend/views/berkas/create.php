<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Berkas */

$this->title = 'Create Berkas';
$this->params['breadcrumbs'][] = ['label' => 'Berkas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berkas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
