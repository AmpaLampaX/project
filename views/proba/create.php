<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Proba $model */

$this->title = 'Create Proba';
$this->params['breadcrumbs'][] = ['label' => 'Probas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proba-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
