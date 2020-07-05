<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Berkas;
use frontend\models\BerkasSearch;
use frontend\models\Biodata;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BerkasController implements the CRUD actions for Berkas model.
 */
class BerkasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Berkas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BerkasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Berkas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $biodata = Biodata::find()->where(['id' => $model->biodata_id])->one();
        return $this->render('view', [
            'model' => $model,
            'biodata' => $biodata
        ]);
    }

    /**
     * Creates a new Berkas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Berkas();
        $userName = Yii::$app->user->identity->username;
        $biodata = Biodata::find()->where(['nama_lengkap' => $userName])->one();
        $model->biodata_id = $id;

        // echo ini_get('upload_max_filesize'), ", " , ini_get('post_max_size');
        // die();
        
        if ($model->load(Yii::$app->request->post()) ) {
            $nama_berkas1 = UploadedFile::getInstance($model, 'nama_berkas1');
            $nama_berkas2 = UploadedFile::getInstance($model, 'nama_berkas2');
            $nama_berkas3 = UploadedFile::getInstance($model, 'nama_berkas3');
            $nama_berkas4 = UploadedFile::getInstance($model, 'nama_berkas4');
            $nama_berkas5 = UploadedFile::getInstance($model, 'nama_berkas5');
            $nama_berkas6 = UploadedFile::getInstance($model, 'nama_berkas6');
            $nama_berkas7 = UploadedFile::getInstance($model, 'nama_berkas7');
            $nama_berkas8 = UploadedFile::getInstance($model, 'nama_berkas8');
            $nama_berkas9 = UploadedFile::getInstance($model, 'nama_berkas9');
            $nama_berkas10 = UploadedFile::getInstance($model, 'nama_berkas10');
            $nama_berkas11 = UploadedFile::getInstance($model, 'nama_berkas11');
            $nama_berkas12 = UploadedFile::getInstance($model, 'nama_berkas12');
            $nama_berkas13 = UploadedFile::getInstance($model, 'nama_berkas13');
            $nama_berkas14 = UploadedFile::getInstance($model, 'nama_berkas14');
            $nama_berkas15 = UploadedFile::getInstance($model, 'nama_berkas15');
            $nama_berkas16 = UploadedFile::getInstance($model, 'nama_berkas16');
            $nama_berkas17 = UploadedFile::getInstance($model, 'nama_berkas17');
            $nama_berkas18 = UploadedFile::getInstance($model, 'nama_berkas18');
            $nama_berkas19 = UploadedFile::getInstance($model, 'nama_berkas19');
            $nama_berkas20 = UploadedFile::getInstance($model, 'nama_berkas20');
            $nama_berkas21 = UploadedFile::getInstance($model, 'nama_berkas21');
            $nama_berkas22 = UploadedFile::getInstance($model, 'nama_berkas22');
            $nama_berkas23 = UploadedFile::getInstance($model, 'nama_berkas23');
            $nama_berkas24 = UploadedFile::getInstance($model, 'nama_berkas24');

            if (!empty($nama_berkas1)) {
                $nama_berkas1ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas1_' . $biodata->id . "." . $nama_berkas1->extension;
                $nama_berkas1->saveAs($nama_berkas1ToSave);
                $model->nama_berkas1 = $nama_berkas1ToSave;
                $model->alamat_berkas1 = $nama_berkas1ToSave;
            }

            if (!empty($nama_berkas2)) {
                $nama_berkas2ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas2_' . $biodata->id . "." . $nama_berkas2->extension;
                $nama_berkas2->saveAs($nama_berkas2ToSave);
                $model->nama_berkas2 = $nama_berkas2ToSave;
                $model->alamat_berkas2 = $nama_berkas2ToSave;
            }

            if (!empty($nama_berkas3)) {
                $nama_berkas3ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas3_' . $biodata->id . "." . $nama_berkas3->extension;
                $nama_berkas3->saveAs($nama_berkas3ToSave);
                $model->nama_berkas3 = $nama_berkas3ToSave;
                $model->alamat_berkas3 = $nama_berkas3ToSave;
            }

            if (!empty($nama_berkas4)) {
                $nama_berkas4ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas4_' . $biodata->id . "." . $nama_berkas4->extension;
                $nama_berkas4->saveAs($nama_berkas4ToSave);
                $model->nama_berkas4 = $nama_berkas4ToSave;
                $model->alamat_berkas4 = $nama_berkas4ToSave;
            }

            if (!empty($nama_berkas5)) {
                $nama_berkas5ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas5_' . $biodata->id . "." . $nama_berkas5->extension;
                $nama_berkas5->saveAs($nama_berkas5ToSave);
                $model->nama_berkas5 = $nama_berkas5ToSave;
                $model->alamat_berkas5 = $nama_berkas5ToSave;
            }

            if (!empty($nama_berkas6)) {
                $nama_berkas6ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas6_' . $biodata->id . "." . $nama_berkas6->extension;
                $nama_berkas6->saveAs($nama_berkas6ToSave);
                $model->nama_berkas6 = $nama_berkas6ToSave;
                $model->alamat_berkas6 = $nama_berkas6ToSave;
            }

            if (!empty($nama_berkas7)) {
                $nama_berkas7ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas7_' . $biodata->id . "." . $nama_berkas7->extension;
                $nama_berkas7->saveAs($nama_berkas7ToSave);
                $model->nama_berkas7 = $nama_berkas7ToSave;
                $model->alamat_berkas7 = $nama_berkas7ToSave;
            }

            if (!empty($nama_berkas8)) {
                $nama_berkas8ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas8_' . $biodata->id . "." . $nama_berkas8->extension;
                $nama_berkas8->saveAs($nama_berkas8ToSave);
                $model->nama_berkas8 = $nama_berkas8ToSave;
                $model->alamat_berkas8 = $nama_berkas8ToSave;
            }

            if (!empty($nama_berkas9)) {
                $nama_berkas9ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas9_' . $biodata->id . "." . $nama_berkas9->extension;
                $nama_berkas9->saveAs($nama_berkas9ToSave);
                $model->nama_berkas9 = $nama_berkas9ToSave;
                $model->alamat_berkas9 = $nama_berkas9ToSave;
            }

            if (!empty($nama_berkas10)) {
                $nama_berkas10ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas10_' . $biodata->id . "." . $nama_berkas10->extension;
                $nama_berkas10->saveAs($nama_berkas10ToSave);
                $model->nama_berkas10 = $nama_berkas10ToSave;
                $model->alamat_berkas10 = $nama_berkas10ToSave;
            }

            if (!empty($nama_berkas11)) {
                $nama_berkas11ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas11_' . $biodata->id . "." . $nama_berkas11->extension;
                $nama_berkas11->saveAs($nama_berkas11ToSave);
                $model->nama_berkas11 = $nama_berkas11ToSave;
                $model->alamat_berkas11 = $nama_berkas11ToSave;
            }

            if (!empty($nama_berkas12)) {
                $nama_berkas12ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas12_' . $biodata->id . "." . $nama_berkas12->extension;
                $nama_berkas12->saveAs($nama_berkas12ToSave);
                $model->nama_berkas12 = $nama_berkas12ToSave;
                $model->alamat_berkas12 = $nama_berkas12ToSave;
            }

            if (!empty($nama_berkas13)) {
                $nama_berkas13ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas13_' . $biodata->id . "." . $nama_berkas13->extension;
                $nama_berkas13->saveAs($nama_berkas13ToSave);
                $model->nama_berkas13 = $nama_berkas13ToSave;
                $model->alamat_berkas13 = $nama_berkas13ToSave;
            }

            if (!empty($nama_berkas14)) {
                $nama_berkas14ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas14_' . $biodata->id . "." . $nama_berkas14->extension;
                $nama_berkas14->saveAs($nama_berkas14ToSave);
                $model->nama_berkas14 = $nama_berkas14ToSave;
                $model->alamat_berkas14 = $nama_berkas14ToSave;
            }

            if (!empty($nama_berkas15)) {
                $nama_berkas15ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas15_' . $biodata->id . "." . $nama_berkas15->extension;
                $nama_berkas15->saveAs($nama_berkas15ToSave);
                $model->nama_berkas15 = $nama_berkas15ToSave;
                $model->alamat_berkas15 = $nama_berkas15ToSave;
            }

            if (!empty($nama_berkas16)) {
                $nama_berkas16ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas16_' . $biodata->id . "." . $nama_berkas16->extension;
                $nama_berkas16->saveAs($nama_berkas16ToSave);
                $model->nama_berkas16 = $nama_berkas16ToSave;
                $model->alamat_berkas16 = $nama_berkas16ToSave;
            }

            if (!empty($nama_berkas17)) {
                $nama_berkas17ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas17_' . $biodata->id . "." . $nama_berkas17->extension;
                $nama_berkas17->saveAs($nama_berkas17ToSave);
                $model->nama_berkas17 = $nama_berkas17ToSave;
                $model->alamat_berkas17 = $nama_berkas17ToSave;
            }

            if (!empty($nama_berkas18)) {
                $nama_berkas18ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas18_' . $biodata->id . "." . $nama_berkas18->extension;
                $nama_berkas18->saveAs($nama_berkas18ToSave);
                $model->nama_berkas18 = $nama_berkas18ToSave;
                $model->alamat_berkas18 = $nama_berkas18ToSave;
            }

            if (!empty($nama_berkas19)) {
                $nama_berkas19ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas19_' . $biodata->id . "." . $nama_berkas19->extension;
                $nama_berkas19->saveAs($nama_berkas19ToSave);
                $model->nama_berkas19 = $nama_berkas19ToSave;
                $model->alamat_berkas19 = $nama_berkas19ToSave;
            }

            if (!empty($nama_berkas20)) {
                $nama_berkas20ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas20_' . $biodata->id . "." . $nama_berkas20->extension;
                $nama_berkas20->saveAs($nama_berkas20ToSave);
                $model->nama_berkas20 = $nama_berkas20ToSave;
                $model->alamat_berkas20 = $nama_berkas20ToSave;
            }

            if (!empty($nama_berkas21)) {
                $nama_berkas21ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas21_' . $biodata->id . "." . $nama_berkas21->extension;
                $nama_berkas21->saveAs($nama_berkas21ToSave);
                $model->nama_berkas21 = $nama_berkas21ToSave;
                $model->alamat_berkas21 = $nama_berkas21ToSave;
            }

            if (!empty($nama_berkas22)) {
                $nama_berkas22ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas22_' . $biodata->id . "." . $nama_berkas22->extension;
                $nama_berkas22->saveAs($nama_berkas22ToSave);
                $model->nama_berkas22 = $nama_berkas22ToSave;
                $model->alamat_berkas22 = $nama_berkas22ToSave;
            }

            if (!empty($nama_berkas23)) {
                $nama_berkas23ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas23_' . $biodata->id . "." . $nama_berkas23->extension;
                $nama_berkas23->saveAs($nama_berkas23ToSave);
                $model->nama_berkas23 = $nama_berkas23ToSave;
                $model->alamat_berkas23 = $nama_berkas23ToSave;
            }

            if (!empty($nama_berkas24)) {
                $nama_berkas24ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas24_' . $biodata->id . "." . $nama_berkas24->extension;
                $nama_berkas24->saveAs($nama_berkas24ToSave);
                $model->nama_berkas24 = $nama_berkas24ToSave;
                $model->alamat_berkas24 = $nama_berkas24ToSave;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Berkas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Berkas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Berkas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Berkas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Berkas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
