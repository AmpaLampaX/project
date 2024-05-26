<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Register */

$this->title = 'My Profile';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss("
    body {
        background-color: #f4f6f8;
        color: #333;
    }
    .site-profile {
        background-color: #FFF8E1;
        border-radius: 15px;
        padding: 20px;
        margin: 20px auto;
        width: 90%;
        max-width: 600px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
        color: #8B322C;
    }
    .profile-details, .photo-form-container {
        background-color: #FFF8E1;
        padding: 15px;
        border-radius: 10px;
        margin: 30px 0;
    }
    .profile-details p {
        padding: 5px;
        border-radius: 5px;
        font-size: 16px;
        margin: 10px 0;
    }
    .btn {
        background-color: #8B322C;
        color: #FFFFFF;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn:hover {
        background-color: #DD5746;
    }
    .hidden {
        display: none;
    }
");

$userId = Yii::$app->user->id;
$defaultPhoto = Url::to('@web/uploads/User_photos/default_photo.jpg');
$photoPath = Url::to('@web/uploads/User_photos/' . $userId . '.jpg');
$userPhotoUrl = file_exists(Yii::getAlias('@webroot/uploads/User_photos/' . $userId . '.jpg')) ? $photoPath : $defaultPhoto;
$isUploaded = file_exists(Yii::getAlias('@webroot/uploads/User_photos/' . $userId . '.jpg'));
?>

<div class="site-profile">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::img($userPhotoUrl, ['alt' => 'Profile photo']) ?>

    <?php if ($isUploaded): ?>
        <div class="photo-form-container">
            <?php $form = ActiveForm::begin([
                'method' => 'post',
                'action' => ['register/change-photo'],
                'options' => ['enctype' => 'multipart/form-data'],
            ]); ?>
            <?= $form->field($model, 'photoFile')->fileInput(['class' => 'file-input']) ?>
            <?= Html::submitButton('Change Photo', ['class' => 'btn']) ?>
            <?= Html::a('Remove Photo', ['register/remove-photo'], ['class' => 'btn']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    <?php else: ?>
        <div class="photo-form-container">
            <?php $form = ActiveForm::begin([
                'method' => 'post',
                'action' => ['register/upload-photo'],
                'options' => ['enctype' => 'multipart/form-data'],
            ]); ?>
            <?= $form->field($model, 'photoFile')->fileInput(['class' => 'file-input']) ?>
            <?= Html::submitButton('Upload Photo', ['class' => 'btn']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    <?php endif; ?>

    <div class="profile-details">
        <p>First Name: <?= Html::encode($model->firstName) ?></p>
        <p>Last Name: <?= Html::encode($model->lastName) ?></p>
        <p>Username: <?= Html::encode($model->username) ?></p>
        <p>Contact Number: <?= Html::encode($model->contactNumber) ?></p>
        <p>Email: <?= Html::encode($model->email) ?></p>
    </div>
</div>
