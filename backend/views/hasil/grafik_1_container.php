<?php

use backend\controllers\PerbandinganKriteriaController;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$listKriteria = PerbandinganKriteriaController::listKriteria();

?>
<h3 style="text-align:left; font-size:16px; margin-bottom:10px; font-weight:bold;">Grafik Nilai Eigen Kriteria dan Hasil Sintesize</h3>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure" style="display:none">
    <?= Html::dropDownList(
        'id_kriteria',
        null,
        ArrayHelper::map($listKriteria, 'id', 'kriteria')
    ) ?>
</figure>

<div id="container" style="width:100%; height:400px;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $.getJSON('grafik', function(chartData) {
            var myChart = Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                plotOptions: {
                    column: {
                        colorByPoint: true
                    }
                },
                colors: [
                    '#B71C1C',
                    '#9C27B0',
                    '#2196F3'
                ],
                title: {
                    text: 'Grafik Nilai Eigen Kriteria dan Hasil Sintesize'
                },
                xAxis: {
                    categories: chartData.alternatif,

                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },
                series: [{
                    "name": 'Alternatif',
                    "data": chartData.data,

                }]
                // series: chartData
            });
            console.log(chartData)
        })
    });
</script>
