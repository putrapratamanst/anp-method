<?php

namespace backend\controllers;

use backend\models\BandingAlternatif;
use backend\models\Biodata;
use backend\models\Kriteria;
use backend\models\MatriksPerbandinganBerpasangan;
use backend\models\MatriksPerbandinganBerpasanganAlternatif;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class PerbandinganAlternatifController extends Controller
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionBandingAlternatif()
    {

        $request    = Yii::$app->request;
        $idKriteria = $request->get('id');
        $kriteria   = Kriteria::find()->asArray()->all();

        $dataKriteria = ArrayHelper::map($kriteria, 'id', 'kriteria');

        if ($idKriteria == NULL) {
            $selectedDataKriteria = array_key_first($dataKriteria);
        } else {
            $selectedDataKriteria = $idKriteria;
        }

        //get nilai banding alternatif
        $bandingAlternatif = BandingAlternatif::find()->where(['id_kriteria' => $selectedDataKriteria])->asArray()->all();

        $newListAlternatifPerbandingan = [];

        $radioButtonList = [];
        //linked kriteria
        for ($i = 9; $i >= -9; $i -= 1) {
            if ($i == 0 || $i == -1)
                continue;
            $radioButtonList[$i] = abs($i);
        }
        ksort($radioButtonList);
        $listAlternatif = $this->listAlternatif();
        //matrix berpasangan
        if ($bandingAlternatif == NULL) {
            $listAlternatifPerbandingan = [];
            $jmlAlternatif = count($listAlternatif);
            $tempJmlAlternatif = $jmlAlternatif - 1;
            $tempAlternatif = 0;

            $revert = [];
            foreach ($listAlternatif as $key => $value) {
                for ($i = 0; $i <= $tempJmlAlternatif; $i++) {

                    if ($value['id'] != $listAlternatif[$i]) {
                        $pembalik = $value['id'] . $listAlternatif[$i]['id'];

                        $strrev = strrev($pembalik);

                        if (!in_array($strrev, $revert)) {
                            if ($strrev != $pembalik) {

                                array_push($revert, $pembalik);

                                $listAlternatifPerbandingan[$key][$i]['kiri'] = $value;
                                $listAlternatifPerbandingan[$key][$i]['bobot'] = $radioButtonList;

                                $listAlternatifPerbandingan[$key][$i]['kanan'] = $listAlternatif[$i];
                            }
                        }
                    }
                }
                $tempAlternatif++;
            }

            //create default kriteria perbandingan
            foreach ($listAlternatifPerbandingan as  $valuelistAlternatifPerbandingan) {
                foreach ($valuelistAlternatifPerbandingan as $dataToSave) {
                    $create = $this->createBandingAlternatif($selectedDataKriteria, $dataToSave['kiri']['id'], $dataToSave['kanan']['id']);
                    $dataToSave['value_bobot'] = $create['value_bobot'];
                    $dataToSave['id_nilai_pasangan'] = $create['id'];
                    array_push($newListAlternatifPerbandingan, $dataToSave);
                }
            }
        } else {
            foreach ($bandingAlternatif as $keyBandingAlternatif => $valueBandingAlternatif) {
                $newListAlternatifPerbandingan[$keyBandingAlternatif]['kiri']['id'] = $valueBandingAlternatif['id_alternatif_kiri'];
                $newListAlternatifPerbandingan[$keyBandingAlternatif]['kiri']['alternatif'] = BiodataController::detailById($valueBandingAlternatif['id_alternatif_kiri'])['nama_lengkap'];

                $newListAlternatifPerbandingan[$keyBandingAlternatif]['bobot'] = $radioButtonList;

                $newListAlternatifPerbandingan[$keyBandingAlternatif]['kanan']['id'] = $valueBandingAlternatif['id_alternatif_kanan'];
                $newListAlternatifPerbandingan[$keyBandingAlternatif]['kanan']['alternatif'] = BiodataController::detailById($valueBandingAlternatif['id_alternatif_kanan'])['nama_lengkap'];

                $newListAlternatifPerbandingan[$keyBandingAlternatif]['value_bobot'] = $valueBandingAlternatif['value'];
                $newListAlternatifPerbandingan[$keyBandingAlternatif]['id_nilai_pasangan'] = $valueBandingAlternatif['id'];
            }
        }
        $matriksPerbandingan = $this->pairwiseComparation($newListAlternatifPerbandingan, $listAlternatif, $selectedDataKriteria);

        return $this->render('banding-alternatif', [
            'dataKriteria' => $dataKriteria,
            'selectedDataKriteria' => $selectedDataKriteria,
            'newListAlternatifPerbandingan' => $newListAlternatifPerbandingan,
            'listAlternatif' => $listAlternatif,
            'bandingAlternatif' => $bandingAlternatif,
            'matriksPerbandingan' => $matriksPerbandingan
        ]);
    }

    public function listAlternatif()
    {
        return  Biodata::find()->select(['biodata.id','nama_lengkap'])->leftJoin('berkas', 'biodata.id = berkas.biodata_id')->where(['not', ['berkas.id' => NULL]])->where(['not', ['berkas.id' => NULL]])->asArray()->all();

    }

    public function createBandingAlternatif($idKriteria, $idAlternatifKiri, $idAlternatifKanan)
    {
        $model = new BandingAlternatif();
        $model->id_kriteria = $idKriteria;
        $model->id_alternatif_kiri = $idAlternatifKiri;
        $model->id_alternatif_kanan = $idAlternatifKanan;
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
            $detail = $this->detailBandingAlternatif($value);
            $this->updateBandingAlternatif($detail, $post[$value]);
        }
        return $this->redirect('banding-alternatif');
    }

    public function detailBandingAlternatif($id)
    {
        return BandingAlternatif::find()->where(['id' => $id])->one();
    }

    public function updateBandingAlternatif($model, $value)
    {
        if ($value > 1) {
            if($model->value > 1)
            {
                $model->value = $value;
            } else {
                $kanan = $model->id_alternatif_kanan;
                $kiri  = $model->id_alternatif_kiri;

                $model->id_alternatif_kiri  = $kanan;
                $model->id_alternatif_kanan = $kiri;
                $model->value = $value;
            }
        }

        if($value < 1) {
            if($model->value > 1){
                $kanan = $model->id_alternatif_kanan;
                $kiri  = $model->id_alternatif_kiri;

                $model->id_alternatif_kiri  = $kanan;
                $model->id_alternatif_kanan = $kiri;
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

    public function pairwiseComparation($skala, $listAlternatif, $selectedDataKriteria)
    {
        $listAlternatif = $this->listAlternatif();
        $jmlAlternatif  = count($listAlternatif);
        $newListAlternatif = [];
        foreach ($listAlternatif as $key => $valuelistAlternatif) {
            for ($i = 0; $i < $jmlAlternatif; $i++) {
                $newListAlternatif[$key][$i]['kiri'] = $valuelistAlternatif;
                $newListAlternatif[$key][$i]['kanan'] = $listAlternatif[$i];
            }
        }

        $matriks = [];
        $kebalikan = [];
        foreach ($newListAlternatif as $keynewListAlternatif => $valuenewListAlternatif) {

            foreach ($valuenewListAlternatif as $keyvaluenewListAlternatif => $valuenewListAlternatifs) {

                $value = 0;
                if ($valuenewListAlternatifs['kiri']['id'] == $valuenewListAlternatifs['kanan']['id']) {
                    $value = 1;
                }

                foreach ($skala as $valueSkala) {

                    if ($valueSkala['kiri']['id'] == $valuenewListAlternatifs['kiri']['id'] && $valueSkala['kanan']['id'] == $valuenewListAlternatifs['kanan']['id']) {

                        if ($valueSkala['value_bobot'] < 0) {
                            $value = abs($valueSkala['value_bobot']);
                            // $valuenewListAlternatifs['kiri']['id']  =  $valueSkala['kanan']['id'];
                            // $valuenewListAlternatifs['kanan']['id']  =  $valueSkala['kiri']['id'];

                            // $kebalikan['pasangan'] = $valuenewListAlternatifs;
                            // $kebalikan['value_bobot'] = $value;
                        } else {

                            $value = $valueSkala['value_bobot'];
                        }
                    } elseif ($valueSkala['kiri']['id'] == $valuenewListAlternatifs['kanan']['id'] && $valueSkala['kanan']['id'] == $valuenewListAlternatifs['kiri']['id']) {
                        if (!empty($kebalikan)) {
                            if (($kebalikan['pasangan']['kiri']['id'] == $valuenewListAlternatifs['kiri']['id']) && ($kebalikan['pasangan']['kanan']['id'] == $valuenewListAlternatifs['kanan']['id'])) {
                                $valuenewListAlternatifs['kiri']['id']   =  $kebalikan['pasangan']['kanan']['id'];
                                $valuenewListAlternatifs['kanan']['id']  =  $kebalikan['pasangan']['kiri']['id'];
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
                        // print_r($valuenewListAlternatifs);

                        // $value = 1 / abs($kebalikan['value_bobot']);
                    } else {
                        // $value = 1 / abs($kebalikan['value_bobot']);

                        // echo"<pre>";print_r($valuenewListAlternatifs);
                    }
                }
                $temp = [
                    'id_kriteria'     => $selectedDataKriteria,
                    'id_alternatif_kiri'  => $valuenewListAlternatifs['kiri']['id'],
                    'id_alternatif_kanan' => $valuenewListAlternatifs['kanan']['id'],
                    'value'             => (string)$value,
                ];
                array_push($matriks, $temp);
            }
        }

        // echo"<pre>";die(json_encode($matriks));
        $model = MatriksPerbandinganBerpasanganAlternatif::find()->where(['id_kriteria' => $selectedDataKriteria])->asArray()->all();

        if ($model) {
            foreach ($model as $key => $valueModel) {
                $modelValue = MatriksPerbandinganBerpasanganAlternatif::find()->where(['id_kriteria' => $selectedDataKriteria])
                    ->andWhere(['id_alternatif_kiri' => $valueModel['id_alternatif_kiri']])
                    ->andWhere(['id_alternatif_kanan' => $valueModel['id_alternatif_kanan']])
                    ->one();
               

                $modelValue->value = $matriks[$key]['value'];
                $modelValue->save();
                // if (!$modelValue->save()) {
                //     die(json_encode($modelValue->errors));
                // };
            }
        } else {
            Yii::$app->db->createCommand()->batchInsert(
                'matriks_perbandingan_berpasangan_alternatif',
                ['id_kriteria', 'id_alternatif_kiri', 'id_alternatif_kanan', 'value'],
                $matriks
            )->execute();
        }

        return $matriks;
    }
}
