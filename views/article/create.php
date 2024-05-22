<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Create Article';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$availableSlugs = [
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
];
?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="article-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'slug')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'slugs')->dropDownList($availableSlugs, ['multiple' => true])->label('Choose Slugs (hold Ctrl to select multiple)') ?>
        <?= $form->field($model, 'university_id')->hiddenInput()->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
