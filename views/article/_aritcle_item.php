<?php
use yii\helpers\StringHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Article;


/** @var $model \app\models\Article */


$likesCount = $model->getLikesCount();
?>
<div>
    <a href="<?php echo Url::to(['/article/view', 'id' => $model->id]) ?>"> 
        <h3> <?php echo Html::encode($model->title)?> </h3>
    </a>

    <div> 
        <?php echo StringHelper::truncateWords($model->getEncodedBody(), 40) ?>
    </div>

    <div>
        <!-- Displaying number of likes-->
        <small><?= $likesCount ?> Likes</small>
        <small><?= $model->getCommentsCount() ?> Comments</small>

    </div>
    
    <hr>
</div>
