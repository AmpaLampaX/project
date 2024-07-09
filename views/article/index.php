<?php

use app\models\Article;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Forum';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss("
    .article-index {
        padding: 20px;
        border-radius: 10px;
    }
    .page-title {
        color: #8B322C;
        font-weight: bold;
        margin-bottom: 20px;
        font-size: 36px; 
    }
    .article-search-wrapper {
        float: right;
        margin-top: -70px; 
        margin-right: -15px;
    }
    .article-search {
        background-color: #FFF8E1;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .article-search .form-group {
        margin-bottom: 10px;
    }
    .article-search .form-control {
        border-radius: 5px;
        background-color: #FFFFFF;
        color: #333;
        border: 1px solid #8B322C;
    }
    .article-search .form-control:focus {
        border-color: #DD5746;
        box-shadow: 0 0 0 0.2rem rgba(221, 87, 70, 0.25);
    }
    .article-search .btn-primary {
        background-color: #8B322C;
        border-color: #8B322C;
        color: #fff;
    }
    .article-search .btn-primary:hover {
        background-color: #DD5746;
        border-color: #DD5746;
    }
    .article-search .btn-outline-secondary {
        border-color: #8B322C;
        color: #8B322C;
    }
    .article-search .btn-outline-secondary:hover {
        background-color: #DD5746;
        border-color: #DD5746;
        color: #fff;
    }
    .create-article-btn {
        background-color: #8B322C;
        border-color: #8B322C;
        color: #ffffff;
    }
    .create-article-btn:hover {
        background-color: #DD5746;
        border-color: #DD5746;
    }
    .summary {
        margin-bottom: 20px;
        margin-top: 10px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }
");

?>
<div class="article-index">

    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest): ?>
        <p>
            <?= Html::a('Create Article', ['create'], ['class' => 'btn create-article-btn']) ?>
        </p>
    <?php endif; ?>

    <div class="article-search-wrapper">
        <div class="article-search">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'id' => 'article-search-form'
            ]); ?>

            <?= $form->field($searchModel, 'slug')->textInput(['placeholder' => 'Search by slug'])->label(false) ?>
            <?= $form->field($searchModel, 'slug_dropdown')->dropDownList([
                'roommates' => 'Roommates',
                'housing' => 'Housing',
                'study-tips' => 'Study Tips',
                'city-life' => 'City Life',
                'food' => 'Food',
                'travel' => 'Travel',
                'language-learning' => 'Language Learning',
                'cultural-exchange' => 'Cultural Exchange',
                'part-time-jobs' => 'Part-Time Jobs',
                'scholarships' => 'Scholarships',
                'university-life' => 'University Life',
                'events' => 'Events',
                'volunteering' => 'Volunteering',
                'internships' => 'Internships',
                'healthcare' => 'Healthcare',
                'public-transport' => 'Public Transport',
                'nightlife' => 'Nightlife',
                'student-groups' => 'Student Groups',
                'sports-activities' => 'Sports Activities',
                'academic-advice' => 'Academic Advice',
            ], ['prompt' => 'Select a slug'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Reset', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_article_item',
    ]); ?>

</div>
