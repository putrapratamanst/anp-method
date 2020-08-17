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
        $model->scenario = 'create';

        $userName = Yii::$app->user->identity->username;
        $biodata = Biodata::find()->where(['nama_lengkap' => $userName])->one();
        $model->biodata_id = $id;
        
        if ($model->load(Yii::$app->request->post())&& $model->validate() ) {

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
            } else {
                $model->nama_berkas1 = NULL;
                $model->alamat_berkas1 = NULL;

            }

            if (!empty($nama_berkas2)) {
                $nama_berkas2ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas2_' . $biodata->id . "." . $nama_berkas2->extension;
                $nama_berkas2->saveAs($nama_berkas2ToSave);
                $model->nama_berkas2 = $nama_berkas2ToSave;
                $model->alamat_berkas2 = $nama_berkas2ToSave;
            } else {
                $model->nama_berkas2 = NULL;
                $model->alamat_berkas2 = NULL;
            }

            if (!empty($nama_berkas3)) {
                $nama_berkas3ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas3_' . $biodata->id . "." . $nama_berkas3->extension;
                $nama_berkas3->saveAs($nama_berkas3ToSave);
                $model->nama_berkas3 = $nama_berkas3ToSave;
                $model->alamat_berkas3 = $nama_berkas3ToSave;
            } else {
                $model->nama_berkas3 = NULL;
                $model->alamat_berkas3 = NULL;
            }

            if (!empty($nama_berkas4)) {
                $nama_berkas4ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas4_' . $biodata->id . "." . $nama_berkas4->extension;
                $nama_berkas4->saveAs($nama_berkas4ToSave);
                $model->nama_berkas4 = $nama_berkas4ToSave;
                $model->alamat_berkas4 = $nama_berkas4ToSave;
            } else {
                $model->nama_berkas4 = NULL;
                $model->alamat_berkas4 = NULL;
            }

            if (!empty($nama_berkas5)) {
                $nama_berkas5ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas5_' . $biodata->id . "." . $nama_berkas5->extension;
                $nama_berkas5->saveAs($nama_berkas5ToSave);
                $model->nama_berkas5 = $nama_berkas5ToSave;
                $model->alamat_berkas5 = $nama_berkas5ToSave;
            } else {
                $model->nama_berkas5 = NULL;
                $model->alamat_berkas5 = NULL;
            }

            if (!empty($nama_berkas6)) {
                $nama_berkas6ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas6_' . $biodata->id . "." . $nama_berkas6->extension;
                $nama_berkas6->saveAs($nama_berkas6ToSave);
                $model->nama_berkas6 = $nama_berkas6ToSave;
                $model->alamat_berkas6 = $nama_berkas6ToSave;
            } else {
                $model->nama_berkas6 = NULL;
                $model->alamat_berkas6 = NULL;
            }

            if (!empty($nama_berkas7)) {
                $nama_berkas7ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas7_' . $biodata->id . "." . $nama_berkas7->extension;
                $nama_berkas7->saveAs($nama_berkas7ToSave);
                $model->nama_berkas7 = $nama_berkas7ToSave;
                $model->alamat_berkas7 = $nama_berkas7ToSave;
            } else {
                $model->nama_berkas7 = NULL;
                $model->alamat_berkas7 = NULL;
            }

            if (!empty($nama_berkas8)) {
                $nama_berkas8ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas8_' . $biodata->id . "." . $nama_berkas8->extension;
                $nama_berkas8->saveAs($nama_berkas8ToSave);
                $model->nama_berkas8 = $nama_berkas8ToSave;
                $model->alamat_berkas8 = $nama_berkas8ToSave;
            } else {
                $model->nama_berkas8 = NULL;
                $model->alamat_berkas8 = NULL;
            }

            if (!empty($nama_berkas9)) {
                $nama_berkas9ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas9_' . $biodata->id . "." . $nama_berkas9->extension;
                $nama_berkas9->saveAs($nama_berkas9ToSave);
                $model->nama_berkas9 = $nama_berkas9ToSave;
                $model->alamat_berkas9 = $nama_berkas9ToSave;
            } else {
                $model->nama_berkas9 = NULL;
                $model->alamat_berkas9 = NULL;
            }

            if (!empty($nama_berkas10)) {
                $nama_berkas10ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas10_' . $biodata->id . "." . $nama_berkas10->extension;
                $nama_berkas10->saveAs($nama_berkas10ToSave);
                $model->nama_berkas10 = $nama_berkas10ToSave;
                $model->alamat_berkas10 = $nama_berkas10ToSave;
            } else {
                $model->nama_berkas10 = NULL;
                $model->alamat_berkas10 = NULL;
            }

            if (!empty($nama_berkas11)) {
                $nama_berkas11ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas11_' . $biodata->id . "." . $nama_berkas11->extension;
                $nama_berkas11->saveAs($nama_berkas11ToSave);
                $model->nama_berkas11 = $nama_berkas11ToSave;
                $model->alamat_berkas11 = $nama_berkas11ToSave;
            } else {
                $model->nama_berkas11 = NULL;
                $model->alamat_berkas11 = NULL;
            }

            if (!empty($nama_berkas12)) {
                $nama_berkas12ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas12_' . $biodata->id . "." . $nama_berkas12->extension;
                $nama_berkas12->saveAs($nama_berkas12ToSave);
                $model->nama_berkas12 = $nama_berkas12ToSave;
                $model->alamat_berkas12 = $nama_berkas12ToSave;
            } else {
                $model->nama_berkas12 = NULL;
                $model->alamat_berkas12 = NULL;
            }

            if (!empty($nama_berkas13)) {
                $nama_berkas13ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas13_' . $biodata->id . "." . $nama_berkas13->extension;
                $nama_berkas13->saveAs($nama_berkas13ToSave);
                $model->nama_berkas13 = $nama_berkas13ToSave;
                $model->alamat_berkas13 = $nama_berkas13ToSave;
            } else {
                $model->nama_berkas13 = NULL;
                $model->alamat_berkas13 = NULL;
            }

            if (!empty($nama_berkas14)) {
                $nama_berkas14ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas14_' . $biodata->id . "." . $nama_berkas14->extension;
                $nama_berkas14->saveAs($nama_berkas14ToSave);
                $model->nama_berkas14 = $nama_berkas14ToSave;
                $model->alamat_berkas14 = $nama_berkas14ToSave;
            } else {
                $model->nama_berkas14 = NULL;
                $model->alamat_berkas14 = NULL;
            }

            if (!empty($nama_berkas15)) {
                $nama_berkas15ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas15_' . $biodata->id . "." . $nama_berkas15->extension;
                $nama_berkas15->saveAs($nama_berkas15ToSave);
                $model->nama_berkas15 = $nama_berkas15ToSave;
                $model->alamat_berkas15 = $nama_berkas15ToSave;
            } else {
                $model->nama_berkas15 = NULL;
                $model->alamat_berkas15 = NULL;
            }

            if (!empty($nama_berkas16)) {
                $nama_berkas16ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas16_' . $biodata->id . "." . $nama_berkas16->extension;
                $nama_berkas16->saveAs($nama_berkas16ToSave);
                $model->nama_berkas16 = $nama_berkas16ToSave;
                $model->alamat_berkas16 = $nama_berkas16ToSave;
            } else {
                $model->nama_berkas16 = NULL;
                $model->alamat_berkas16 = NULL;
            }

            if (!empty($nama_berkas17)) {
                $nama_berkas17ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas17_' . $biodata->id . "." . $nama_berkas17->extension;
                $nama_berkas17->saveAs($nama_berkas17ToSave);
                $model->nama_berkas17 = $nama_berkas17ToSave;
                $model->alamat_berkas17 = $nama_berkas17ToSave;
            } else {
                $model->nama_berkas17 = NULL;
                $model->alamat_berkas17 = NULL;
            }

            if (!empty($nama_berkas18)) {
                $nama_berkas18ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas18_' . $biodata->id . "." . $nama_berkas18->extension;
                $nama_berkas18->saveAs($nama_berkas18ToSave);
                $model->nama_berkas18 = $nama_berkas18ToSave;
                $model->alamat_berkas18 = $nama_berkas18ToSave;
            } else {
                $model->nama_berkas18 = NULL;
                $model->alamat_berkas18 = NULL;
            }

            if (!empty($nama_berkas19)) {
                $nama_berkas19ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas19_' . $biodata->id . "." . $nama_berkas19->extension;
                $nama_berkas19->saveAs($nama_berkas19ToSave);
                $model->nama_berkas19 = $nama_berkas19ToSave;
                $model->alamat_berkas19 = $nama_berkas19ToSave;
            } else {
                $model->nama_berkas19 = NULL;
                $model->alamat_berkas19 = NULL;
            }

            if (!empty($nama_berkas20)) {
                $nama_berkas20ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas20_' . $biodata->id . "." . $nama_berkas20->extension;
                $nama_berkas20->saveAs($nama_berkas20ToSave);
                $model->nama_berkas20 = $nama_berkas20ToSave;
                $model->alamat_berkas20 = $nama_berkas20ToSave;
            } else {
                $model->nama_berkas20 = NULL;
                $model->alamat_berkas20 = NULL;
            }

            if (!empty($nama_berkas21)) {
                $nama_berkas21ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas21_' . $biodata->id . "." . $nama_berkas21->extension;
                $nama_berkas21->saveAs($nama_berkas21ToSave);
                $model->nama_berkas21 = $nama_berkas21ToSave;
                $model->alamat_berkas21 = $nama_berkas21ToSave;
            } else {
                $model->nama_berkas21 = NULL;
                $model->alamat_berkas21 = NULL;
            }

            if (!empty($nama_berkas22)) {
                $nama_berkas22ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas22_' . $biodata->id . "." . $nama_berkas22->extension;
                $nama_berkas22->saveAs($nama_berkas22ToSave);
                $model->nama_berkas22 = $nama_berkas22ToSave;
                $model->alamat_berkas22 = $nama_berkas22ToSave;
            } else {
                $model->nama_berkas22 = NULL;
                $model->alamat_berkas22 = NULL;
            }

            if (!empty($nama_berkas23)) {
                $nama_berkas23ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas23_' . $biodata->id . "." . $nama_berkas23->extension;
                $nama_berkas23->saveAs($nama_berkas23ToSave);
                $model->nama_berkas23 = $nama_berkas23ToSave;
                $model->alamat_berkas23 = $nama_berkas23ToSave;
            } else {
                $model->nama_berkas23 = NULL;
                $model->alamat_berkas23 = NULL;
            }

            if (!empty($nama_berkas24)) {
                $nama_berkas24ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas24_' . $biodata->id . "." . $nama_berkas24->extension;
                $nama_berkas24->saveAs($nama_berkas24ToSave);
                $model->nama_berkas24 = $nama_berkas24ToSave;
                $model->alamat_berkas24 = $nama_berkas24ToSave;
            } else {
                $model->nama_berkas24 = NULL;
                $model->alamat_berkas24 = NULL;
            }

            $model->save(false);
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
        $model->scenario = 'update';

        $userName = Yii::$app->user->identity->username;
        $biodata = Biodata::find()->where(['nama_lengkap' => $userName])->one();
        $current1 = $model->nama_berkas1;
        $current2 = $model->nama_berkas2;
        $current3 = $model->nama_berkas3;
        $current4 = $model->nama_berkas4;
        $current5 = $model->nama_berkas5;
        $current6 = $model->nama_berkas6;
        $current7 = $model->nama_berkas7;
        $current8 = $model->nama_berkas8;
        $current9 = $model->nama_berkas9;
        $current10 = $model->nama_berkas10;
        $current11 = $model->nama_berkas11;
        $current12 = $model->nama_berkas12;
        $current13 = $model->nama_berkas13;
        $current14 = $model->nama_berkas14;
        $current15 = $model->nama_berkas15;
        $current16 = $model->nama_berkas16;
        $current17 = $model->nama_berkas17;
        $current18 = $model->nama_berkas18;
        $current19 = $model->nama_berkas19;
        $current20 = $model->nama_berkas20;
        $current21 = $model->nama_berkas21;
        $current22 = $model->nama_berkas22;
        $current23 = $model->nama_berkas23;
        $current24 = $model->nama_berkas24;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

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


            if (isset($nama_berkas1) && !empty($nama_berkas1)) {
                $nama_berkas1ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas1_' . $biodata->id . "." . $nama_berkas1->extension;
                $nama_berkas1->saveAs($nama_berkas1ToSave);
                $model->nama_berkas1 = $nama_berkas1ToSave;
                $model->alamat_berkas1 = $nama_berkas1ToSave;
            } else {
                $model->nama_berkas1 = $current1;
                $model->alamat_berkas1 = $current1;
            }

            if (!empty($nama_berkas2)) {
                $nama_berkas2ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas2_' . $biodata->id . "." . $nama_berkas2->extension;
                $nama_berkas2->saveAs($nama_berkas2ToSave);
                $model->nama_berkas2 = $nama_berkas2ToSave;
                $model->alamat_berkas2 = $nama_berkas2ToSave;
            } else {
                $model->nama_berkas2 = $current2;
                $model->alamat_berkas2 = $current2;
            }

            if (!empty($nama_berkas3)) {
                $nama_berkas3ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas3_' . $biodata->id . "." . $nama_berkas3->extension;
                $nama_berkas3->saveAs($nama_berkas3ToSave);
                $model->nama_berkas3 = $nama_berkas3ToSave;
                $model->alamat_berkas3 = $nama_berkas3ToSave;
            } else {
                $model->nama_berkas3 = $current3;
                $model->alamat_berkas3 = $current3;
            }

            if (!empty($nama_berkas4)) {
                $nama_berkas4ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas4_' . $biodata->id . "." . $nama_berkas4->extension;
                $nama_berkas4->saveAs($nama_berkas4ToSave);
                $model->nama_berkas4 = $nama_berkas4ToSave;
                $model->alamat_berkas4 = $nama_berkas4ToSave;
            } else {
                $model->nama_berkas4 = $current4;
                $model->alamat_berkas4 = $current4;
            }

            if (!empty($nama_berkas5)) {
                $nama_berkas5ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas5_' . $biodata->id . "." . $nama_berkas5->extension;
                $nama_berkas5->saveAs($nama_berkas5ToSave);
                $model->nama_berkas5 = $nama_berkas5ToSave;
                $model->alamat_berkas5 = $nama_berkas5ToSave;
            } else {
                $model->nama_berkas5 = $current5;
                $model->alamat_berkas5 = $current5;
            }

            if (!empty($nama_berkas6)) {
                $nama_berkas6ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas6_' . $biodata->id . "." . $nama_berkas6->extension;
                $nama_berkas6->saveAs($nama_berkas6ToSave);
                $model->nama_berkas6 = $nama_berkas6ToSave;
                $model->alamat_berkas6 = $nama_berkas6ToSave;
            } else {
                $model->nama_berkas6 = $current6;
                $model->alamat_berkas6 = $current6;
            }

            if (!empty($nama_berkas7)) {
                $nama_berkas7ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas7_' . $biodata->id . "." . $nama_berkas7->extension;
                $nama_berkas7->saveAs($nama_berkas7ToSave);
                $model->nama_berkas7 = $nama_berkas7ToSave;
                $model->alamat_berkas7 = $nama_berkas7ToSave;
            } else {
                $model->nama_berkas7 = $current7;
                $model->alamat_berkas7 = $current7;
            }

            if (!empty($nama_berkas8)) {
                $nama_berkas8ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas8_' . $biodata->id . "." . $nama_berkas8->extension;
                $nama_berkas8->saveAs($nama_berkas8ToSave);
                $model->nama_berkas8 = $nama_berkas8ToSave;
                $model->alamat_berkas8 = $nama_berkas8ToSave;
            } else {
                $model->nama_berkas8 = $current8;
                $model->alamat_berkas8 = $current8;
            }

            if (!empty($nama_berkas9)) {
                $nama_berkas9ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas9_' . $biodata->id . "." . $nama_berkas9->extension;
                $nama_berkas9->saveAs($nama_berkas9ToSave);
                $model->nama_berkas9 = $nama_berkas9ToSave;
                $model->alamat_berkas9 = $nama_berkas9ToSave;
            } else {
                $model->nama_berkas9 = $current9;
                $model->alamat_berkas9 = $current9;
            }

            if (!empty($nama_berkas10)) {
                $nama_berkas10ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas10_' . $biodata->id . "." . $nama_berkas10->extension;
                $nama_berkas10->saveAs($nama_berkas10ToSave);
                $model->nama_berkas10 = $nama_berkas10ToSave;
                $model->alamat_berkas10 = $nama_berkas10ToSave;
            } else {
                $model->nama_berkas10 = $current10;
                $model->alamat_berkas10 = $current10;
            }

            if (!empty($nama_berkas11)) {
                $nama_berkas11ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas11_' . $biodata->id . "." . $nama_berkas11->extension;
                $nama_berkas11->saveAs($nama_berkas11ToSave);
                $model->nama_berkas11 = $nama_berkas11ToSave;
                $model->alamat_berkas11 = $nama_berkas11ToSave;
            } else {
                $model->nama_berkas11 = $current11;
                $model->alamat_berkas11 = $current11;
            }

            if (!empty($nama_berkas12)) {
                $nama_berkas12ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas12_' . $biodata->id . "." . $nama_berkas12->extension;
                $nama_berkas12->saveAs($nama_berkas12ToSave);
                $model->nama_berkas12 = $nama_berkas12ToSave;
                $model->alamat_berkas12 = $nama_berkas12ToSave;
            } else {
                $model->nama_berkas12 = $current12;
                $model->alamat_berkas12 = $current12;
            }

            if (!empty($nama_berkas13)) {
                $nama_berkas13ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas13_' . $biodata->id . "." . $nama_berkas13->extension;
                $nama_berkas13->saveAs($nama_berkas13ToSave);
                $model->nama_berkas13 = $nama_berkas13ToSave;
                $model->alamat_berkas13 = $nama_berkas13ToSave;
            } else {
                $model->nama_berkas13 = $current13;
                $model->alamat_berkas13 = $current13;
            }

            if (!empty($nama_berkas14)) {
                $nama_berkas14ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas14_' . $biodata->id . "." . $nama_berkas14->extension;
                $nama_berkas14->saveAs($nama_berkas14ToSave);
                $model->nama_berkas14 = $nama_berkas14ToSave;
                $model->alamat_berkas14 = $nama_berkas14ToSave;
            } else {
                $model->nama_berkas14 = $current14;
                $model->alamat_berkas14 = $current14;
            }

            if (!empty($nama_berkas15)) {
                $nama_berkas15ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas15_' . $biodata->id . "." . $nama_berkas15->extension;
                $nama_berkas15->saveAs($nama_berkas15ToSave);
                $model->nama_berkas15 = $nama_berkas15ToSave;
                $model->alamat_berkas15 = $nama_berkas15ToSave;
            } else {
                $model->nama_berkas15 = $current15;
                $model->alamat_berkas15 = $current15;
            }

            if (!empty($nama_berkas16)) {
                $nama_berkas16ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas16_' . $biodata->id . "." . $nama_berkas16->extension;
                $nama_berkas16->saveAs($nama_berkas16ToSave);
                $model->nama_berkas16 = $nama_berkas16ToSave;
                $model->alamat_berkas16 = $nama_berkas16ToSave;
            } else {
                $model->nama_berkas16 = $current16;
                $model->alamat_berkas16 = $current16;
            }

            if (!empty($nama_berkas17)) {
                $nama_berkas17ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas17_' . $biodata->id . "." . $nama_berkas17->extension;
                $nama_berkas17->saveAs($nama_berkas17ToSave);
                $model->nama_berkas17 = $nama_berkas17ToSave;
                $model->alamat_berkas17 = $nama_berkas17ToSave;
            } else {
                $model->nama_berkas17 = $current17;
                $model->alamat_berkas17 = $current17;
            }

            if (!empty($nama_berkas18)) {
                $nama_berkas18ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas18_' . $biodata->id . "." . $nama_berkas18->extension;
                $nama_berkas18->saveAs($nama_berkas18ToSave);
                $model->nama_berkas18 = $nama_berkas18ToSave;
                $model->alamat_berkas18 = $nama_berkas18ToSave;
            } else {
                $model->nama_berkas18 = $current18;
                $model->alamat_berkas18 = $current18;
            }

            if (!empty($nama_berkas19)) {
                $nama_berkas19ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas19_' . $biodata->id . "." . $nama_berkas19->extension;
                $nama_berkas19->saveAs($nama_berkas19ToSave);
                $model->nama_berkas19 = $nama_berkas19ToSave;
                $model->alamat_berkas19 = $nama_berkas19ToSave;
            } else {
                $model->nama_berkas19 = $current19;
                $model->alamat_berkas19 = $current19;
            }

            if (!empty($nama_berkas20)) {
                $nama_berkas20ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas20_' . $biodata->id . "." . $nama_berkas20->extension;
                $nama_berkas20->saveAs($nama_berkas20ToSave);
                $model->nama_berkas20 = $nama_berkas20ToSave;
                $model->alamat_berkas20 = $nama_berkas20ToSave;
            } else {
                $model->nama_berkas20 = $current20;
                $model->alamat_berkas20 = $current20;
            }

            if (!empty($nama_berkas21)) {
                $nama_berkas21ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas21_' . $biodata->id . "." . $nama_berkas21->extension;
                $nama_berkas21->saveAs($nama_berkas21ToSave);
                $model->nama_berkas21 = $nama_berkas21ToSave;
                $model->alamat_berkas21 = $nama_berkas21ToSave;
            } else {
                $model->nama_berkas21 = $current21;
                $model->alamat_berkas21 = $current21;
            }

            if (!empty($nama_berkas22)) {
                $nama_berkas22ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas22_' . $biodata->id . "." . $nama_berkas22->extension;
                $nama_berkas22->saveAs($nama_berkas22ToSave);
                $model->nama_berkas22 = $nama_berkas22ToSave;
                $model->alamat_berkas22 = $nama_berkas22ToSave;
            } else {
                $model->nama_berkas22 = $current22;
                $model->alamat_berkas22 = $current22;
            }

            if (!empty($nama_berkas23)) {
                $nama_berkas23ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas23_' . $biodata->id . "." . $nama_berkas23->extension;
                $nama_berkas23->saveAs($nama_berkas23ToSave);
                $model->nama_berkas23 = $nama_berkas23ToSave;
                $model->alamat_berkas23 = $nama_berkas23ToSave;
            } else {
                $model->nama_berkas23 = $current23;
                $model->alamat_berkas23 = $current23;
            }

            if (!empty($nama_berkas24)) {
                $nama_berkas24ToSave = Yii::getAlias('@frontend/web/uploads/berkas/') . 'nama_berkas24_' . $biodata->id . "." . $nama_berkas24->extension;
                $nama_berkas24->saveAs($nama_berkas24ToSave);
                $model->nama_berkas24 = $nama_berkas24ToSave;
                $model->alamat_berkas24 = $nama_berkas24ToSave;
            } else {
                $model->nama_berkas24 = $current24;
                $model->alamat_berkas24 = $current24;
            }

            $model->save();
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
