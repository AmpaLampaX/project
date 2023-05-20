<?php

namespace app\controllers;

use app\models\Proba;
use app\models\ProbaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProbaController implements the CRUD actions for Proba model.
 */
class ProbaController extends Controller
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
     * Lists all Proba models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProbaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proba model.
     * @param int $ad Ad
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ad)
    {
        return $this->render('view', [
            'model' => $this->findModel($ad),
        ]);
    }

    /**
     * Creates a new Proba model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Proba();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ad' => $model->ad]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Proba model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ad Ad
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ad)
    {
        $model = $this->findModel($ad);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ad' => $model->ad]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Proba model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ad Ad
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ad)
    {
        $this->findModel($ad)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Proba model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ad Ad
     * @return Proba the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ad)
    {
        if (($model = Proba::findOne(['ad' => $ad])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

public function actionGetGridData()
{
    $button = Yii::$app->request->post('button');

    // Retrieve the grid data based on the button clicked
    $gridData = [];
    Yii::warning('Inside actiongriddata');
    if ($button === 'button1') {
        // Retrieve data for Button 1 grid
        $gridData = Proba::find()->all();
    } elseif ($button === 'button2') {
        // Retrieve data for Button 2 grid
        $gridData = Proba::find()->all();
    }

    return $this->renderPartial('_grid', ['data' => $gridData]);
}

}

