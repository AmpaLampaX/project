<?php
use yii\helpers\StringHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Article;


/** @var $model \app\models\Article */

// Assuming you have methods in your Article model to check if the current user has liked the Article
// and another method to count likes. If not, you'll need to implement these.
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
        <!-- Displaying just the likes count for simplicity. You could also add a like button if desired. -->
        <small><?= $likesCount ?> Likes</small>
    </div>
    
    <hr>
</div>
