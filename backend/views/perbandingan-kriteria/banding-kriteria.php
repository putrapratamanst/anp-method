<?php

use backend\models\MatriksPerbandinganBerpasangan;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>
<div class="x_panel">

    <div class="jabatan-index">

        <h1>Perbandingan Kriteria</h1>

        <div id="w0" class="grid-view">

            <div class="col-md-2" style="margin: 10px;padding:10px">
                <?= Html::dropDownList(
                    'id',
                    $selectedDataAlternatif,
                    $dataAlternatif,
                    ['class' => 'form-control', 'onchange' => 'redirect()', 'id' => 'list-alternatif']
                );
                ?>
            </div>
        </div>
        <form action="proses-update" method="post">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th width="4%">No.</th>
                        <th width="18%">Alternatif Kriteria</th>
                        <th width="55%" style="text-align:center;">Pilih Nilai</th>
                        <th width="18%">Alternatif Kriteria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($newListKriteriaPerbandingan as $values) { ?>

                        <tr>
                            <td>
                                <input type="hidden" name="id_nilai_pasangan[]" value=<?= $values['id_nilai_pasangan'] ?>>
                                <?= $no; ?> </td>
                            <td><?= $values['kiri']['kriteria'] ?></td>
                            <td style="text-align:center;">

                                <?php

                                foreach ($values['bobot'] as $keyBobot => $bobot) {
                                    $checked = "";
                                    if ($keyBobot == $values['value_bobot']) {
                                        $checked = "checked";
                                    }
                                    $label = $values['id_nilai_pasangan'];
                                ?>

                                    <input class="flat" type="radio" id=<?= $label ?> name=<?= $label ?> value=<?= $keyBobot ?> <?= $checked ?> required>
                                    <label for=<?= $label ?>><?= $bobot ?></label>
                                <?php   };
                                ?>
                            </td>
                            <td><?= $values['kanan']['kriteria'] ?></td>
                        </tr>
                    <?php $no++;
                    }
                    ?>

                </tbody>
            </table>
            <input type="submit" name="submit" value="SIMPAN DATA" class="btn btn-primary">
        </form>
        <hr>
        <h3 style="text-align:left; font-size:16px; margin-bottom:10px; font-weight:bold;">Matriks Perbandingan Berpasangan</h3>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th width="3%">No.</th>
                    <th>Kriteria</th>
                    <?php foreach ($listKriteria as $listKriterias) { ?>
                        <th><?= $listKriterias['kriteria'] ?></th>
                    <?php } ?>
                    <th>Eigen Vector</th>
                    <th>Rasio Konsistensi</th>

                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $nilai = 0;
                $jmlKriteria = count($listKriteria);
                $totalEigen = 0;
                $rasioKonsistensi = 0;
                foreach ($listKriteria as $listKriterias) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $listKriterias['kriteria'] ?></td>
                        <?php
                        $dataMatrix = MatriksPerbandinganBerpasangan::find()->where(['id_kriteria_kiri' => $listKriterias['id']])->andWhere(['id_alternatif' => $selectedDataAlternatif])->asArray()->all();
                        foreach ($dataMatrix as $valuedataMatrix) {
                        ?>
                            <td><?= round($valuedataMatrix['value'], 2) ?></td>
                        <?php } ?>
                        <td>
                            <?php
                            $eigen = 0;
                            foreach ($dataMatrix as $valuedataMatrix) {
                                $sum = MatriksPerbandinganBerpasangan::find()->where(['id_kriteria_kanan' => $listKriterias['id']])->andWhere(['id_alternatif' => $selectedDataAlternatif])->sum('value');
                                $eigen += $valuedataMatrix['value'] / $sum;
                            }

                            $totalEigen += $eigen / $jmlKriteria;
                            echo $eigen / $jmlKriteria;
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($dataMatrix as $valuedataMatrix) {
                                $sum = MatriksPerbandinganBerpasangan::find()->where(['id_kriteria_kanan' => $listKriterias['id']])->andWhere(['id_alternatif' => $selectedDataAlternatif])->sum('value');
                                $eigen += $valuedataMatrix['value'] / $sum;

                            }
                                $dataEigen = $eigen / $jmlKriteria;

                                $rasioKonsistensi += $dataEigen * $sum;
                                echo $dataEigen * $sum;
                            ?>

                        </td>

                    </tr>
                <?php $no++;
                }
                ?>
                <tr>
                    <td></td>
                    <td style="font-weight:bold; color:#333;">Jumlah</td>
                    <?php foreach ($listKriteria as $listKriterias) {
                        $sum = MatriksPerbandinganBerpasangan::find()->where(['id_kriteria_kanan' => $listKriterias['id']])->andWhere(['id_alternatif' => $selectedDataAlternatif])->sum('value');
                    ?>
                        <td style="font-weight:bold; color:#333;"><?= $sum; ?></td>
                    <?php } ?>
                    <td><?= $totalEigen ?></td>
                    <td><?= $rasioKonsistensi ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    function redirect() {
        var e = document.getElementById("list-alternatif");
        var id = e.options[e.selectedIndex].value;

        $.ajax({
            method: "GET",
            url: "/perbandingan-kriteria/banding-kriteria?id=" + id,
            dataType: "html",
            success: function(result) {
                window.location = "/perbandingan-kriteria/banding-kriteria?id=" + id
            }
        });
    }
</script>
