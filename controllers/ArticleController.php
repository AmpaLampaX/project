<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleSearch;
use app\models\ArticleLike;
use app\models\ArticleComment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
    
        // Add or modify the 'verbs' behavior
        $behaviors['verbs'] = [
            'class' => VerbFilter::className(),
            'actions' => [
                'delete' => ['POST'],
                // You can add more actions here if needed
            ],
        ];
    
        // Add or modify the 'access' behavior
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'only' => ['like', 'unlike', 'delete'], // Ensure 'delete' is also controlled for access
            'rules' => [
                [
                    'actions' => ['like', 'unlike'],
                    'allow' => true,
                    'roles' => ['@'], // '@' means authenticated users
                ],
                // If 'delete' action should be restricted to authenticated users as well
                [
                    'actions' => ['delete'],
                    'allow' => true,
                    'roles' => ['@'], // Adjust or add more roles as needed
                ],
            ],
        ];
    
        return $behaviors;
    }
    

    /**
     * Lists all Article models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param int $id ID
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
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
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionLike($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
        if (Yii::$app->user->isGuest) {
            return ['success' => false, 'message' => 'You must be logged in to like an Article.'];
        }
    
        $Article = $this->findModel($id); // Ensure you have a method to safely find an Article by ID
        $userId = Yii::$app->user->id;
    
        $existingLike = ArticleLike::findOne(['Article_id' => $id, 'user_id' => $userId]);
        if ($existingLike) {
            // Optionally, you could remove the like if it already exists, effectively making this a "toggle like" action
            return ['success' => false, 'message' => 'You have already liked this Article.'];
        }
    
        $like = new ArticleLike();
        $like->Article_id = $id;
        $like->user_id = $userId;
        $like->created_at = time();
    
        if ($like->save()) {
            // Return the new like count to update the UI accordingly
            return ['success' => true, 'likesCount' => $Article->getLikesCount()];
        } else {
            return ['success' => false, 'message' => 'An error occurred while liking the Article.'];
        }
    }
}
