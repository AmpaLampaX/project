<?php
use yii\helpers\StringHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Article;

/** @var $model \app\models\Article */

$likesCount = $model->getLikesCount();
?>
<div class="article-item">
    <a href="<?= Url::to(['/article/view', 'id' => $model->id]) ?>"> 
        <h3><?= Html::encode($model->title) ?></h3>
    </a>

    <div> 
        <?= StringHelper::truncateWords($model->getEncodedBody(), 40) ?>
    </div>

    <div class="interaction-info">
        <small><?= $likesCount ?> Likes</small>
        <small><?= $model->getCommentsCount() ?> Comments</small>
        <small>Created At: <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?> By: <?= Html::encode($model->createdBy->username) ?></small>
    </div>
    
    <hr>
</div>
