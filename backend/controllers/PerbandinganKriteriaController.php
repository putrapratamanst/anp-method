<?php

namespace backend\controllers;

use backend\models\BandingKriteria;
use backend\models\Biodata;
use backend\models\Kriteria;
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
        $bandingKriteria = BandingKriteria::find()->where(['id_alternatif' => $idAlternatif])->asArray()->all();

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
        for ($i = 1; $i <= 9; $i++) {
            $radioButtonList[$i] = $i;
        }
        if ($bandingKriteria == NULL) {

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
        return $this->render('banding-kriteria', [
            'dataAlternatif' => $dataAlternatif,
            'selectedDataAlternatif' => $selectedDataAlternatif,
            'newListKriteriaPerbandingan' => $newListKriteriaPerbandingan
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
}
