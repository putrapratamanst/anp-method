<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Berkas */

$this->title = $biodata->nama_lengkap;
// $this->params['breadcrumbs'][] = ['label' => 'Berkas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="berkas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back', ['/'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute' => 'nama_berkas1',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas1) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas1);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas2',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas2) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas2);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas3',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas3) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas3);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas4',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas4) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas4);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas5',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas5) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas5);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas6',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas6) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas6);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas7',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas7) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas7);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas8',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas8) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas8);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas9',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas9) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas9);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas10',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas10) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas10);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas11',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas11) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas11);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas12',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas12) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas12);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas13',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas13) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas13);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas14',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas14) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas14);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas15',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas15) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas15);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas16',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas16) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas16);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas17',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas17) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas17);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas18',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas18) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas18);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas19',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas19) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas19);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas20',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas20) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas20);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas21',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas21) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas21);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas22',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas22) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas22);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas23',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas23) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas23);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
            [
                'attribute' => 'nama_berkas24',
                'format'    => 'raw',
                'value' => function ($model) {
                    if ($model->nama_berkas24) {

                        $baseUrl = Yii::getAlias('@frontend/web');
                        $newUrl = str_replace($baseUrl, "", $model->nama_berkas24);
                        return Html::a(
                            'Lihat Berkas',
                            $newUrl,
                            [
                                'title' => 'Go!',
                                'target' => '_blank'
                            ]
                        );
                    }
                }
            ],
        ],
    ]) ?>

</div>
