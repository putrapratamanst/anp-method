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
            $this->updateBandingKriteria($detail, $post[$value]);
        }

        return $this->redirect(['banding-kriteria','id' => $post['idAlternatif']]);
    }

    public function detailBandingKriteria($id)
    {
        return BandingKriteria::find()->where(['id' => $id])->one();
    }

    public function updateBandingKriteria($model, $value)
    {
        if ($value > 1) {
            if($model->value > 1)
            {
                $model->value = $value;
            } else {
                $kanan = $model->id_kriteria_kanan;
                $kiri  = $model->id_kriteria_kiri;

                $model->id_kriteria_kiri  = $kanan;
                $model->id_kriteria_kanan = $kiri;
                $model->value = $value;
            }
        }

        if($value < 1) {
            if($model->value > 1){
                $kanan = $model->id_kriteria_kanan;
                $kiri  = $model->id_kriteria_kiri;

                $model->id_kriteria_kiri  = $kanan;
                $model->id_kriteria_kanan = $kiri;
                $model->value = $value;
            } else {
                $model->value = $value;
            }
        }
        if($value == 1) {
            $model = $model;
            $model->value = $value;
        }
        
        $model->save();

    }

    public function pairwiseComparation($skala, $listKriteria, $selectedDataAlternatif)
    {
        $listKriteria = $this->listKriteria();
        $jmlKriteria  = count($listKriteria);
        $newListKriteria = [];
        foreach ($listKriteria as $key => $valuelistKriteria) {
            for ($i = 0; $i < $jmlKriteria; $i++) {
                $newListKriteria[$key][$i]['kiri'] = $valuelistKriteria;
                $newListKriteria[$key][$i]['kanan'] = $listKriteria[$i];
            }
        }

        $matriks = [];
        $kebalikan = [];
        foreach ($newListKriteria as $keynewListKriteria => $valuenewListKriteria) {
            foreach ($valuenewListKriteria as $keyvaluenewListKriteria => $valuenewListKriterias) {
                $value = 0;
                if ($valuenewListKriterias['kiri']['id'] == $valuenewListKriterias['kanan']['id']) {
                    $value = 1;
                }

                foreach ($skala as $valueSkala) {

                    if ($valueSkala['kiri']['id'] == $valuenewListKriterias['kiri']['id'] && $valueSkala['kanan']['id'] == $valuenewListKriterias['kanan']['id']) {
                        if ($valueSkala['value_bobot'] < 0) {
                            $value = abs($valueSkala['value_bobot']);
                            // $valuenewListKriterias['kiri']['id']  =  $valueSkala['kanan']['id'];
                            // $valuenewListKriterias['kanan']['id']  =  $valueSkala['kiri']['id'];

                            // $kebalikan['pasangan'] = $valuenewListKriterias;
                            // $kebalikan['value_bobot'] = $value;
                        } else {

                            $value = $valueSkala['value_bobot'];
                        }
                    } elseif ($valueSkala['kiri']['id'] == $valuenewListKriterias['kanan']['id'] && $valueSkala['kanan']['id'] == $valuenewListKriterias['kiri']['id']) {
                        if (!empty($kebalikan)) {
                            if (($kebalikan['pasangan']['kiri']['id'] == $valuenewListKriterias['kiri']['id']) && ($kebalikan['pasangan']['kanan']['id'] == $valuenewListKriterias['kanan']['id'])) {
                                $valuenewListKriterias['kiri']['id']   =  $kebalikan['pasangan']['kanan']['id'];
                                $valuenewListKriterias['kanan']['id']  =  $kebalikan['pasangan']['kiri']['id'];
                                $value = 1 / abs($kebalikan['value_bobot']);
                            } 
                        } else {
                            $value = 1 / abs($valueSkala['value_bobot']);
                        }
                    }
                }

                if ($value == 0) {
                    if ($kebalikan) {
                        // echo "<pre>";
                        // print_r($valuenewListKriterias);

                        // $value = 1 / abs($kebalikan['value_bobot']);
                    } else {
                        // $value = 1 / abs($kebalikan['value_bobot']);

                        // echo"<pre>";print_r($valuenewListKriterias);
                    }
                }
                $temp = [
                    'id_alternatif'     => $selectedDataAlternatif,
                    'id_kriteria_kiri'  => $valuenewListKriterias['kiri']['id'],
                    'id_kriteria_kanan' => $valuenewListKriterias['kanan']['id'],
                    'value'             => (string)$value,
                ];
                array_push($matriks, $temp);
            }
        }

        $model = MatriksPerbandinganBerpasangan::find()->where(['id_alternatif' => $selectedDataAlternatif])->asArray()->all();

        if ($model) {
            foreach ($model as $key => $valueModel) {
                $modelValue = MatriksPerbandinganBerpasangan::find()->where(['id_alternatif' => $selectedDataAlternatif])
                    ->andWhere(['id_kriteria_kiri' => $valueModel['id_kriteria_kiri']])
                    ->andWhere(['id_kriteria_kanan' => $valueModel['id_kriteria_kanan']])
                    ->one();
               

                $modelValue->value = $matriks[$key]['value'];
                $modelValue->save();
                // if (!$modelValue->save()) {
                //     die(json_encode($modelValue->errors));
                // };
            }
        } else {
            Yii::$app->db->createCommand()->batchInsert(
                'matriks_perbandingan_berpasangan',
                ['id_alternatif', 'id_kriteria_kiri', 'id_kriteria_kanan', 'value'],
                $matriks
            )->execute();
        }

        return $matriks;
    }
}
