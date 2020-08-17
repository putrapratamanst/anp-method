<?php

use backend\controllers\PerbandinganAlternatifController;
use backend\controllers\PerbandinganKriteriaController;
use backend\helpers\Constant;
use backend\models\Eigen;

$listAlternatif = PerbandinganAlternatifController::listAlternatif();
$listKriteria = PerbandinganKriteriaController::listKriteria();

?>
<div class="x_panel">
    <div class="jabatan-index">
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
                        <td><?= number_format(0, 2) ?></td>
                    <?php } ?>

                    <?php
                    foreach ($unweightAlternatif as $keyunweightAlternatif => $valueunweightAlternatif) {
                        if ($valueunweightAlternatif['id_alternatif_kriteria'] == $valuelistAlternatif['id']) {
                    ?>
                            <td><?= $valueunweightAlternatif['eigen'] ?></td>
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
                                <td><?= $valueunweightKriteria['eigen'] ?></td>
                        <?php }
                        }
                        ?>
                        <?php
                        for ($i = 0; $i < count($listKriteria); $i++) { ?>
                            <td><?= number_format(0, 2) ?></td>
                        <?php } ?>


                    </tr>

                <?php $nos++;
                    }
                ?>

            </tbody>
        </table>
    </div>

    <div class="jabatan-index">
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
                        <td><?= number_format(0, 2) ?></td>
                    <?php } ?>

                    <?php
                    foreach ($unweightAlternatif as $keyunweightAlternatif => $valueunweightAlternatif) {
                        if ($valueunweightAlternatif['id_alternatif_kriteria'] == $valuelistAlternatif['id']) {
                    ?>
                            <td><?= $valueunweightAlternatif['eigen'] ?></td>
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
                                <td><?= $valueunweightKriteria['eigen'] ?></td>
                        <?php }
                        }
                        ?>
                        <?php
                        for ($i = 0; $i < count($listKriteria); $i++) { ?>
                            <td><?= number_format(0, 2) ?></td>
                        <?php } ?>


                    </tr>

                <?php $nos++;
                    }
                ?>

            </tbody>
        </table>
    </div>

    <div class="jabatan-index">
        <h3 style="text-align:left; font-size:16px; margin-bottom:10px; font-weight:bold;">Limit Supermatriks - Perpangkatan Matriks Ke: ?
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
                        <td><?= number_format(0, 2) ?></td>
                    <?php } ?>

                    <?php
                    foreach ($unweightAlternatif as $keyunweightAlternatif => $valueunweightAlternatif) {
                        if ($valueunweightAlternatif['id_alternatif_kriteria'] == $valuelistAlternatif['id']) {
                    ?>
                            <td><?= $valueunweightAlternatif['eigen'] ?></td>
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
                                <td><?= $valueunweightKriteria['eigen'] ?></td>
                        <?php }
                        }
                        ?>
                        <?php
                        for ($i = 0; $i < count($listKriteria); $i++) { ?>
                            <td><?= number_format(0, 2) ?></td>
                        <?php } ?>


                    </tr>

                <?php $nos++;
                    }
                ?>

            </tbody>
        </table>
    </div>

</div>
