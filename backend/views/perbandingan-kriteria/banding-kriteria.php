<?php

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
                foreach ($listKriteriaPerbandingan as $key => $value) {
                    foreach ($value as  $values) { ?>

                        <tr>
                            <td>
                                <input type="hidden" name="id_nilai_pasangan[]" value="1656"> <!--peer-->
                                <?= $no; ?> </td>
                            <td><?= $values['kiri']['kriteria'] ?></td>
                            <td style="text-align:center;">

                                <?php

                                foreach ($values['bobot'] as $keyBobot => $bobot) {
                                    $label = "radio" . $key . $values['kiri']['id'] . $keyBobot;
                                ?>

                                    <input class="flat" type="radio" id=<?= $label ?> name=<?= $label?> value=<?= $bobot ?>> <!--peer-->
                                    <label for=<?= $label ?>><?= $bobot ?></label>
                                <?php   }
                                ?>
                            </td>
                            <td><?= $values['kanan']['kriteria'] ?></td>
                        </tr>
                <?php $no++;
                    }
                } ?>
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
