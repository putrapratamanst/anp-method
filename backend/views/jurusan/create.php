<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jurusan */

$this->title = 'Create Matakuliah';
$this->params['breadcrumbs'][] = ['label' => 'Matakuliah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurusan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
