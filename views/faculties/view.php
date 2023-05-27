<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Faculties $model */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Faculties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="faculties-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
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
            'ID',
            'HOME_UNIVERSITY',
            'COUNTRY',
            'UNIVERSITY_OF_OUTGOING_MOBILITY',
            'ERASMUS_ID_CODE',
            'CONTACT',
            'FIELD_OF_STUDY',
            'BACHELOR_PROGRAM',
            'MASTER_PROGRAM',
            'PhD',
            'NUMBER_OF_STUDENTS',
            'MOBILITY_DURATION',
            'WINTER_DEADLINE',
            'SUMMER_DEADLINE',
        ],
    ]) ?>

</div>
