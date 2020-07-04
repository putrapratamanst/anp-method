<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Biodata */

$this->title = 'Input Biodata';
// $this->params['breadcrumbs'][] = ['label' => 'Biodatas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
