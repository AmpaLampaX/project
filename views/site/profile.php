<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Register */

$this->title = 'My Profile';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-profile">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>First Name: <?= Html::encode($model->firstName) ?></p>
    <p>Last Name: <?= Html::encode($model->lastName) ?></p>
    <p>Username: <?= Html::encode($model->username) ?></p>
    <p>Contact Number: <?= Html::encode($model->contactNumber) ?></p>
    <p>Email: <?= Html::encode($model->email) ?></p>
    <!-- Display more fields as needed -->
</div>