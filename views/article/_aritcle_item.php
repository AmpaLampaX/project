<?php
use yii\helpers\StringHelper;
/**@var $model \app\models\Article */
?>
<div>
    <a href="<?php echo \yii\helpers\Url::to(['/article/view', 'id'=> $model->id]) ?>"> 
    <h3> <?php echo \yii\helpers\Html::encode($model->title)?> </h3>
    </a>

<div> 
    <?php echo StringHelper::truncateWords($model->getEncodedBody(),40)?>
</div>
<hr>
</div>