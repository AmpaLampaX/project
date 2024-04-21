
<?php
use app\models\Faculties;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
/** @var yii\web\View $this */
/** @var app\models\FacultiesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Faculties';
$this->params['breadcrumbs'][] = $this->title;

// Register your custom CSS
$this->registerCss("
    .faculties-index {
        background-color: #f5f5f5; /* Light background */
    }
    h1 {
        color: #4793AF; /* title */
    }
    .grid-view th {
        background-color: #4793AF; /* headers */
        color: #ffffff;
    }
    .grid-view td {
        color: #333; /* Dark gray - text */
    }

    .grid-view a {
        color: #8B322C; /* Links color */
    }
    .grid-view a:hover {
        color: #DD5746; /* Links hover color */
    }
    .button-custom{
        background-color: #FFC470; 
        border-color: #8B322C; 
    }
    .button-custom:hover{
        background-color: #DD5746; 
        border-color: #4793AF;
    }
");
?>
<div class="faculties-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->getIsAdmin()): ?>
        <p>
            <?= Html::a('Create Faculties', ['create'], ['class' => 'btn button-custom']) ?>
        </p>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'grid-view', 'style' => 'white-space:wrap;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                        //'ID',
            //'HOME_UNIVERSITY',
            'COUNTRY',
            'UNIVERSITY_OF_OUTGOING_MOBILITY',
            //'ERASMUS_ID_CODE',
            //'CONTACT',
            'FIELD_OF_STUDY',
            'BACHELOR_PROGRAM',
            'MASTER_PROGRAM',
            'PhD',
            //'NUMBER_OF_STUDENTS',
            //'MOBILITY_DURATION',
           // 'WINTER_DEADLINE',
            //'SUMMER_DEADLINE',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Faculties $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                },
                'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->getIsAdmin() // Only visible to admins
            ],
        ],
    ]); ?>

</div>

