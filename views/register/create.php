<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Register $model */

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss("
    .register-create h1 {
        color: #8B322C;
        font-weight: bold;
        text-align: left;
        margin-bottom: 20px;
    }
");
?>

<div class="register-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
