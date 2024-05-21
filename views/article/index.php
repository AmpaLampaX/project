<?php

use app\models\Article;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest): ?>
        <p>
            <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>
    <?php endif; ?>

    <div class="article-search">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'id' => 'article-search-form'
        ]); ?>

        <?= $form->field($searchModel, 'slug')->textInput(['placeholder' => 'Search by slug'])->label(false) ?>
        <?= $form->field($searchModel, 'slug')->dropDownList([
            'roommates' => 'Roommates',
            'housing' => 'Housing',
            'study-tips' => 'Study Tips',
            'city-life' => 'City Life',
            'food' => 'Food',
            'travel' => 'Travel',
        ], ['prompt' => 'Select a slug'])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Reset', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_article_item',
    ]); ?>

</div>
