<?php

use backend\helpers\Constant;
use backend\models\Eigen;
use backend\models\MatriksPerbandinganBerpasanganAlternatif;
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
                    $selectedDataKriteria,
                    $dataKriteria,
                    ['class' => 'form-control', 'onchange' => 'redirect()', 'id' => 'list-kriteria']
                );
                ?>
            </div>
        </div>
        <form action="proses-update" method="post">
            <input type="hidden" name="idKriteria" value="<?= $selectedDataKriteria ?>">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th width="4%">No.</th>
                        <th width="18%">Kriteria Alternatif</th>
                        <th width="55%" style="text-align:center;">Pilih Nilai</th>
                        <th width="18%">Kriteria Alternatif</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($newListAlternatifPerbandingan as $values) { ?>

                        <tr>
                            <td>
                                <input type="hidden" name="id_nilai_pasangan[]" value=<?= $values['id_nilai_pasangan'] ?>>
                                <?= $no; ?> </td>
                            <td><?= $values['kiri']['alternatif'] ?></td>
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
                            <td><?= $values['kanan']['alternatif'] ?></td>
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
                    <?php foreach ($listAlternatif as $listAlternatifs) {
                    ?>
                        <th><?= $listAlternatifs['nama_lengkap'] ?></th>
                    <?php } ?>
                    <th>Eigen Vector</th>
                    <th>Rasio Konsistensi</th>

                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $nilai = 0;
                $jmlAlternatif = count($listAlternatif);
                $totalEigen = 0;
                $rasioKonsistensi = 0;
                foreach ($listAlternatif as $listAlternatifs) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $listAlternatifs['nama_lengkap'] ?></td>
                        <?php
                        $dataMatrix = MatriksPerbandinganBerpasanganAlternatif::find()->where(['id_alternatif_kiri' => $listAlternatifs['id']])->andWhere(['id_kriteria' => $selectedDataKriteria])->asArray()->all();
                        foreach ($dataMatrix as $valuedataMatrix) {
                        ?>
                            <td><?= round($valuedataMatrix['value'], 2) ?></td>
                        <?php } ?>
                        <td>
                            <?php
                            $eigen = 0;
                            foreach ($dataMatrix as $valuedataMatrixd) {
                                $sum = MatriksPerbandinganBerpasanganAlternatif::find()->where(['id_alternatif_kanan' => $valuedataMatrixd['id_alternatif_kanan']])->andWhere(['id_kriteria' => $selectedDataKriteria])->sum('value');

                                $eigen += $valuedataMatrixd['value'] / $sum;
                            }

                            $totalEigen += $eigen / $jmlAlternatif;

                                $modelEigen = Eigen::find()->where(['id_penampung' => $selectedDataKriteria])
                                ->andWhere(['id_alternatif_kriteria' => $listAlternatifs['id']])
                                ->andWhere(['type' => Constant::TYPE_ALTERNATIF])->one();
                            if (!$modelEigen) {
                                $model = new Eigen();
                                $model->id_penampung = $selectedDataKriteria;
                                $model->id_alternatif_kriteria = $listAlternatifs['id'];
                                $model->eigen = $eigen / $jmlAlternatif;
                                $model->type = (string)Constant::TYPE_ALTERNATIF;
                                if (!$model->save()) {
                                    die(json_encode($model->errors));
                                }
                            } else {
                                if ($modelEigen['eigen'] != $eigen / $jmlAlternatif) {
                                    $modelEigen->eigen = $eigen / $jmlAlternatif;
                                    if (!$modelEigen->save()) {
                                        die(json_encode($modelEigen->errors));
                                    }
                                }
                            }

                            echo $eigen / $jmlAlternatif;
                            ?>
                        </td>
                        <td>
                            <?php
                            $eigenRasio = 0;
                            $sum1 = MatriksPerbandinganBerpasanganAlternatif::find()->where(['id_alternatif_kanan' => $listAlternatifs['id']])->andWhere(['id_kriteria' => $selectedDataKriteria])->sum('value');

                            foreach ($dataMatrix as $valuedataMatrixs) {
                                $sum = MatriksPerbandinganBerpasanganAlternatif::find()->where(['id_alternatif_kanan' => $valuedataMatrixs['id_alternatif_kanan']])->andWhere(['id_kriteria' => $selectedDataKriteria])->sum('value');
                                $eigenRasio += $valuedataMatrixs['value'] / $sum;
                            }

                            $dataEigen = $eigenRasio / $jmlAlternatif;

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
                    <?php foreach ($listAlternatif as $listAlternatifs) {
                        $sum = MatriksPerbandinganBerpasanganAlternatif::find()->where(['id_alternatif_kanan' => $listAlternatifs['id']])->andWhere(['id_kriteria' => $selectedDataKriteria])->sum('value');
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
                        foreach ($listAlternatif as $listAlternatifss) {
                            $eigenRasioCek = 0;
                            $dataMatrixs = MatriksPerbandinganBerpasanganAlternatif::find()->where(['id_alternatif_kiri' => $listAlternatifss['id']])->andWhere(['id_kriteria' => $selectedDataKriteria])->asArray()->all();
                            $sum1cek = MatriksPerbandinganBerpasanganAlternatif::find()->where(['id_alternatif_kanan' => $listAlternatifss['id']])->andWhere(['id_kriteria' => $selectedDataKriteria])->sum('value');
                            foreach ($dataMatrixs as $valuedataMatrixss) {
                                $sumcek = MatriksPerbandinganBerpasanganAlternatif::find()->where(['id_alternatif_kanan' => $valuedataMatrixss['id_alternatif_kanan']])->andWhere(['id_kriteria' => $selectedDataKriteria])->sum('value');
                                $eigenRasioCek += $valuedataMatrixss['value'] / $sumcek;
                            }

                            // echo $eigenRasioCek / $jmlAlternatif;
                            // echo"<br>";
                            $eigenRasioCekKonsistensi += $eigenRasioCek / $jmlAlternatif * $sum1cek;
                        }

                        echo $eigenRasioCekKonsistensi;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>CI</td>
                    <td><?= ($eigenRasioCekKonsistensi - $jmlAlternatif) / ($jmlAlternatif - 1) ?></td>
                </tr>
                <tr>
                    <td>CR</td>
                    <td><?php
                        $cr = (($eigenRasioCekKonsistensi - $jmlAlternatif) / ($jmlAlternatif - 1)) / 0.9;
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
        var e = document.getElementById("list-kriteria");
        var id = e.options[e.selectedIndex].value;

        $.ajax({
            method: "GET",
            url: "/perbandingan-alternatif/banding-alternatif?id=" + id,
            dataType: "html",
            success: function(result) {
                window.location = "/perbandingan-alternatif/banding-alternatif?id=" + id
            }
        });
    }
</script>
