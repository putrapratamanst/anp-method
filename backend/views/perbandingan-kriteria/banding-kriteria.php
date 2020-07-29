<?php

use backend\helpers\Constant;
use backend\models\Eigen;
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
            <input type="hidden" name="idAlternatif" value="<?= $selectedDataAlternatif?>">

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
        <h3 style="text-align:left; font-size:16px; margin-bottom:10px; font-weight:bold;">Matriks Perbandingan Berpasangan, Eigen & Rasio Konsistensi</h3>
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
                            foreach ($dataMatrix as $valuedataMatrixd) {
                                $sum = MatriksPerbandinganBerpasangan::find()->where(['id_kriteria_kanan' => $valuedataMatrixd['id_kriteria_kanan']])->andWhere(['id_alternatif' => $selectedDataAlternatif])->sum('value');

                                $eigen += $valuedataMatrixd['value'] / $sum;
                            }

                            $totalEigen += $eigen / $jmlKriteria;


                            $modelEigen = Eigen::find()->where(['id_penampung' => $selectedDataAlternatif])
                                ->andWhere(['id_alternatif_kriteria' => $listKriterias['id']])
                                ->andWhere(['type' => Constant::TYPE_KRITERIA])->one();
                            if (!$modelEigen) {
                                $model = new Eigen();
                                $model->id_penampung = $selectedDataAlternatif;
                                $model->id_alternatif_kriteria = $listKriterias['id'];
                                $model->eigen = $eigen / $jmlKriteria;
                                $model->type = (string)Constant::TYPE_KRITERIA;
                                if (!$model->save()) {
                                    die(json_encode($model->errors));
                                }
                            } else {
                                if ($modelEigen['eigen'] != $eigen / $jmlKriteria) {
                                    $modelEigen->eigen = $eigen / $jmlKriteria;
                                    if (!$modelEigen->save()) {
                                        die(json_encode($modelEigen->errors));
                                    }
                                }
                            }

                            echo $eigen / $jmlKriteria;
                            ?>
                        </td>
                        <td>
                            <?php
                            $eigenRasio = 0;
                            $sum1 = MatriksPerbandinganBerpasangan::find()->where(['id_kriteria_kanan' => $listKriterias['id']])->andWhere(['id_alternatif' => $selectedDataAlternatif])->sum('value');

                            foreach ($dataMatrix as $valuedataMatrixs) {
                                $sum = MatriksPerbandinganBerpasangan::find()->where(['id_kriteria_kanan' => $valuedataMatrixs['id_kriteria_kanan']])->andWhere(['id_alternatif' => $selectedDataAlternatif])->sum('value');
                                $eigenRasio += $valuedataMatrixs['value'] / $sum;
                            }

                            $dataEigen = $eigenRasio / $jmlKriteria;

                            $rasioKonsistensi += $dataEigen * $sum1;
                            echo $dataEigen * $sum1;
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

        <h3 style="text-align:left; font-size:16px; margin-bottom:10px; font-weight:bold;">Cek Konsistensi</h3>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th colspan="2">Hasil Cek Nilai Konsistensi
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>&lambda; max</td>
                    <td>
                        <?php
                        $eigenRasioCekKonsistensi = 0;
                        foreach ($listKriteria as $listKriteriass) {
                            $eigenRasioCek = 0;
                            $dataMatrixs = MatriksPerbandinganBerpasangan::find()->where(['id_kriteria_kiri' => $listKriteriass['id']])->andWhere(['id_alternatif' => $selectedDataAlternatif])->asArray()->all();
                            $sum1cek = MatriksPerbandinganBerpasangan::find()->where(['id_kriteria_kanan' => $listKriteriass['id']])->andWhere(['id_alternatif' => $selectedDataAlternatif])->sum('value');
                            foreach ($dataMatrixs as $valuedataMatrixss) {
                                $sumcek = MatriksPerbandinganBerpasangan::find()->where(['id_kriteria_kanan' => $valuedataMatrixss['id_kriteria_kanan']])->andWhere(['id_alternatif' => $selectedDataAlternatif])->sum('value');
                                $eigenRasioCek += $valuedataMatrixss['value'] / $sumcek;
                            }

                            // echo $eigenRasioCek / $jmlKriteria;
                            // echo"<br>";
                            $eigenRasioCekKonsistensi += $eigenRasioCek / $jmlKriteria * $sum1cek;
                        }

                        echo $eigenRasioCekKonsistensi;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>CI</td>
                    <td><?= ($eigenRasioCekKonsistensi - $jmlKriteria) / ($jmlKriteria - 1) ?></td>
                </tr>
                <tr>
                    <td>CR</td>
                    <td><?php
                        $cr = (($eigenRasioCekKonsistensi - $jmlKriteria) / ($jmlKriteria - 1)) / 0.9;
                        echo $cr;
                        if ($cr > 0.1) {
                            echo " <b>(TIDAK KONSISTEN)</b>";
                        } else {
                            echo " <b>(KONSISTEN)</b>";
                        }
                        ?>
                    </td>
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
