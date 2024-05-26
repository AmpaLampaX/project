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
        <small><strong>Created At:</strong> <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?>
        <strong>By:</strong> <?= Html::encode($model->createdBy->username) ?></small>
        <?php if (!Yii::$app->user->isGuest && Yii::$app->user->id == $model->created_by): ?>
            <span class="admin-buttons">
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data-confirm' => 'Are you sure you want to delete this item?',
                    'data-method' => 'post',
                ]) ?>
            </span>
        <?php endif; ?>
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

    <!-- Display Comments -->
    <div class="comments-section">
        <h3 class="section-title">Comments</h3>
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

    <!-- Comment Form -->
    <?php if (!Yii::$app->user->isGuest): ?>
        <div class="comment-form-container">
            <h3 class="section-title">Leave a Comment</h3>
            <?php $form = ActiveForm::begin(['action' => ['article/comment', 'articleId' => $model->id]]); ?>
                <?= $form->field($commentModel, 'comment')->textarea(['rows' => 4])->label(false) ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit Comment', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    <?php endif; ?>

</div>

<?php
$this->registerCss("
    .article-view {
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .article-view h1 {
        color: #8B322C;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .article-view .text-muted {
        color: #666;
        margin-bottom: 20px;
    }
    .article-view .interaction-buttons {
        margin: 20px 0;
    }
    .article-view .interaction-buttons .btn-default {
        background-color: #8B322C;
        border-color: #8B322C;
        color: #ffffff;
    }
    .article-view .interaction-buttons .btn-default:hover {
        background-color: #DD5746;
        border-color: #DD5746;
    }
    .article-view .interaction-buttons .likes-count,
    .article-view .interaction-buttons .comments-count {
        color: #333;
    }
    .article-view .admin-buttons {
        float: right;
    }
    .article-view .admin-buttons .btn-primary {
        background-color: #4793AF;
        border-color: #4793AF;
        color: #ffffff;
    }
    .article-view .admin-buttons .btn-primary:hover {
        background-color: #FFC470;
        border-color: #FFC470;
    }
    .article-view .admin-buttons .btn-danger {
        background-color: #DD5746;
        border-color: #DD5746;
        color: #ffffff;
    }
    .article-view .admin-buttons .btn-danger:hover {
        background-color: #8B322C;
        border-color: #8B322C;
    }
    .article-view .comments-section {
        margin-top: 30px;
    }
    .article-view .comment-form-container {
        margin-top: 20px;
        background-color: #FFF8E1;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .article-view .section-title {
        color: #8B322C;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .article-view .comment-form-container .form-group .btn-primary {
        background-color: #8B322C;
        border-color: #8B322C;
        color: #ffffff;
    }
    .article-view .comment-form-container .form-group .btn-primary:hover {
        background-color: #DD5746;
        border-color: #DD5746;
    }
    .article-view .comment {
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #ddd;
    }
    .article-view .comment p {
        margin: 0;
    }
    .article-view .comment .text-muted {
        margin-top: 10px;
    }
    .article-view .comment .text-muted strong {
        color: #8B322C;
    }
");
?>
