<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Register $model */

$this->title = 'Registration Successful';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

// Register custom CSS for styling
$this->registerCss("
    .register-success, .register-view {
        background-color: #f5f5f5;
        border-radius: 10px;
        padding: 20px;
        margin: 20px 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .register-success h1, .register-view h1 {
        color: #8B322C;
        font-size: 24px;
    }
    .register-success p {
        color: #333;
        font-size: 16px;
        margin: 10px 0;
    }
    .register-view h1 {
        margin-top: 40px;
    }
    .btn-primary {
        background-color: #4793AF;
        border-color: #4793AF;
        color: #ffffff;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
    }
    .btn-primary:hover {
        background-color: #DD5746;
        border-color: #DD5746;
    }
    .detail-view {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
    }
    .detail-view th {
        background-color: #4793AF;
        color: #ffffff;
        font-weight: bold;
        padding: 10px;
    }
    .detail-view td {
        background-color: #f9f9f9;
        color: #333;
        padding: 10px;
    }
    .detail-view tr:nth-child(even) td {
        background-color: #eeeeee;
    }
    .profile-label {
        font-weight: bold;
        color: #8B322C;
    }
    .profile-data {
        color: #333;
    }
");
?>

<div class="register-success">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Your profile has been successfully created!</p>
    <p>Please log in to access your account.</p>
    <p>If you have any questions, feel free to contact our support team.</p>

</div>

<div class="register-view">

    <h1><?= Html::encode('Profile Details') ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table detail-view'],
        'attributes' => [
            [
                'attribute' => 'firstName',
                'label' => 'First Name',
                'labelOptions' => ['class' => 'profile-label'],
                'contentOptions' => ['class' => 'profile-data'],
            ],
            [
                'attribute' => 'lastName',
                'label' => 'Last Name',
                'labelOptions' => ['class' => 'profile-label'],
                'contentOptions' => ['class' => 'profile-data'],
            ],
            [
                'attribute' => 'username',
                'label' => 'Username',
                'labelOptions' => ['class' => 'profile-label'],
                'contentOptions' => ['class' => 'profile-data'],
            ],
            [
                'attribute' => 'contactNumber',
                'label' => 'Contact Number',
                'labelOptions' => ['class' => 'profile-label'],
                'contentOptions' => ['class' => 'profile-data'],
            ],
            [
                'attribute' => 'email',
                'label' => 'Email',
                'format' => 'email',
                'labelOptions' => ['class' => 'profile-label'],
                'contentOptions' => ['class' => 'profile-data'],
            ],
        ],
    ]) ?>

</div>
