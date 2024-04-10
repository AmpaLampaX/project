<?php

namespace app\controllers;

use app\models\Faculties;
use app\models\FacultiesSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;



/**
 * FacultiesController implements the CRUD actions for Faculties model.
 */
class FacultiesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            //restrictions for non-admin users
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    // Rules for guests (not logged in users)
                    [
                        'actions' => ['index', 'view'], // Specify which actions are allowed
                        'allow' => true,
                        'roles' => ['?'], // ? means guest users
                    ],
                    // Rules for all authenticated users
                    [
                        'actions' => ['index', 'view','indexb'], // They can view and index
                        'allow' => true,
                        'roles' => ['@'], // @ means any authenticated user
                    ],
                    // Admin-specific rules
                    [
                        'actions' => ['create', 'update', 'delete'], // Restricting critical actions to admin
                        'allow' => true,
                        'roles' => ['@'], // Must be an authenticated user
                        'matchCallback' => function ($rule, $action) {
                            return !Yii::$app->user->isGuest && Yii::$app->user->identity->getIsAdmin();
                        }
                        
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ]
        ;
}

    /**
     * Lists all Faculties models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FacultiesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Faculties model.
     * @param int $ID ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID),
        ]);
    }

    /**
     * Creates a new Faculties model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Faculties();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID' => $model->ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Faculties model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID)
    {
        $model = $this->findModel($ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Faculties model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID)
    {
        $this->findModel($ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Faculties model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return Faculties the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Faculties::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionIndexb($button)
    {
        $filterModel = new FacultiesSearch();

        // define filter condition by button press
        $condition = ['LIKE','HOME_UNIVERSITY',$button];
        
        // get data provider
        $dataProvider = $filterModel->filter($this->request->queryParams, $condition);

        return $this->render('index', [
            'searchModel' => $filterModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
