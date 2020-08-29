<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use frontend\models\Biodata;
use frontend\models\BiodataSearch;
use frontend\models\BiodataToJurusan;
use frontend\models\SignupForm;
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
        $model = $this->findModel($id);
        $userData = User::findByUsername($model['nama_lengkap']);

        $biodataToJurusan = BiodataToJurusan::find()->where(['id_user' => $userData->id])->all();
       

        return $this->render('view', [
            'model'=>$model,
            'biodataToJurusan'=>$biodataToJurusan
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
        $modelSignup = new SignupForm();

        if(isset(Yii::$app->user->identity->username)){
            $data = Biodata::find()->where(['nama_lengkap' => Yii::$app->user->identity->username])->one();

            return $this->redirect(['view', 'id' => $data->id]);
        }
        if ($model->load(Yii::$app->request->post())) {
            
            $post = Yii::$app->request->post()['Biodata'];
            $modelSignup->username = $post['nama_lengkap'];
            $modelSignup->email = $post['email'];
            $modelSignup->password = $post['password'];

            if(!$modelSignup->signup()){
                $error = "";
                foreach ($modelSignup->errors as $key =>$value) {
                    $error .= json_encode($value);
                }
            Yii::$app->session->setFlash('danger', $error);

                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            $userData = User::findByUsername($post['nama_lengkap']);

            $model->user_id = $userData->id;

            foreach ($post['jurusan'] as $keyJurusan => $valueJurusan) {
                $biodataToJurusan = new BiodataToJurusan();
                $biodataToJurusan->id_user = $userData->id;
                $biodataToJurusan->id_jurusan = $valueJurusan;
                $biodataToJurusan->save();
            }
            // $model->jurusan ini diabaikan

            if(!$model->save()){
                $errorModel = "";
                foreach ($model->errors as $key => $value) {
                    $errorModel .= json_encode($value);
                }
                Yii::$app->session->setFlash('danger', $errorModel);
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

            Yii::$app->session->setFlash('success', "Silahkan Login dengan Username:{$post['nama_lengkap']} dan Password: 123456");
            // return $this->goHome();

            return $this->redirect('/site/login');
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
        $userData = User::findByUsername($model['nama_lengkap']);

        $biodataToJurusan = BiodataToJurusan::find()->where(['id_user' => $userData->id])->all();
       

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post()['Biodata'];
            foreach ($biodataToJurusan as $value) {
                $value->delete();
            }

            foreach ($post['jurusan'] as $valueJurusan) {
                $biodataToJurusan = new BiodataToJurusan();
                $biodataToJurusan->id_user = $userData->id;
                $biodataToJurusan->id_jurusan = $valueJurusan;
                $biodataToJurusan->save();
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'biodataToJurusan' => $biodataToJurusan,
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
}
