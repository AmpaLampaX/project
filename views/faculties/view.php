<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Faculties $model */

$this->title = $model->UNIVERSITY_OF_OUTGOING_MOBILITY;
$this->params['breadcrumbs'][] = ['label' => 'Faculties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="faculties-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->getIsAdmin()): ?>
        <div class="admin-buttons">
        <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <?php endif; ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID',
            [
                'attribute' => 'HOME_UNIVERSITY',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'COUNTRY',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'UNIVERSITY_OF_OUTGOING_MOBILITY',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'ERASMUS_ID_CODE',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'CONTACT',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'FIELD_OF_STUDY',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'BACHELOR_PROGRAM',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'MASTER_PROGRAM',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'PhD',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'NUMBER_OF_STUDENTS',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'MOBILITY_DURATION',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'WINTER_DEADLINE',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
            [
                'attribute' => 'SUMMER_DEADLINE',
                'labelOptions' => ['style' => 'color:#8B322C'],
                'contentOptions' => ['style' => 'color:#333'],
            ],
        ],
        'options' => ['class' => 'table table-striped table-bordered detail-view'],
    ]) ?>

</div>

<?php
$this->registerCss("
    .faculties-view {
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        background-color: #ffffff;
    }
    .faculties-view h1 {
        color: #8B322C;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .admin-buttons {
        margin-bottom: 20px;
    }
    .admin-buttons .btn-primary {
        background-color: #4793AF;
        border-color: #4793AF;
        color: #ffffff;
    }
    .admin-buttons .btn-primary:hover {
        background-color: #FFC470;
        border-color: #FFC470;
    }
    .admin-buttons .btn-danger {
        background-color: #DD5746;
        border-color: #DD5746;
        color: #ffffff;
    }
    .admin-buttons .btn-danger:hover {
        background-color: #8B322C;
        border-color: #8B322C;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }
    .table th, .table td {
        padding: 1rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }
    .table .table {
        background-color: #fff;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05);
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0,0,0,.075);
    }
    .detail-view {
        margin-top: 20px;
    }
");
?>
