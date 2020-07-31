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

        $listIdAlternatif = [];
        foreach ($listAlternatif as $keylistAlternatifID => $valuelistAlternatifID) {
            $listIdAlternatif[$keylistAlternatifID] = $valuelistAlternatifID['id'];
        }

        $listBandingAlternatifIdKanan = [];
        $listBandingAlternatifIdKiri = [];
        // $tempListBandingAlternatifId = NULL;
        foreach ($bandingAlternatif as $keylistBandingAlternatifId => $valuelistBandingAlternatifId) {
            $listBandingAlternatifIdKanan[$keylistBandingAlternatifId] = $valuelistBandingAlternatifId['id_alternatif_kanan'];
        }
        foreach ($bandingAlternatif as $keylistBandingAlternatifId => $valuelistBandingAlternatifId) {
            $listBandingAlternatifIdKiri[$keylistBandingAlternatifId] = $valuelistBandingAlternatifId['id_alternatif_kiri'];
        }
        $listBandingAlternatifIdKiri = array_unique($listBandingAlternatifIdKiri);
        $listBandingAlternatifIdKanan = array_unique($listBandingAlternatifIdKanan);

        $gabung = true;
        $gabunganBanding = array_values(array_unique(array_merge($listBandingAlternatifIdKiri, $listBandingAlternatifIdKanan)));
        if ($gabunganBanding) {

            if ($gabunganBanding != $listIdAlternatif) {
                $gabung = false;
            }
        }
        sort($gabunganBanding);
        $gabunganBandingAlternatifUnique = array_diff($listIdAlternatif, $gabunganBanding);


        //matrix berpasangan
        $listAlternatifPerbandingan = [];
        $jmlAlternatif = count($listAlternatif);
        $tempJmlAlternatif = $jmlAlternatif - 1;
        $tempAlternatif = 0;

        $revert = [];
        foreach ($listAlternatif as $key => $value) {

            for ($i = 0; $i <= $tempJmlAlternatif; $i++) {

                if ($value['id'] != $listAlternatif[$i]) {
                    $balik1 =  $value['id'];
                    $balik2 = $listAlternatif[$i]['id'];
                    $pembalik = $balik1 . $balik2;


                    $strrev = $balik2 . $balik1;



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

        if ($bandingAlternatif == NULL) {

            // $listBandingAlternatifIdUnique = array_unique($listBandingAlternatifId);

            //create default kriteria perbandingan

            foreach ($listAlternatifPerbandingan as  $valuelistAlternatifPerbandingan) {
                foreach ($valuelistAlternatifPerbandingan as $dataToSave) {
                    $create = $this->createBandingAlternatif($selectedDataKriteria, $dataToSave['kiri']['id'], $dataToSave['kanan']['id']);
                    $dataToSave['value_bobot'] = $create['value_bobot'];
                    $dataToSave['id_nilai_pasangan'] = $create['id'];
                    $dataToSave['kiri']['alternatif'] = $dataToSave['kiri']['nama_lengkap'];
                    $dataToSave['kanan']['alternatif'] = $dataToSave['kanan']['nama_lengkap'];

                    array_push($newListAlternatifPerbandingan, $dataToSave);
                }
            }
        } else {
            $gabung1  = [];
            $gabung2  = [];

            foreach ($bandingAlternatif as $keyBandingAlternatif => $valueBandingAlternatif) {
                $dataToSave['kiri']['id'] = $valueBandingAlternatif['id_alternatif_kiri'];
                $dataToSave['kiri']['alternatif'] = BiodataController::detailById($valueBandingAlternatif['id_alternatif_kiri'])['nama_lengkap'];

                $dataToSave['bobot'] = $radioButtonList;

                $dataToSave['kanan']['id'] = $valueBandingAlternatif['id_alternatif_kanan'];
                $dataToSave['kanan']['alternatif'] = BiodataController::detailById($valueBandingAlternatif['id_alternatif_kanan'])['nama_lengkap'];

                $dataToSave['value_bobot'] = $valueBandingAlternatif['value'];
                $dataToSave['id_nilai_pasangan'] = $valueBandingAlternatif['id'];

                array_push($gabung2, $dataToSave);
            }

            if ($gabung == false) {
                foreach ($listAlternatifPerbandingan as  $valuelistAlternatifPerbandingan) {

                    foreach ($valuelistAlternatifPerbandingan as $dataToSave) {

                        if (count($gabunganBandingAlternatifUnique) > 0) {

                            foreach ($gabunganBandingAlternatifUnique as $keygabunganBandingAlternatifUnique => $valuegabunganBandingAlternatifUnique) {

                                if ($dataToSave['kiri']['id'] == $valuegabunganBandingAlternatifUnique || $dataToSave['kanan']['id'] == $valuegabunganBandingAlternatifUnique) {

                                    $create = $this->createBandingAlternatif($selectedDataKriteria, $dataToSave['kiri']['id'], $dataToSave['kanan']['id']);
                                    $dataToSave['value_bobot'] = $create['value_bobot'];
                                    $dataToSave['id_nilai_pasangan'] = $create['id'];
                                    $dataToSave['kiri']['alternatif'] = $dataToSave['kiri']['nama_lengkap'];
                                    $dataToSave['kanan']['alternatif'] = $dataToSave['kanan']['nama_lengkap'];

                                    array_push($gabung1, $dataToSave);
                                }
                            }
                        }
                    }
                }
            }
            $gabungan12  = [];
            if ($gabung1) {
                $gabungan12 = array_merge($gabung2, $gabung1);
            } else {
                $gabungan12 = $gabung2;
            }

            $newListAlternatifPerbandingan = $gabungan12;
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
        return  Biodata::find()->select(['biodata.id', 'nama_lengkap'])->leftJoin('berkas', 'biodata.id = berkas.biodata_id')->where(['not', ['berkas.id' => NULL]])->where(['not', ['berkas.id' => NULL]])->asArray()->all();
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
        return $this->redirect(['banding-alternatif', 'id' => $post['idKriteria']]);
    }

    public function detailBandingAlternatif($id)
    {
        return BandingAlternatif::find()->where(['id' => $id])->one();
    }

    public function updateBandingAlternatif($model, $value)
    {
        if ($value > 1) {
            if ($model->value > 1) {
                $model->value = $value;
            } else {
                $kanan = $model->id_alternatif_kanan;
                $kiri  = $model->id_alternatif_kiri;

                $model->id_alternatif_kiri  = $kanan;
                $model->id_alternatif_kanan = $kiri;
                $model->value = $value;
            }
        }

        if ($value < 1) {
            if ($model->value > 1) {
                $kanan = $model->id_alternatif_kanan;
                $kiri  = $model->id_alternatif_kiri;

                $model->id_alternatif_kiri  = $kanan;
                $model->id_alternatif_kanan = $kiri;
                $model->value = $value;
            } else {
                $model->value = $value;
            }
        }
        if ($value == 1) {
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
            $getDiffMatrixModel = $this->diffMatrixModel($model, $matriks);
            if (count($matriks) != count($model)) {
                foreach ($getDiffMatrixModel as $keygetDiffMatrixModel => $valuegetDiffMatrixModel) {
                    $matrixModel = new MatriksPerbandinganBerpasanganAlternatif();
                    $matrixModel->id_kriteria = $valuegetDiffMatrixModel['id_kriteria'];
                    $matrixModel->id_alternatif_kiri = $valuegetDiffMatrixModel['id_alternatif_kiri'];
                    $matrixModel->id_alternatif_kanan = $valuegetDiffMatrixModel['id_alternatif_kanan'];
                    $matrixModel->value   = $valuegetDiffMatrixModel['value'];
                    $matrixModel->save();
                    }

                } else {
                    foreach ($model as $key => $valueModel) {

                    $modelValue = MatriksPerbandinganBerpasanganAlternatif::find()->where(['id_kriteria' => $selectedDataKriteria])
                        ->andWhere(['id_alternatif_kiri' => $valueModel['id_alternatif_kiri']])
                        ->andWhere(['id_alternatif_kanan' => $valueModel['id_alternatif_kanan']])
                        ->one();

                    $modelValue->value = $matriks[$key]['value'];
                    $modelValue->save();
                    }
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

    public function diffMatrixModel($model, $matriks)
    {
        $return = [];
        $tempMatriksPerbandingan = [];
        if(count($matriks) != count($model)) {

            foreach ($model as $keyModel => $valueModel) {
                if ((!in_array($valueModel['id_alternatif_kiri'], $tempMatriksPerbandingan)) || (!in_array($valueModel['id_alternatif_kanan'], $tempMatriksPerbandingan))) {
                    array_push($tempMatriksPerbandingan, $valueModel['id_alternatif_kanan']);
                }            
            }

            foreach ($matriks as $keymatriks => $valuematriks) {
                if(!in_array($valuematriks['id_alternatif_kanan'], $tempMatriksPerbandingan)
                || (!in_array($valuematriks['id_alternatif_kiri'], $tempMatriksPerbandingan))) {
                    $return[$keymatriks] = $valuematriks;
                }
            }
        }
        return array_values($return);
    }
}
