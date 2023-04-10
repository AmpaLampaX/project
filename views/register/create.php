<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Register $model */

$this->title = 'Create Register';
$this->params['breadcrumbs'][] = ['label' => 'Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
