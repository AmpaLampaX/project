<?php
use yii\helpers\StringHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Article;

/** @var $model \app\models\Article */

$likesCount = $model->getLikesCount();
?>
<div class="article-item">
    <a href="<?= Url::to(['/article/view', 'id' => $model->id]) ?>" class="article-title-link"> 
        <h3 class="article-item-title"><?= Html::encode($model->title) ?></h3>
    </a>

    <div class="article-body"> 
        <?= StringHelper::truncateWords($model->getEncodedBody(), 40) ?>
    </div>

    <div class="interaction-info">
        <small><?= $likesCount ?> Likes</small>
        <small><?= $model->getCommentsCount() ?> Comments</small>
        <div>
            <small><strong>Created:</strong> <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?> <strong>By:</strong> <?= Html::encode($model->createdBy->username) ?></small>
        </div>
    </div>
    
    <hr>
</div>

<?php

$this->registerCss("
    .article-item {
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px;
    }
    .article-title-link {
        text-decoration: none;
    }
    .article-item-title {
        color: #8B322C; /* Article titles color */
        font-weight: bold;
        font-size: 20px;
    }
    .article-title-link:hover .article-item-title {
        color: #DD5746; /* Hover color for article titles */
    }
    .article-body {
        margin-top: 10px;
        color: #333;
    }
    .interaction-info {
        margin-top: 10px;
        color: #666;
    }
    .interaction-info small {
        margin-right: 15px;
    }
    .interaction-info div {
        margin-top: 5px;
    }
    .interaction-info strong {
        font-weight: bold;
    }
    hr {
        border-top: 1px solid #ddd;
    }
");
?>
