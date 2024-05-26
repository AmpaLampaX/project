<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss("
    .site-login {
        background-color: #4793AF;
        color: #FFFFFF;
        padding: 20px;
        border-radius: 10px;
    }
    .site-login h1 {
        color: #8B322C;
        font-weight: bold;
    }
    .site-login p {
        color: #FFFFFF;
    }
    .site-login .form-group .btn-primary {
        background-color: #8B322C;
        border-color: #8B322C;
    }
    .site-login .form-group .btn-primary:hover {
        background-color: #DD5746;
        border-color: #DD5746;
    }
    .form-control {
        border-radius: 5px;
        background-color: #FFFFFF;
        color: #000000;
    }
    .form-control:focus {
        border-color: #DD5746;
        box-shadow: 0 0 0 0.2rem rgba(221, 87, 70, 0.25);
    }
    .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #FFC470;
        border-color: #FFC470;
    }
    .custom-control-label {
        color: #FFC470;
        font-weight: bold;
    }
    .invalid-feedback {
        color: #FFC470;
    }
    label[for=\"loginform-username\"], 
    label[for=\"loginform-password\"] {
        color: #8B322C;
        font-weight: bold;
    }
");

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} <label class=\"custom-control-label\" for=\"loginform-rememberme\" style=\"color: #FFC470; font-weight: bold;\">Remember Me</label></div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
