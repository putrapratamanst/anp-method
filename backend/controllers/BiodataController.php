<?php

namespace backend\controllers;

use Yii;
use backend\models\Biodata;
use backend\models\BiodataSearch;
use frontend\models\Berkas;
use frontend\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BiodataController implements the CRUD actions for Biodata model.
 */
class BiodataController extends Controller
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

    public function actionEmail($id)
    {
        $berkas = Berkas::find()->where(['biodata_id' => $id])->one();
        $dataUser = Biodata::find()->with('users')
        ->where(['biodata.id' => $id])->one();

        // $unweightAlternatif = Eigen::find()->select(['eigen.*', 'biodata.nama_lengkap'])->join('left join', 'biodata', 'eigen.id_alternatif_kriteria = biodata.id')
        // ->where(['type' => Constant::TYPE_ALTERNATIF])->asArray()->all();

        $attribute = $berkas->attributeLabels();
        $user = $dataUser->getRelation('users')->one();
        $data = [];
        foreach ($berkas as $key => $value) {
            if (strpos($key, 'nama_berkas') !== false) { 
                if(!$value){
                    $data[] =  $attribute[$key];
                }
            }
        }

        // Yii::$app->mailer->compose()
        //     ->setFrom('putrapratamanst@gmail.com')
        //     ->setTo('putra@jojonomic.com')
        //     ->setSubject('Message subject')
        //     ->setTextBody('Plain text content')
        //     ->setHtmlBody('<b>HTML content</b>')
        //     ->send();

        $check = Yii::$app->mailer->compose('verif',  ['data' => $data])
            ->setTo($user->email)
            ->setFrom("putra@jojonomic.com")
            ->setSubject('Dokumen Yang Belum Dilengkapi')

        ->send();
        var_dump($check);
    }

    /**
     * Lists all Biodata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BiodataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Biodata model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Biodata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Biodata();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Biodata model.
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
     * Deletes an existing Biodata model.
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
     * Finds the Biodata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Biodata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Biodata::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public static function detailById($id)
    {
        return Biodata::find()->where(['id' => $id])->asArray()->one();
    }

}
