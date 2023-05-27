<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Faculties $model */

$this->title = 'Create Faculties';
$this->params['breadcrumbs'][] = ['label' => 'Faculties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculties-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
