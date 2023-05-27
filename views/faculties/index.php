<?php

use app\models\Faculties;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\FacultiesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Faculties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculties-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Faculties', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options'=>['style'=>'white-space:wrap;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Faculties $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
