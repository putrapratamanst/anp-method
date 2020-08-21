<?php

use backend\controllers\PerbandinganAlternatifController;
use backend\controllers\PerbandinganKriteriaController;
use backend\helpers\Constant;
use backend\models\Eigen;

$connection = Yii::$app->getDb();
$constantKriteria = Constant::TYPE_KRITERIA;
$constantAlternatif = Constant::TYPE_ALTERNATIF;
$listAlternatif = PerbandinganAlternatifController::listAlternatif();
$listKriteria = PerbandinganKriteriaController::listKriteria();

?>
<div class="x_panel">
    <div style='overflow-x:scroll;overflow-y:scroll;width:50'>

        <h3 style="text-align:left; font-size:16px; margin-bottom:10px; font-weight:bold;">Supermatriks Tidak Terbobot (Unweighted Supermatrix)
        </h3>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th rowspan="2" width="3%">No.</th>
                    <th rowspan="2">Cluster dan Node</th>
                    <th style="text-align:center;" colspan="<?= $jmlAlternatif; ?>">Alternatif</th>
                    <th style="text-align:center;" colspan="<?= $jmlKriteria; ?>">Kriteria</th>
                </tr>
                <tr>
                    <?php
                    foreach ($newHeader as $keynewHeader => $valuenewHeader) { ?>
                        <td style="text-align:center;"><?= $valuenewHeader['info'] ?></td>
                    <?php } ?>
                </tr>
            </thead>
            <tr>
                <td></td>
                <td style="font-weight:bold; color:#333;">Alternatif</td>
                <td colspan="<?= count($listAlternatif) + count($listKriteria) ?>"></td>
            </tr>

            <?php

            $unweightAlternatif = Eigen::find()->select(['eigen.*', 'biodata.nama_lengkap'])->join('left join', 'biodata', 'eigen.id_alternatif_kriteria = biodata.id')
                ->where(['type' => Constant::TYPE_ALTERNATIF])->asArray()->all();
            $unweightKriteria = Eigen::find()->select(['eigen.*', 'kriteria.kriteria'])->join('left join', 'kriteria', 'eigen.id_alternatif_kriteria = kriteria.id')
                ->where(['type' => Constant::TYPE_KRITERIA])->asArray()->all();
            $jmlHeader = count($newHeader);

            $no = 1;
            foreach ($listAlternatif as $keylistAlternatif => $valuelistAlternatif) {
            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= "A0" . $valuelistAlternatif['id'] . " - " . $valuelistAlternatif['nama_lengkap']; ?></td>
                    <?php
                    for ($i = 0; $i < count($listAlternatif); $i++) { ?>
                        <td><?= number_format(0, 3, ',', '.') ?></td>
                    <?php } ?>

                    <?php
                    foreach ($unweightAlternatif as $keyunweightAlternatif => $valueunweightAlternatif) {
                        if ($valueunweightAlternatif['id_alternatif_kriteria'] == $valuelistAlternatif['id']) {
                    ?>
                            <td><?= number_format($valueunweightAlternatif['eigen'], 3, ',', '.') ?></td>
                    <?php }
                    }
                    ?>
                </tr>

            <?php $no++;
            }
            ?>


            <tr>
                <td></td>
                <td style="font-weight:bold; color:#333;">Kriteria</td>
                <td colspan="<?= count($listAlternatif) + count($listKriteria) ?>"></td>
            </tr>
            <tbody><?php
                    $nos = 1;
                    foreach ($listKriteria as $keylistKriteria => $valuelistKriteria) {
                    ?>
                    <tr>
                        <td><?= $nos; ?></td>
                        <td><?= "K0" . $valuelistKriteria['id'] . " - " . $valuelistKriteria['kriteria']; ?></td>
                        <?php
                        foreach ($unweightKriteria as $keyunweightKriteria => $valueunweightKriteria) {
                            if ($valueunweightKriteria['id_alternatif_kriteria'] == $valuelistKriteria['id']) {
                        ?>
                                <td><?= number_format($valueunweightKriteria['eigen'], 3, ',', '.') ?></td>
                        <?php }
                        }
                        ?>
                        <?php
                        for ($i = 0; $i < count($listKriteria); $i++) { ?>
                            <td><?= number_format(0, 3, ',', '.') ?></td>
                        <?php } ?>
                    </tr>

                <?php $nos++;
                    }
                ?>

            </tbody>
        </table>
    </div>
    <hr>

    <div style='overflow-x:scroll;overflow-y:scroll;width:50'>
        <h3 style="text-align:left; font-size:16px; margin-bottom:10px; font-weight:bold;">Supermatriks Terbobot (Weighted Supermatrix)
        </h3>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th rowspan="2" width="3%">No.</th>
                    <th rowspan="2">Cluster dan Node</th>
                    <th style="text-align:center;" colspan="<?= $jmlAlternatif; ?>">Alternatif</th>
                    <th style="text-align:center;" colspan="<?= $jmlKriteria; ?>">Kriteria</th>
                </tr>
                <tr>
                    <?php
                    foreach ($newHeader as $keynewHeader => $valuenewHeader) { ?>
                        <td style="text-align:center;"><?= $valuenewHeader['info'] ?></td>
                    <?php } ?>
                </tr>
            </thead>
            <tr>
                <td></td>
                <td style="font-weight:bold; color:#333;">Alternatif</td>
                <td colspan="<?= count($listAlternatif) + count($listKriteria) ?>"></td>
            </tr>

            <?php

            $Angka = array();
            $Angka_0 = 0;
            $no = 1;

            $tampil_a = "SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC";
            $h_tampil_a = $connection->createCommand($tampil_a);

            foreach ($h_tampil_a->queryAll() as $r) {
                $Angka_1 = 0;
                $n_node = sprintf("A%02d", $no);
            ?>

                <tr>

                    <td><?php echo $no++; ?></td>
                    <td><?php echo $n_node . ' - ' . $r['alternatif']; ?></td>


                    <?php
                    $h_node = $connection->createCommand("SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC");
                    foreach ($h_node->queryAll() as $d_node) {
                        $nilai_pasang = 0; ?>
                        <td style="text-align:center;"><?php echo number_format($nilai_pasang * 0, 3, ',', '.'); ?></td>
                    <?php $Angka[$Angka_0][$Angka_1] = number_format($nilai_pasang * 0, 3);
                        $Angka_1++;
                    } ?>

                    <?php
                    $h_node = $connection->createCommand("SELECT id as id_kriteria, kriteria FROM kriteria ORDER BY id ASC");
                    foreach ($h_node->queryAll() as $d_node) {
                        $h_nilai = $connection->createCommand("SELECT eigen FROM eigen WHERE id_penampung ='$d_node[id_kriteria]' AND
                                      id_alternatif_kriteria='$r[id_alternatif_periode]' AND type='$constantAlternatif'");
                        $d_nilai = $h_nilai->queryOne();
                    ?>

                        <td style="text-align:center;"><?php echo number_format($d_nilai['eigen'] * 1, 3, ',', '.'); ?></td>
                    <?php $Angka[$Angka_0][$Angka_1] = number_format($d_nilai['eigen'] * 1, 3);
                        $Angka_1++;
                    } ?>
                </tr>
            <?php $Angka_0++;
            } ?>


            <tr>
                <td></td>
                <td style="font-weight:bold; color:#333;">Kriteria</td>
                <td colspan="<?= count($listAlternatif) + count($listKriteria) ?>"></td>
            </tr>

            <?php
            $no2 = 1;
            $tampil = "SELECT a.id as id_kriteria, a.kriteria FROM kriteria as a ORDER BY a.id ASC";
            $h_tampil = $connection->createCommand($tampil);

            foreach ($h_tampil->queryAll() as $r) {
                $Angka_1 = 0;
                $n_node = sprintf("K%02d", $no2);
            ?>
                <tr>
                    <td style="text-align:center;"><?php echo $no2++; ?></td>
                    <td><?php echo $n_node . ' - ' . $r['kriteria']; ?></td>
                    <?php
                    $h_node = $connection->createCommand("SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC");
                    foreach ($h_node->queryAll() as $d_node) {
                        $h_nilai = $connection->createCommand("SELECT eigen FROM eigen WHERE id_penampung ='$d_node[id_alternatif_periode]' AND
                                      id_alternatif_kriteria='$r[id_kriteria]' AND type='$constantKriteria'");

                        $d_nilai = $h_nilai->queryOne();
                    ?>
                        <td style="text-align:center;"><?php echo number_format($d_nilai['eigen'] * 1, 3, ',', '.'); ?></td>
                    <?php $Angka[$Angka_0][$Angka_1] = number_format($d_nilai['eigen'] * 1, 3);
                        $Angka_1++;
                    } ?>
                    <?php
                    $h_node = $connection->createCommand("SELECT a.id as id_kriteria, a.kriteria FROM kriteria as a ORDER BY a.id ASC");
                    foreach ($h_node->queryAll() as $d_node) {
                        $nilai_pasang = 0;
                    ?>
                        <td style="text-align:center;"><?php echo number_format($nilai_pasang * 0, 3, ',', '.'); ?></td>
                    <?php $Angka[$Angka_0][$Angka_1] = number_format($nilai_pasang * 0, 3);
                        $Angka_1++;
                    } ?>
                </tr>
            <?php $Angka_0++;
            }
            ?>
        </table>
    </div>
    <hr>

    <?php
    $Angka_0 = $Angka_0 - 1;

    function tampilmatriks($Angka, $Angka_0)
    {
        for ($i = 0; $i <= $Angka_0; $i++) {
            if ($i > 0) {
                print "<br>";
            }
            for ($j = 0; $j <= $Angka_0; $j++) {
                print " | " . $Angka[$i][$j] . " ";
            }
        }
    }

    function save_matriks($Angka)
    {
        $connection = Yii::$app->getDb();

        $Angka_0a = 0;
        $tampil_a = "SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC";
        $h_tampil_a = $connection->createCommand($tampil_a);
        foreach ($h_tampil_a->queryAll() as $r) {

            $Angka_1 = 0;
            $h_node = $connection->createCommand("SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC");
            foreach ($h_node->queryAll() as $d_node) {
                $cek_data = $connection->createCommand("SELECT COUNT(*) FROM anp_nilai_limit_s WHERE tipe=1 AND id_node_0='$d_node[id_alternatif_periode]' AND id_node='$r[id_alternatif_periode]'")->queryScalar();
                if ($cek_data == 0) {
                    $connection->createCommand("INSERT INTO anp_nilai_limit_s(tipe, id_node_0, id_node, nilai) VALUES (1, '$d_node[id_alternatif_periode]', '$r[id_alternatif_periode]', '" . $Angka[$Angka_0a][$Angka_1] . "')")->execute();
                } else {
                    $connection->createCommand("UPDATE anp_nilai_limit_s SET nilai='" . $Angka[$Angka_0a][$Angka_1] . "' WHERE  tipe=1 AND id_node_0='$d_node[id_alternatif_periode]' AND id_node='$r[id_alternatif_periode]'")->execute();
                }
                $Angka_1++;
            }

            $h_node = $connection->createCommand("SELECT id as id_kriteria, kriteria FROM kriteria ORDER BY id ASC");
            foreach ($h_node->queryAll() as $d_node) {
                $cek_data = $connection->createCommand("SELECT COUNT(*) FROM anp_nilai_limit_s WHERE tipe=2 AND id_node_0='$d_node[id_kriteria]' AND id_node='$r[id_alternatif_periode]'")->queryScalar();
                if ($cek_data == 0) {
                    $connection->createCommand("INSERT INTO anp_nilai_limit_s(tipe, id_node_0, id_node, nilai) VALUES (2, '$d_node[id_kriteria]', '$r[id_alternatif_periode]', '" . $Angka[$Angka_0a][$Angka_1] . "')")->execute();
                } else {
                    $connection->createCommand("UPDATE anp_nilai_limit_s SET nilai='" . $Angka[$Angka_0a][$Angka_1] . "' WHERE tipe=2 AND id_node_0='$d_node[id_kriteria]' AND id_node='$r[id_alternatif_periode]'")->execute();
                }
                $Angka_1++;
            }
            $Angka_0a++;
        }

        $tampil = "SELECT a.id as id_kriteria, a.kriteria FROM kriteria as a ORDER BY a.id ASC";
        $h_tampil = $connection->createCommand($tampil);
        foreach ($h_tampil->queryAll() as  $r) {
            $Angka_1 = 0;
            $h_node = $connection->createCommand("SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC");
            foreach ($h_node->queryAll() as $d_node) {
                $cek_data = $connection->createCommand("SELECT COUNT(*) FROM anp_nilai_limit_s WHERE tipe=3 AND id_node_0='$d_node[id_alternatif_periode]' AND id_node='$r[id_kriteria]'")->queryScalar();
                if ($cek_data == 0) {
                    $connection->createCommand("INSERT INTO anp_nilai_limit_s(tipe, id_node_0, id_node, nilai) VALUES (3, '$d_node[id_alternatif_periode]', '$r[id_kriteria]', '" . $Angka[$Angka_0a][$Angka_1] . "')")->execute();
                } else {
                    $connection->createCommand("UPDATE anp_nilai_limit_s SET nilai='" . $Angka[$Angka_0a][$Angka_1] . "' WHERE tipe=3 AND id_node_0='$d_node[id_alternatif_periode]' AND id_node='$r[id_kriteria]'")->execute();
                }
                $Angka_1++;
            }
            $h_node = $connection->createCommand("SELECT a.id as id_kriteria, a.kriteria FROM kriteria as a ORDER BY a.id ASC");
            foreach ($h_node->queryAll() as $d_node) {
                $cek_data = $connection->createCommand("SELECT COUNT(*) FROM anp_nilai_limit_s WHERE tipe=4 AND id_node_0='$d_node[id_kriteria]' AND id_node='$r[id_kriteria]'")->queryScalar();;
                if ($cek_data[0] == 0) {
                    $connection->createCommand("INSERT INTO anp_nilai_limit_s(tipe, id_node_0, id_node, nilai) VALUES (4, '$d_node[id_kriteria]', '$r[id_kriteria]', '" . $Angka[$Angka_0a][$Angka_1] . "')")->execute();
                } else {
                    $connection->createCommand("UPDATE anp_nilai_limit_s SET nilai='" . $Angka[$Angka_0a][$Angka_1] . "' WHERE tipe=4 AND id_node_0='$d_node[id_kriteria]' AND id_node='$r[id_kriteria]'")->execute();
                }
                $Angka_1++;
            }
            $Angka_0a++;
        }
    }

    function cek_stabilitas($Angka, $Angka_0)
    {
        //Check nilai yang sama dalam baris (4digit setelah koma saja)
        $jml_h_test = 0;
        for ($i2 = 0; $i2 <= $Angka_0; $i2++) {
            for ($j2 = 0; $j2 <= $Angka_0; $j2++) {
                $a = number_format($Angka[$i2][$j2], 4);
                $b = isset($Angka[$i2][$j2 + 1]) ? number_format($Angka[$i2][$j2 + 1], 4) : 0;

                if ($a == 0 && $b == 0) {
                    $h_test = 0;
                }
                if ($a == 0 && $b != 0) {
                    $h_test = 0;
                }
                if ($a != 0 && $b == 0) {
                    $h_test = 0;
                }
                if ($a != 0 && $b != 0 && $a == $b) {
                    $h_test = 0;
                }
                if ($a != 0 && $b != 0 && $a != $b) {
                    $h_test = 1;
                }
                $jml_h_test = $jml_h_test + $h_test;
            }
        }
        return $jml_h_test;
    }


    function hitungkali($Angka, $Angka_0)
    {
        $x = cek_stabilitas($Angka, $Angka_0);

        $nilai_kolom = 0;
        $putar = 1;
        while ($x > 0) {
            //echo "======= $x =======<br>"; 
            for ($i = 0; $i <= $Angka_0; $i++) {
                for ($j = 0; $j <= $Angka_0; $j++) {
                    $nilai_hasil = 0;
                    for ($k = 0; $k <= $Angka_0; $k++) {
                        $nilai_hasil = $nilai_hasil + ($Angka[$i][$k] * $Angka[$k][$j]);
                    }
                    $nilai = number_format($nilai_hasil, 8);

                    $hasil[$i][$j] = $nilai;
                }
            }
            $Angka = $hasil;
            $x = cek_stabilitas($hasil, $Angka_0);
            $putar++;
            //tampilmatriks($hasil);
            //echo "<hr>";
            if ($putar > 100) {
                $x = 0;
            }
        }
        echo "Perpangkatan Matriks Ke : " . $putar . "<br>";

        //Hitung jumlah kolom
        for ($i3 = 0; $i3 <= $Angka_0; $i3++) {
            for ($j3 = 0; $j3 <= $Angka_0; $j3++) {
                $a = number_format($Angka[$i3][$j3], 8);
                if ($a > 0) {
                    $nilai_kolom = $nilai_kolom + $a;
                    $j3 = $Angka_0;
                }
            }
        }

        for ($i = 0; $i <= $Angka_0; $i++) {
            for ($ja = 0; $ja <= $Angka_0; $ja++) {
                $b = $Angka[$i][$ja];
                if ($b == 0) {
                    $nilai_jadi = 0;
                }
                if ($nilai_kolom > 0) {
                    if ($b != 0) {
                        $nilai_jadi = $b / $nilai_kolom;
                        $ja = $Angka_0;
                    }
                } else {
                    $nilai_jadi = 0;
                }
            }
            for ($j = 0; $j <= $Angka_0; $j++) {
                $hasil[$i][$j] = number_format($nilai_jadi, 6);
            }
        }

        return $hasil;
    }

    function tampilnormal($Angka, $Angka_0)
    {
        for ($ix = 0; $ix <= $Angka_0; $ix++) {
            //Print " | ".$Angka[$ix]." ";
        }
    }

    function hitung_normal($Angka)
    {
        $connection = Yii::$app->getDb();

        $nilai_jadi = 0;
        $h_node = $connection->createCommand("SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC");
        $jml = count($h_node->queryAll());
        for ($ja = 0; $ja <= $jml - 1; $ja++) {
            $b = $Angka[$ja][0];
            $nilai_jadi = $nilai_jadi + $b;
        }
        //echo "--".$nilai_jadi."--";

        $j = 0;
        foreach ($h_node->queryAll() as $d_node) {
            if ($nilai_jadi > 0) {
                $hasil_normal = number_format($b = $Angka[$j][0] / $nilai_jadi, 8);
            } else {
                $hasil_normal = 0;
            }

            $cek_data = $connection->createCommand("SELECT COUNT(*) FROM anp_hasil WHERE id_alternatif_periode='$d_node[id_alternatif_periode]'")->queryScalar();
            if ($cek_data == 0) {
                $connection->createCommand("INSERT INTO anp_hasil(id_alternatif_periode, nilai, nilai_normal) VALUES ('$d_node[id_alternatif_periode]', '" . $Angka[$j][0] . "', '" . $hasil_normal . "')")->execute();
            } else {
                $connection->createCommand("UPDATE anp_hasil SET nilai='" . $Angka[$j][0] . "', nilai_normal='" . $hasil_normal . "' WHERE id_alternatif_periode='$d_node[id_alternatif_periode]'")->execute();
            }
            $j++;
        }
        //return $hasil_normal;
    }



    ?>
    <div style='display;overflow-x:scroll;overflow-y:scroll;width:50'>
        <h3 style="text-align:left; font-size:16px; margin-bottom:10px; font-weight:bold;">Limit Supermatriks
            <?php

            $hasil = hitungkali($Angka, $Angka_0);
            //SIMPAN HASIL LIMIT MATRIKS

            save_matriks($hasil);
            // tampilmatriks($hasil, $Angka_0);
            ?>
        </h3>
        <?php
        $h_node_a = $connection->createCommand("SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC");
        $jml_node_a = count($h_node_a->queryAll());
        $h_node_b = $connection->createCommand("SELECT a.id as id_kriteria, a.kriteria FROM kriteria as a ORDER BY a.id ASC");
        $jml_node_b = count($h_node_b->queryAll());
        ?>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th width="20" rowspan="2">No</th>
                    <th rowspan="2">Cluster dan Node</th>
                    <th colspan="<?php echo $jml_node_a; ?>" style="text-align:center; font-weight:bold; color:#333;">Alternatif</th>
                    <th colspan="<?php echo $jml_node_b; ?>" style="text-align:center; font-weight:bold; color:#333;">Kriteria</th>
                </tr>
                <tr>
                    <?php
                    for ($i = 1; $i <= $jml_node_a; $i++) {
                        echo "<td style='text-align:center;'>" . sprintf("A%02d", $i) . "</td>";
                    }
                    for ($j = 1; $j <= $jml_node_b; $j++) {
                        echo "<td style='text-align:center;'>" . sprintf("K%02d", $j) . "</td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight:bold; color:#333;">Alternatif</td>
                    <td colspan="<?php echo $jml_node_a + $jml_node_b; ?>"></td>
                </tr>
            </thead>

            <?php
            $no = 1;
            $tampil_a = "SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC";
            $h_tampil_a = $connection->createCommand($tampil_a);
            foreach ($h_tampil_a->queryAll() as $r) {
                $n_node = sprintf("A%02d", $no);
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $n_node . ' - ' . $r['alternatif']; ?></td>
                    <?php
                    $h_node = $connection->createCommand("SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC");
                    foreach ($h_node->queryAll() as $d_node) {
                        $h_nilai = $connection->createCommand("SELECT nilai FROM anp_nilai_limit_s WHERE tipe=1 AND id_node_0='$d_node[id_alternatif_periode]' AND
                                      id_node='$r[id_alternatif_periode]'");
                        $d_nilai = $h_nilai->queryOne();
                    ?>
                        <td style="text-align:center;"><?php echo number_format($d_nilai['nilai'] * 1, 5, ',', '.'); ?></td>
                    <?php } ?>

                    <?php
                    $h_node = $connection->createCommand("SELECT id as id_kriteria, kriteria FROM kriteria ORDER BY id ASC");
                    foreach ($h_node->queryAll() as $d_node) {
                        $h_nilai = $connection->createCommand("SELECT nilai FROM anp_nilai_limit_s WHERE  tipe=2 AND id_node_0='$d_node[id_kriteria]' AND
                                            id_node='$r[id_alternatif_periode]'");
                        $d_nilai = $h_nilai->queryOne();
                    ?>
                        <td style="text-align:center;"><?php echo number_format($d_nilai['nilai'] * 1, 5, ',', '.'); ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td style="font-weight:bold; color:#333;">Kriteria</td>
                <td colspan="<?php echo $jml_node_a + $jml_node_b; ?>"></td>
            </tr>

            <?php
            $no2 = 1;
            $tampil = "SELECT a.id as id_kriteria, a.kriteria FROM kriteria as a ORDER BY a.id ASC";
            $h_tampil = $connection->createCommand($tampil);
            foreach ($h_tampil->queryAll() as $r) {

                $n_node = sprintf("K%02d", $no2);
            ?>
                <tr>
                    <td style="text-align:center;"><?php echo $no2++; ?></td>
                    <td><?php echo $n_node . ' - ' . $r['kriteria']; ?></td>
                    <?php
                    $h_node = $connection->createCommand("SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC");
                    foreach ($h_node->queryAll() as $d_node) {

                        $h_nilai = $connection->createCommand("SELECT nilai FROM anp_nilai_limit_s WHERE tipe=3 AND id_node_0='$d_node[id_alternatif_periode]' AND
											  id_node='$r[id_kriteria]'");
                        $d_nilai = $h_nilai->queryOne();
                    ?>
                        <td style="text-align:center;"><?php echo number_format($d_nilai['nilai'] * 1, 5, ',', '.'); ?></td>
                    <?php } ?>
                    <?php
                    $h_node = $connection->createCommand("SELECT id as id_kriteria, kriteria FROM kriteria ORDER BY id ASC");
                    foreach ($h_node->queryAll() as  $d_node) {
                        $h_nilai = $connection->createCommand("SELECT nilai FROM anp_nilai_limit_s WHERE  tipe=4 AND id_node_0='$d_node[id_kriteria]' AND
											  id_node='$r[id_kriteria]'");
                        $d_nilai = $h_nilai->queryOne();
                    ?>
                        <td style="text-align:center;"><?php echo number_format($d_nilai['nilai'] * 1, 5, ',', '.'); ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
        <hr>

        <h3 style="text-align:left; font-size:16px; margin-bottom:10px; font-weight:bold;">Hasil Sintesize (Nilai Normal Tertinggi merupakan Alternatif Terbaik)</h3>
        <table id="example1" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th width="20">No</th>
                    <th>Alternatif</th>
                    <th>Tanggal Lahir</th>
                    <th>Nilai Asal (RAW)</th>
                    <th>Nilai Normal</th>
                </tr>
            </thead>
            <?php
            $h_node = $connection->createCommand("SELECT a.id as id_alternatif_periode, a.nama_lengkap as alternatif, b.id as ids FROM biodata AS a, berkas AS b WHERE a.id = b.biodata_id ORDER BY a.id ASC");

            $no = 1;
            $hquery = $connection->createCommand("SELECT c.id as id_alternatif_periode, c.id as id_alternatif, c.nama_lengkap as alternatif, c.tanggal_lahir, d.nilai, d.nilai_normal 
						   FROM  biodata as c, anp_hasil as d
						   WHERE c.id=d.id_alternatif_periode ORDER BY d.nilai_normal DESC");
            $jml_baris = $hquery->queryScalar();
            foreach ($hquery->queryAll() as $data) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['alternatif']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($data['tanggal_lahir'])); ?></td>
                    <td><?php echo number_format($data['nilai'], 6, ',', '.'); ?></td>
                    <td><?php echo number_format($data['nilai_normal'], 8, ',', '.'); ?></td>
                </tr>
            <?php } ?>
        </table>
        <hr>
        <?php include "grafik_1_container.php"; ?>

    </div>
</div>
</div>

</div>
