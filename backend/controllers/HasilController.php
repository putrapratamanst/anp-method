<?php
namespace backend\controllers;

use backend\helpers\Constant;
use yii\web\Controller;

class HasilController extends Controller{

    public function actionHasilPerhitungan()
    {
        $listKriteria = PerbandinganKriteriaController::listKriteria();
        $listAlternatif = PerbandinganAlternatifController::listAlternatif();
        $jmlKriteria = count($listKriteria);
        $jmlAlternatif = count($listAlternatif);

        $tempHeader = array_merge($listAlternatif, $listKriteria);
        $newHeader = [];
        foreach ($tempHeader as $key => $value) {
            $values = "";
            $type = "";
            if(isset($value['kriteria'])){
                $values = $value['kriteria'];
                $type = Constant::TYPE_KRITERIA;
            }
            if(isset($value['nama_lengkap'])){
                $values = $value['nama_lengkap'];
                $type = Constant::TYPE_ALTERNATIF;
            }

            $newHeader[$key]['info'] = $values;
            $newHeader[$key]['id'] = $value['id'];
            $newHeader[$key]['type'] = $type;
        }

        return $this->render('hasil-perhitungan', [
            'listKriteria' => $listKriteria,
            'listAlternatif' => $listAlternatif,
            'jmlKriteria' => $jmlKriteria,
            'jmlAlternatif' => $jmlAlternatif,
            'newHeader' => $newHeader,
        ]);
    }
}
