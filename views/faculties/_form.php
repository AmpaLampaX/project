<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Faculties $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="faculties-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID')->textInput() ?>

    <?= $form->field($model, 'HOME_UNIVERSITY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'COUNTRY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UNIVERSITY_OF_OUTGOING_MOBILITY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ERASMUS_ID_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CONTACT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FIELD_OF_STUDY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BACHELOR_PROGRAM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MASTER_PROGRAM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PhD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NUMBER_OF_STUDENTS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MOBILITY_DURATION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WINTER_DEADLINE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SUMMER_DEADLINE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
