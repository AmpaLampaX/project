<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Proba $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="proba-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ad')->textInput() ?>

    <?= $form->field($model, 'bd')->textInput() ?>

    <?= $form->field($model, 'cd')->textInput() ?>

    <?= $form->field($model, 'md')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
