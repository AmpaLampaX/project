<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Register */

$this->title = 'My Profile';
$this->params['breadcrumbs'][] = $this->title;

//move css
$this->registerCss("
    .site-profile {
        background-color: #f0f8ff; /* Light blue background */
        border-radius: 15px;
        padding: 20px;
        margin-top: 20px;
    }
    h1 {
        color: #333366; /* Dark blue */
        text-align: center;
    }
    p {
        background-color: #e6e6fa; /* Lavender */
        padding: 10px;
        border-radius: 10px;
        color: #333333; /* Dark gray */
        font-size: 16px;
    }
    p:nth-child(odd) {
        background-color: #f5f5f5; /* Lighter gray for odd items */
    }
");
?>

<div class="site-profile">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>First Name: <?= Html::encode($model->firstName) ?></p>
    <p>Last Name: <?= Html::encode($model->lastName) ?></p>
    <p>Username: <?= Html::encode($model->username) ?></p>
    <p>Contact Number: <?= Html::encode($model->contactNumber) ?></p>
    <p>Email: <?= Html::encode($model->email) ?></p>
</div>
<?php 
$this->title = 'Upload Photo';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['register/upload-photo'], // Adjust based on your controller/action
    'options' => ['enctype' => 'multipart/form-data'],
]); ?>

<?= $form->field($model, 'photoFile')->fileInput() ?>

<div class="form-group">
    <?= Html::submitButton('Upload', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>


<?php
$userId = Yii::$app->user->id;
$defaultPhoto = '@web/images/default-avatar.jpg'; // Path to default photo
$photoPath = Yii::getAlias('@web/uploads/User_photos/' . $userId . '.jpg'); // Assuming JPEG format

// Check if the photo exists and display it, otherwise display a default photo
echo file_exists(Yii::getAlias('@webroot/uploads/User_photos/' . $userId . '.jpg')) ? Html::img($photoPath) : Html::img($defaultPhoto);
