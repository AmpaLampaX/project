<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use app\models\Article;
use app\models\ArticleLike;

/** @var yii\web\View $this */
/** @var app\models\Article $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

// Assuming you have a method in your Article model to check if the current user has liked the Article
// and another method to count likes. If not, you'll need to implement these.
$hasLiked = $model->hasUserLiked();
$likesCount = $model->getLikesCount();

?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="text-muted">
    <small>Created At: <b><?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?> </b>
    By: <b> <?php echo $model->createdBy->username ?></b></small>
    </p>
    
    <!-- Displaying the like button and like count -->
<!-- Displaying the like button and like count -->
<?php echo $model->getEncodedBody(); ?>

<p>
    <?= Html::a($hasLiked ? 'Unlike' : 'Like',
        [$hasLiked ? 'unlike' : 'like', 'id' => $model->id], [ 
        'class' => 'like-btn btn btn-default',
        'data-id' => $model->id,
        'data-liked' => $hasLiked ? '1' : '0',
    ]) ?>
    <span class="likes-count"><?= $likesCount ?> Likes</span>
</p>
    
    <?php  if (!Yii::$app->user->isGuest):?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>     

    <?php endif; ?>
       
    

</div>

<?php
// At the end of your view file, before the closing PHP tag

