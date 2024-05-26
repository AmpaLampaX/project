<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Register $model */

$this->registerCss("
    .register-form {
        background-color: #FFF8E1;
        color: #333;
        padding: 20px;
        border-radius: 10px;
        margin: 20px 0;
        width: 100%;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .register-form p {
        color: #333;
        margin-bottom: 20px;
    }
    .register-form .form-group .btn-success {
        background-color: #8B322C;
        border-color: #8B322C;
    }
    .register-form .form-group .btn-success:hover {
        background-color: #DD5746;
        border-color: #DD5746;
    }
    .form-control {
        border-radius: 5px;
        background-color: #FFFFFF;
        color: #333;
    }
    .form-control:focus {
        border-color: #DD5746;
        box-shadow: 0 0 0 0.2rem rgba(221, 87, 70, 0.25);
    }
    label {
        color: #8B322C;
        font-weight: bold;
    }
    .invalid-feedback {
        color: #DD5746;
    }
    .register-form .row {
        justify-content: flex-start;
    }
    .register-form .col-lg-12 {
        flex: 0 0 auto;
        width: 100%;
    }
");

?>

<div class="register-form">

    <p>Please fill out the following fields to register:</p>

    <div class="row">
        <div class="col-lg-12">

            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-form-label'],
                    'inputOptions' => ['class' => 'form-control'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'contactNumber')->textInput() ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'name' => 'register-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
