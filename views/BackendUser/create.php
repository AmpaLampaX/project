<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BackendUser $model */

$this->title = 'Create Backend User';
$this->params['breadcrumbs'][] = ['label' => 'Backend Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
