<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use app\models\ArticleLike;
use app\models\ArticleComment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;




class ArticleController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
    
        $behaviors['verbs'] = [
            'class' => VerbFilter::className(),
            'actions' => [
                'delete' => ['POST'],
            ],
        ];
        $behaviors['access']['rules'][] = [
            'actions' => ['comment'], 
            'allow' => true,
            'roles' => ['@'], // '@' means authenticated users
        ];
    
    
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'only' => ['like', 'unlike', 'delete'], 
            'rules' => [
                [
                    'actions' => ['like', 'unlike'],
                    'allow' => true,
                    'roles' => ['@'], 
                ],

                [
                    'actions' => ['delete'],
                    'allow' => true,
                    'roles' => ['@'], 
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
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    Yii::debug($searchModel->attributes, 'ArticleSearch attributes');
    Yii::debug($dataProvider->query->createCommand()->getRawSql(), 'ArticleSearch SQL');

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
    $commentModel = new ArticleComment();

    return $this->render('view', [
        'model' => $this->findModel($id),
        'commentModel' => $commentModel, 
    ]);
}


    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($university_id = null, $university_name = null)
    {
        $model = new Article();
    
        if ($university_id !== null && $university_name !== null) {
            $model->university_id = $university_id;
            $model->slug = $university_name;
        }
    
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                // Provjerite ako je `university_id` prazan i postavite ga na null
                if (empty($model->university_id)) {
                    $model->university_id = null;
                }
    
                // Ako postoji ime fakulteta, dodajte ga u niz slugova
                if (!empty($model->university_id) && !empty($model->slug)) {
                    $slugs = [$model->slug];
                } else {
                    $slugs = [];
                }
    
                // Dodajte odabrane slugove iz forme
                if (!empty($model->slugs)) {
                    $slugs = array_merge($slugs, $model->slugs);
                }
    
                // Spojite sve slugove u jedan string
                $model->slug = implode(',', $slugs);
    
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }
    
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    


public function actionArticlesByUniversity($slug)
{
    $searchModel = new ArticleSearch();
    $dataProvider = $searchModel->search([
        'ArticleSearch' => ['slug' => $slug]
    ]);

    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
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
    
        $Article = $this->findModel($id); 
        $userId = Yii::$app->user->id;
    
        $like = new ArticleLike();
        $like->article_id = $id;
        $like->user_id = $userId;
        $like->created_at = time();
        $like->save();
        
        return $this->redirect(Yii::$app->request->referrer);
    }
    public function actionUnlike($id)
    {
        $like = ArticleLike::find()->where(['user_id' => Yii::$app->user->id, 'article_id' => $id])->one();
        $like->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }
    public function actionComment($articleId)
    {
        $model = new ArticleComment();

        if ($model->load(Yii::$app->request->post())) {
            $model->article_id = $articleId;
            $model->user_id = Yii::$app->user->id; 
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Your comment has been posted.');
            } else {
                Yii::$app->session->setFlash('error', 'There was a problem posting your comment.');
            }
        }

        return $this->redirect(['view', 'id' => $articleId]);
    }


}
