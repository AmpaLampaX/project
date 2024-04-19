<?php

use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>


<?php if (!Yii::$app->user->isGuest): 
//only person who is loged in can write an Article ?>
    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
<?php endif; ?> 
        

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
    //    'filterModel' => $searchModel,
        'itemView'=>'_aritcle_item'

    ]); ?>


</div>
