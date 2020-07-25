<?php

namespace backend\controllers;

use backend\models\BandingKriteria;
use backend\models\Biodata;
use backend\models\Kriteria;
use backend\models\MatriksPerbandinganBerpasangan;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class PerbandinganKriteriaController extends Controller
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionBandingKriteria()
    {

        $request        = Yii::$app->request;
        $idAlternatif   = $request->get('id');
        $alternatif     = Biodata::find()->leftJoin('berkas', 'biodata.id = berkas.biodata_id')->where(['not', ['berkas.id' => NULL]])->where(['not', ['berkas.id' => NULL]])->asArray()->all();
        //get nilai banding kriteria
        // $bandingKriteria = BandingKriteria::find()->where(['id_alternatif' => $idAlternatif])->asArray()->all();

        $dataAlternatif = ArrayHelper::map($alternatif, 'id', 'nama_lengkap');
        if ($idAlternatif == NULL) {
            $selectedDataAlternatif = array_key_first($dataAlternatif);
        } else {
            $selectedDataAlternatif = $idAlternatif;
        }

        //get nilai banding kriteria
        $bandingKriteria = BandingKriteria::find()->where(['id_alternatif' => $selectedDataAlternatif])->asArray()->all();
        $newListKriteriaPerbandingan = [];

        $radioButtonList = [];
        //linked kriteria
        for ($i = 9; $i >= -9; $i -= 1) {
            if ($i == 0 || $i == -1)
                continue;
            $radioButtonList[$i] = abs($i);
        }
        ksort($radioButtonList);
        $listKriteria = $this->listKriteria();
        //matrix berpasangan
        if ($bandingKriteria == NULL) {

            $listKriteriaPerbandingan = [];
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

            //create default kriteria perbandingan
            foreach ($listKriteriaPerbandingan as  $valuelistKriteriaPerbandingan) {
                foreach ($valuelistKriteriaPerbandingan as $dataToSave) {
                    $create = $this->createBandingKriteria($selectedDataAlternatif, $dataToSave['kiri']['id'], $dataToSave['kanan']['id']);
                    $dataToSave['value_bobot'] = $create['value_bobot'];
                    $dataToSave['id_nilai_pasangan'] = $create['id'];
                    array_push($newListKriteriaPerbandingan, $dataToSave);
                }
            }
        } else {
            foreach ($bandingKriteria as $keyBandingKriteria => $valueBandingKriteria) {
                $newListKriteriaPerbandingan[$keyBandingKriteria]['kiri']['id'] = $valueBandingKriteria['id_kriteria_kiri'];
                $newListKriteriaPerbandingan[$keyBandingKriteria]['kiri']['kriteria'] = KriteriaController::detailById($valueBandingKriteria['id_kriteria_kiri'])['kriteria'];

                $newListKriteriaPerbandingan[$keyBandingKriteria]['bobot'] = $radioButtonList;

                $newListKriteriaPerbandingan[$keyBandingKriteria]['kanan']['id'] = $valueBandingKriteria['id_kriteria_kanan'];
                $newListKriteriaPerbandingan[$keyBandingKriteria]['kanan']['kriteria'] = KriteriaController::detailById($valueBandingKriteria['id_kriteria_kanan'])['kriteria'];

                $newListKriteriaPerbandingan[$keyBandingKriteria]['value_bobot'] = $valueBandingKriteria['value'];
                $newListKriteriaPerbandingan[$keyBandingKriteria]['id_nilai_pasangan'] = $valueBandingKriteria['id'];
            }
        }

        $matriksPerbandingan = $this->pairwiseComparation($newListKriteriaPerbandingan, $listKriteria, $selectedDataAlternatif);

        return $this->render('banding-kriteria', [
            'dataAlternatif' => $dataAlternatif,
            'selectedDataAlternatif' => $selectedDataAlternatif,
            'newListKriteriaPerbandingan' => $newListKriteriaPerbandingan,
            'listKriteria' => $listKriteria,
            'bandingKriteria' => $bandingKriteria,
            'matriksPerbandingan' => $matriksPerbandingan
        ]);
    }

    public function listKriteria()
    {
        return Kriteria::find()->asArray()->all();
    }

    public function createBandingKriteria($idAlternatif, $idKriteriaKiri, $idKriteriaKanan)
    {
        $model = new BandingKriteria();
        $model->id_alternatif = $idAlternatif;
        $model->id_kriteria_kiri = $idKriteriaKiri;
        $model->id_kriteria_kanan = $idKriteriaKanan;
        $model->value   = 1;
        $model->save();

        $callback = [
            'id' => $model->id,
            'value_bobot' => $model->value,
        ];
        return $callback;
    }

    public function actionProsesUpdate()
    {
        $post = Yii::$app->request->post();
        foreach ($post['id_nilai_pasangan'] as $key => $value) {
            $detail = $this->detailBandingKriteria($value);
            $update = $this->updateBandingKriteria($detail, $post[$value]);
        }

        return $this->redirect('banding-kriteria');
    }

    public function detailBandingKriteria($id)
    {
        return BandingKriteria::find()->where(['id' => $id])->one();
    }

    public function updateBandingKriteria($model, $value)
    {
        $model->value = $value;
        $model->save();
    }

    public function pairwiseComparation($skala, $listKriteria, $selectedDataAlternatif)
    {
        $model = MatriksPerbandinganBerpasangan::find()->where(['id_alternatif' => $selectedDataAlternatif])->asArray()->all();

        //reformat loop list kriteria
        $newListKriteria = [];
        $jmlKriteria = count($listKriteria);
        foreach ($listKriteria as $keys => $valueListKriteria) {
            for ($i = 0; $i < $jmlKriteria; $i++) {
                $newListKriteria[$keys][$i]['kiri'] = $valueListKriteria;
                $newListKriteria[$keys][$i]['kanan'] = $listKriteria[$i];
            }
        }
        $kriteriaKiri = 0;
        $dataToSave = [];
        foreach ($newListKriteria as $key => $valueNewListKriteria) {
            $pasangan = [];
            $temp['id_alternatif'] = $selectedDataAlternatif;
            foreach ($valueNewListKriteria as $keyValue => $listKriteriaValue) {
                $temp['id_kriteria'] = $listKriteriaValue['kiri']['id'];
                $temp['pasangan'][$keyValue] = $listKriteriaValue;

                // foreach ($skala as $keySkala => $valueSkala) {
                //     if ($listKriteriaValue['kiri']['id'] == $listKriteriaValue['kanan']['id']){
                //         $pasangan[$keyValue] = [$listKriteriaValue['kiri']['id'] . "-" . $listKriteriaValue['kanan']['id'] => 1];
                //     } elseif(($listKriteriaValue['kiri']['id'] == $valueSkala['kiri']['id']) && ($listKriteriaValue['kanan']['id'] == $valueSkala['kanan']['id'])) {
                //         $pasangan[$keyValue] = [$listKriteriaValue['kiri']['id'] . "-" . $listKriteriaValue['kanan']['id'] => intval($valueSkala['value_bobot'])];
                //     // } else {
                //         // $pasangan[$keyValue] = [$listKriteriaValue['kiri']['id'] . "-" . $listKriteriaValue['kanan']['id'] => 9];
                //         // echo "<pre>";
                //         // print_r($pasangan);
                //     }

                // }

            }
            array_push($dataToSave, $temp);
        }

        $newDataToSave = [];
        $pasangan = [];

        foreach ($dataToSave as $k => $value) {
            $newDataToSave[$k]['id_kriteria'] = $value['id_kriteria'];
            $newDataToSave[$k]['id_alternatif'] = $value['id_alternatif'];

            foreach ($value['pasangan'] as $a => $valueDataToSave) {
                foreach ($skala as $keySkala => $valueSkala) {
                    
                    if ($valueDataToSave['kiri']['id'] == $valueDataToSave['kanan']['id']) {
                        $newDataToSave[$k]['pasangan'][$a] = [$valueDataToSave['kiri']['id'] . "-" . $valueDataToSave['kanan']['id'] => 1];
                    }
                    if(($valueSkala['kiri']['id'] == $valueDataToSave['kiri']['id']) && ($valueSkala['kanan']['id'] == $valueDataToSave['kanan']['id'])){
                        $newDataToSave[$k]['pasangan'][$a] = [$valueDataToSave['kiri']['id'] . "-" . $valueDataToSave['kanan']['id'] => $valueSkala['value_bobot']];
                    }
                    // if($valueSkala['kiri']['id'] != $valueSkala['kanan']['id']){
                    //     $newDataToSave[$k]['pasangan'][$a] = [$valueDataToSave['kiri']['id'] . "-" . $valueDataToSave['kanan']['id'] => $valueSkala['value_bobot']];
                    // }
                    // } elseif(($valueSkala['kiri']['id'] == $valueDataToSave['kiri']['id']) == ($valueSkala['kanan']['id'] == $valueDataToSave['kanan']['id'])) {
                    //     $newDataToSave[$k]['pasangan'][$a] = [$valueDataToSave['kiri']['id'] . "-" . $valueDataToSave['kanan']['id'] => 0];
                    // }

                }
            }
        }
        echo "<pre>";
        print_r($newDataToSave);

        die(json_encode(''));

        if ($model) {
            foreach ($model as $valueModel) {
                $modelValue = MatriksPerbandinganBerpasangan::find()->where(['id_alternatif' => $selectedDataAlternatif])->andWhere(['id' => $valueModel['id']])->one();
                $modelValue->pasangan = $valueModel['pasangan'];
                $modelValue->save();
            }
            $dataToSave = $model;
        } else {
            Yii::$app->db->createCommand()->batchInsert(
                'matriks_perbandingan_berpasangan',
                ['id_kriteria', 'id_alternatif', 'pasangan'],
                $dataToSave
            )->execute();
        }

        return $dataToSave;
    }
}
