<?php
use app\models\Register;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var app\models\ArticleComment $commentModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);

$hasLiked = $model->hasUserLiked();
$likesCount = $model->getLikesCount();
$commentsCount = $model->getCommentsCount(); 
?>

<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">
        <small>Created At: <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?>
        By: <?= Html::encode($model->createdBy->username) ?></small>
    </p>

    <?= $model->getEncodedBody() ?>

    <div class="interaction-buttons">
        <?= Html::a($hasLiked ? 'Unlike' : 'Like', ['article/' . ($hasLiked ? 'unlike' : 'like'), 'id' => $model->id], [
            'class' => 'btn btn-default',
            'data-id' => $model->id,
            'data-liked' => $hasLiked ? '1' : '0',
        ]) ?>
        <span class="likes-count"><?= $likesCount ?> Likes</span> | 
        <span class="comments-count"><?= $commentsCount ?> Comments</span>
    </div>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->id == $model->created_by): ?>
        <div class="admin-buttons">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data-confirm' => 'Are you sure you want to delete this item?',
                'data-method' => 'post',
            ]) ?>
        </div>
    <?php endif; ?>

    <!-- Comment Form -->
    <?php if (!Yii::$app->user->isGuest): ?>
        <div class="comment-form-container">
            <h3>Leave a Comment</h3>
            <?php $form = ActiveForm::begin(['action' => ['article/comment', 'articleId' => $model->id]]); ?>
                <?= $form->field($commentModel, 'comment')->textarea(['rows' => 4])->label(false) ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit Comment', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    <?php endif; ?>

    <!-- Display Comments -->
    <div class="comments-section">
        <h2>Comments</h2>
        <?php foreach ($model->getComments() as $comment): ?>
            <div class="comment">
                <p><?= Html::encode($comment->comment) ?></p>
                <p class="text-muted">Posted by <?= Html::encode($comment->user->username) ?> on <?= Yii::$app->formatter->asDatetime($comment->created_at) ?></p>
            </div>
        <?php endforeach; ?>
        <?php if (empty($model->getComments())): ?>
            <p>No comments yet.</p>
        <?php endif; ?>
    </div>

</div>
