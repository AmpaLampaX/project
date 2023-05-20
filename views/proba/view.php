<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Proba $model */

$this->title = $model->ad;
$this->params['breadcrumbs'][] = ['label' => 'Probas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="proba-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ad' => $model->ad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ad' => $model->ad], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ad',
            'bd',
            'cd',
            'md',
        ],
    ]) ?>

</div>
