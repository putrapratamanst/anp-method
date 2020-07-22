<?php

namespace backend\controllers;

use backend\models\Biodata;
use backend\models\Kriteria;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class PerbandinganKriteriaController extends Controller
{
    public function actionBandingKriteria()
    {
        $request        = Yii::$app->request;
        $idAlternatif   = $request->get('id');
        $alternatif     = Biodata::find()->leftJoin('berkas', 'biodata.id = berkas.biodata_id')->where(['not', ['berkas.id' => NULL]])->where(['not', ['berkas.id' => NULL]])->asArray()->all();
        $dataAlternatif = ArrayHelper::map($alternatif, 'id', 'nama_lengkap');
        if ($idAlternatif == NULL) {
            $selectedDataAlternatif = array_key_first($dataAlternatif);
        } else {
            $selectedDataAlternatif = $idAlternatif;
        }

        $radioButtonList = [];
        //linked kriteria
        for ($i = 1; $i <= 9; $i++) {
            $radioButtonList[$i] = $i;
        }

        $listKriteriaPerbandingan = [];
        $listKriteria = $this->listKriteria();
        $jmlKriteria = count($listKriteria);
        $tempJmlKriteria = $jmlKriteria - 1;
        $tempKriteria = 0;

        $revert = [];
        foreach ($listKriteria as $key => $value) {
            for ($i = 0; $i <= $tempJmlKriteria; $i++) {

                if ($value['id'] != $listKriteria[$i]) {
                    $pembalik = $value['id'] . $listKriteria[$i]['id'];

                    $strrev = strrev($pembalik);

                    if (!in_array($strrev, $revert)) {
                        if ($strrev != $pembalik) {

                            array_push($revert, $pembalik);

                            $listKriteriaPerbandingan[$key][$i]['kiri'] = $value;
                            $listKriteriaPerbandingan[$key][$i]['bobot'] = $radioButtonList;

                            $listKriteriaPerbandingan[$key][$i]['kanan'] = $listKriteria[$i];
                        }
                    }
                }
            }
            $tempKriteria++;
        }


        return $this->render('banding-kriteria', [
            'dataAlternatif' => $dataAlternatif,
            'selectedDataAlternatif' => $selectedDataAlternatif,
            'radioButtonList' => $radioButtonList,
            'listKriteriaPerbandingan' => $listKriteriaPerbandingan
        ]);
    }

    public function listKriteria()
    {
        return Kriteria::find()->asArray()->all();
    }
}
