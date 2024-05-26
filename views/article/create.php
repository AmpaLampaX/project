<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $availableSlugs */

$this->title = 'Create Article';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss("
    .article-create {
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .article-create h1 {
        color: #8B322C;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .article-form {
        background-color: #FFF8E1;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .article-form .form-group {
        margin-bottom: 20px;
    }
    .article-form .form-control {
        border-radius: 5px;
        background-color: #FFFFFF;
        color: #333;
        border: 1px solid #8B322C;
    }
    .article-form .form-control:focus {
        border-color: #DD5746;
        box-shadow: 0 0 0 0.2rem rgba(221, 87, 70, 0.25);
    }
    .article-form .btn-success {
        background-color: #8B322C;
        border-color: #8B322C;
        color: #ffffff;
    }
    .article-form .btn-success:hover {
        background-color: #DD5746;
        border-color: #DD5746;
    }
    .article-form label {
        color: #8B322C;
        font-weight: bold;
    }
");

?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="article-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

        <?php if ($model->university_id): ?>
            <!-- Prikazujemo trenutno postavljeni slug samo ako je članak povezan s fakultetom -->
            <div class="form-group">
                <?= Html::label('Slug', 'slugDisplay', ['class' => 'control-label']) ?>
                <?= Html::textInput('slugDisplay', $model->slug, ['class' => 'form-control', 'readonly' => true]) ?>
            </div>
        <?php endif; ?>

        <!-- Dodavanje dodatnih slugova -->
        <?= $form->field($model, 'slugs')->dropDownList($availableSlugs, [
            'multiple' => true, 
            'class' => 'form-control'
        ])->label('Choose Slugs (hold Ctrl to select multiple)') ?>

        <?= $form->field($model, 'slug')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'university_id')->hiddenInput()->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
