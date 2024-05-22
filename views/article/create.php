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
                <?= Html::label('Slug') ?>
                <?= Html::textInput('slugDisplay', $model->slug, ['class' => 'form-control', 'readonly' => true]) ?>
            </div>
        <?php endif; ?>

        <!-- Dodavanje dodatnih slugova -->
        <?= $form->field($model, 'slugs')->dropDownList($availableSlugs, ['multiple' => true])->label('Choose Slugs (hold Ctrl to select multiple)') ?>

        <?= $form->field($model, 'slug')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'university_id')->hiddenInput()->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
