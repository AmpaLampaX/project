<?php

namespace app\controllers;

use app\models\Register;
use app\models\RegisterSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RegisterController implements the CRUD actions for Register model.
 */
class RegisterController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Register models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RegisterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Register model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Register model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Register();

        if ($this->request->isPost) {

           if ($model->load($this->request->post())){
            $model->authKey = Yii::$app->security->generateRandomString(19);
            $model->id = Yii::$app->security->generateRandomString(1);

            if($model->save()) {
                Yii::error('kraj');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
            else{
                Yii::error('failed');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Register model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Register model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Register model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Register the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Register::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUploadPhoto()
    {
        $userId = Yii::$app->user->id;
        $model = new Register();

        $model->photoFile = UploadedFile::getInstance($model, 'photoFile'); 

        if ($model->photoFile) {
            $filePath = 'uploads/User_photos/' . $userId . '.' . $model->photoFile->extension;

           
            if (!file_exists('uploads/User_photos/')) {
                mkdir('uploads/User_photos/', 0777, true);
            }

            if ($model->photoFile->saveAs($filePath)) {
                Yii::$app->session->setFlash('success', 'Photo uploaded successfully.');
               
            } else {
                Yii::$app->session->setFlash('error', 'There was an error uploading your photo.');
            }
        }

        return $this->redirect(Yii::$app->request->referrer);
    }
    

}
