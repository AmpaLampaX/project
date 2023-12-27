<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FacultiesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="faculties-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'HOME_UNIVERSITY') ?>

    <?= $form->field($model, 'COUNTRY') ?>

    <?= $form->field($model, 'UNIVERSITY_OF_OUTGOING_MOBILITY') ?>

    <?= $form->field($model, 'ERASMUS_ID_CODE') ?>

    <?= $form->field($model, 'CONTACT') ?>

    <?= $form->field($model, 'FIELD_OF_STUDY') ?>

    <?= $form->field($model, 'BACHELOR_PROGRAM') ?>

    <?= $form->field($model, 'MASTER_PROGRAM') ?>

    <?= $form->field($model, 'PhD') ?>

    <?=  $form->field($model, 'NUMBER_OF_STUDENTS') ?>

    <?= $form->field($model, 'MOBILITY_DURATION') ?>

    <?= $form->field($model, 'WINTER_DEADLINE') ?>

    <?= $form->field($model, 'SUMMER_DEADLINE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
