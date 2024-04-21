<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Register */

$this->title = 'My Profile';
$this->params['breadcrumbs'][] = $this->title;


$this->registerCss("
    .site-profile {
        background-color: #f0f8ff; 
        border-radius: 15px;
        padding: 20px;
        margin-top: 20px;
        text-align: center; 
    }
    .site-profile img {
        border-radius: 50%; 
        width: 150px; 
        height: 150px; 
        object-fit: cover; 
        margin-bottom: 20px; 
    }
    h1 {
        color: #333366; 
    }
    .profile-details p {
        background-color: #e6e6fa;
        padding: 10px;
        border-radius: 10px;
        color: #333333;
        font-size: 16px;
        margin: 10px 0;
    .profile-details p:nth-child(odd) {
        background-color: #f5f5f5; 
    }
    .photo-form-container {
        margin-bottom: 30px;
    }
");

$userId = Yii::$app->user->id;
$defaultPhoto = Url::to('@web/uploads//User_photos/default_photo.jpg');
$photoPath = Url::to('@web/uploads/User_photos/' . $userId . '.jpg');
$userPhotoUrl = file_exists(Yii::getAlias('@webroot/uploads/User_photos/' . $userId . '.jpg')) ? $photoPath : $defaultPhoto;
?>

<div class="site-profile">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::img($userPhotoUrl, ['alt' => 'Profile photo']) ?>

    <div class="photo-form-container">
        <?php $form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['register/upload-photo'],
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

        <?= $form->field($model, 'photoFile')->fileInput() ?>
        <?= Html::submitButton('Upload', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>
    </div>

    <div class="profile-details">
        <p>First Name: <?= Html::encode($model->firstName) ?></p>
        <p>Last Name: <?= Html::encode($model->lastName) ?></p>
        <p>Username: <?= Html::encode($model->username) ?></p>
        <p>Contact Number: <?= Html::encode($model->contactNumber) ?></p>
        <p>Email: <?= Html::encode($model->email) ?></p>
    </div>
</div>
