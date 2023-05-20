<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Proba $model */

$this->title = 'Update Proba: ' . $model->ad;
$this->params['breadcrumbs'][] = ['label' => 'Probas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ad, 'url' => ['view', 'ad' => $model->ad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proba-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
