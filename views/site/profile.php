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
        position: relative; /* For positioning the pencil icon */
    }
    .site-profile img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin-bottom: 20px;
        border: 3px solid #8B322C;
    }
    h1 {
        color: #8B322C;
        margin-bottom: 20px;
    }
    .profile-details {
        background-color: #FFF;
        padding: 15px;
        border-radius: 10px;
        margin: 20px 0;
        text-align: left;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .profile-details p {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 16px;
        margin: 10px 0;
        background-color: #f9f9f9;
        border-left: 5px solid #8B322C;
    }
    .profile-details p label {
        font-weight: bold;
        color: #8B322C;
        margin-right: 10px;
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
        margin: 5px;
    }
    .btn:hover {
        background-color: #DD5746;
    }
    .hidden {
        display: none;
    }
    .edit-photo-toggle {
        display: none;
    }
    .edit-photo-label {
        display: inline-block;
        cursor: pointer;
        color: #8B322C;
        font-size: 24px;
        position: absolute; /* Positioning the pencil icon */
        top: 20px; /* Adjust as necessary */
        right: 20px; /* Adjust as necessary */
    }
    .edit-photo-label:before {
        font-family: 'Font Awesome 5 Free'; /* Ensure Font Awesome is loaded */
        content: '\\f303'; /* Unicode for pencil icon */
        font-weight: 900;
    }
    .edit-photo-toggle:checked ~ .photo-form-container {
        display: block;
    }
    .photo-form-container {
        display: none;
        background-color: #FFF;
        padding: 15px;
        border-radius: 10px;
        margin: 20px 0;
        text-align: left;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .photo-form-container .form-group {
        margin-bottom: 15px;
    }
");

$userId = Yii::$app->user->id;
$defaultPhoto = Url::to('@web/uploads/User_photos/default_photo.jpg');
$userPhotoPath = Yii::getAlias('@webroot/uploads/User_photos/' . $userId . '.jpg');
$userPhotoUrl = file_exists($userPhotoPath) ? Url::to('@web/uploads/User_photos/' . $userId . '.jpg') . '?t=' . time() : $defaultPhoto;
$isUploaded = file_exists($userPhotoPath);
?>

<div class="site-profile">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::img($userPhotoUrl, ['alt' => 'Profile photo']) ?>

    <input type="checkbox" id="edit-photo-toggle" class="edit-photo-toggle">
    <label for="edit-photo-toggle" class="edit-photo-label"></label>

    <div class="photo-form-container">
        <?php if ($isUploaded): ?>
            <?php $form = ActiveForm::begin([
                'method' => 'post',
                'action' => ['register/change-photo'],
                'options' => ['enctype' => 'multipart/form-data'],
            ]); ?>
            <?= $form->field($model, 'photoFile')->fileInput(['class' => 'file-input']) ?>
            <?= Html::submitButton('Change Photo', ['class' => 'btn']) ?>
            <?= Html::a('Remove Photo', ['register/remove-photo'], ['class' => 'btn']) ?>
            <?php ActiveForm::end(); ?>
        <?php else: ?>
            <?php $form = ActiveForm::begin([
                'method' => 'post',
                'action' => ['register/upload-photo'],
                'options' => ['enctype' => 'multipart/form-data'],
            ]); ?>
            <?= $form->field($model, 'photoFile')->fileInput(['class' => 'file-input']) ?>
            <?= Html::submitButton('Upload Photo', ['class' => 'btn']) ?>
            <?php ActiveForm::end(); ?>
        <?php endif; ?>
    </div>

    <div class="profile-details">
        <p><label>First Name:</label> <?= Html::encode($model->firstName) ?></p>
        <p><label>Last Name:</label> <?= Html::encode($model->lastName) ?></p>
        <p><label>Username:</label> <?= Html::encode($model->username) ?></p>
        <p><label>Contact Number:</label> <?= Html::encode($model->contactNumber) ?></p>
        <p><label>Email:</label> <?= Html::encode($model->email) ?></p>
    </div>
</div>
