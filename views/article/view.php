<?php

use app\models\Register;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\ArticleComment; 

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var app\models\ArticleComment $commentModel */ 

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$hasLiked = $model->hasUserLiked();
$likesCount = $model->getLikesCount();
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">
        <small>Created At: <b><?= Yii::$app->formatter->asRelativeTime($model->created_at) ?></b>
        By: <b><?= $model->createdBy->username ?></b></small>
    </p>
    
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

    <?php if (Yii::$app->user->id == $model->created_by): ?>
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

    <!-- Comment Form -->
    <?php if (!Yii::$app->user->isGuest): // Show comment form only to logged-in users ?>
        <div class="comment-form">
            <h3>Leave a Comment</h3>
            <?php $form = ActiveForm::begin([
                'action' => ['article/comment', 'articleId' => $model->id ], 
                'method' => 'post',
            ]); ?>

            <?php
                $commentModel->article_id = $model->id;
                $commentModel->user_id = Yii::$app->user;
            ?> 

            <?= $form->field($commentModel, 'comment')->textarea(['rows' => 4])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Submit Comment', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    <?php endif; ?>

    <!-- Display Comments -->
    <div class="comments">
        <h2>Comments</h2>
        <?php 
            $allComments = $model->getComments();
            if ($allComments) {
                foreach ($allComments as $currentComment): // Adjust relation/method name as needed 
                        echo "<div class='comments'>";
                        echo "<p>" . Html::encode($currentComment->comment) . "</p>";
                        echo "<p class='text-muted'>Posted by " . 
                            Html::encode(Register::find()->where(['id' => $currentComment->user_id])->one()->username) . 
                            " on " . Yii::$app->formatter->asDatetime($currentComment->created_at). "</p>";
                        echo "</div>";
                endforeach;
            } else {
                echo "<p>No comments yet.</p>";
            }
        ?>

    </div>

</div>
