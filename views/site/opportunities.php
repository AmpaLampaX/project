<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Opportunities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-opportunities">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::button('Button 1', ['class' => 'btn btn-primary', 'id' => 'button1']) ?>
<?= Html::button('Button 2', ['class' => 'btn btn-primary', 'id' => 'button2']) ?>

<!-- Rest of your view content -->

<!-- Add this section at the end of the <body> section or within a dedicated JavaScript section -->
<?php
    $this->registerJs("
        $(document).on('click', '#button1', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findex',
                data: {button: 'button1'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#button2', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findex',
                data: {button: 'button2'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });
    ");
?>

    </p>

   
</div>