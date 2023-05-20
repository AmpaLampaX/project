<?php

use app\models\Proba;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ProbaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Probas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proba-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Proba', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ad',
            'bd',
            'cd',
            'md',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Proba $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ad' => $model->ad]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
