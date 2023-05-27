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

    <?php // echo $form->field($model, 'CONTACT') ?>

    <?php // echo $form->field($model, 'FIELD_OF_STUDY') ?>

    <?php // echo $form->field($model, 'BACHELOR_PROGRAM') ?>

    <?php // echo $form->field($model, 'MASTER_PROGRAM') ?>

    <?php // echo $form->field($model, 'PhD') ?>

    <?php // echo $form->field($model, 'NUMBER_OF_STUDENTS') ?>

    <?php // echo $form->field($model, 'MOBILITY_DURATION') ?>

    <?php // echo $form->field($model, 'WINTER_DEADLINE') ?>

    <?php // echo $form->field($model, 'SUMMER_DEADLINE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
