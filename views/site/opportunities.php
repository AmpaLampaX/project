<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'OPPORTUNITIES';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-opportunities">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="college-selection">
        <h2>Select the faculty for which you want to explore opportunities: </h2>
    </div>

    <div class="button-container">
        <div class="row">
            <div class="col-md-3">
                <?= Html::button('FESB', ['class' => 'btn btn-primary', 'id' => 'FESB']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('FGAG', ['class' => 'btn btn-primary', 'id' => 'FGAG']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('FF', ['class' => 'btn btn-primary', 'id' => 'FF']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('KBF', ['class' => 'btn btn-primary', 'id' => 'KBF']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= Html::button('KIF', ['class' => 'btn btn-primary', 'id' => 'KIF']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('KTF', ['class' => 'btn btn-primary', 'id' => 'KTF']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('MEDICINE', ['class' => 'btn btn-primary', 'id' => 'MEDICINE']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('PMF', ['class' => 'btn btn-primary', 'id' => 'PMF']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= Html::button('EFST', ['class' => 'btn btn-primary', 'id' => 'EFST']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('SOSM', ['class' => 'btn btn-primary', 'id' => 'SOSM']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('LAW', ['class' => 'btn btn-primary', 'id' => 'LAW']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('SOFZ', ['class' => 'btn btn-primary', 'id' => 'SOFZ']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= Html::button('SOSS', ['class' => 'btn btn-primary', 'id' => 'SOSS']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('SOZS', ['class' => 'btn btn-primary', 'id' => 'SOZS']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('MARITIME', ['class' => 'btn btn-primary', 'id' => 'MARITIME']) ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('UMAS', ['class' => 'btn btn-primary', 'id' => 'UMAS']) ?>
            </div>
        </div>
    </div>

<!-- Rest of your view content -->

<!-- Add this section at the end of the <body> section or within a dedicated JavaScript section -->
<?php
 $this->registerCss("
 .button-container {
     margin-top: 20px;
 }
 .row {
     margin-bottom: 10px;
 }
 .col-md-3 {
     text-align: center;
 }

");

    $this->registerJs("
        $(document).on('click', '#FESB', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'FESB'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#FGAG', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'FGAG'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#FF', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'FF'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#KBF', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'KBF'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#KIF', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'KIF'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#KTF', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'KTF'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#MEDICINE', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'MEDICINE'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#PMF', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'PMF'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#EFST', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'EFST'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#SOSM', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'SOSM'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#LAW', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'LAW'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#SOFZ', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'SOFZ'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#SOSS', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'SOSS'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#SOZS', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'SOZS'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#MARITIME', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'MARITIME'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

        $(document).on('click', '#UMAS', function() {
            $.ajax({
                url: '/index.php?r=proba%2Findexb',
                data: {button: 'UMAS'},
                success: function(response) {
                    $('#grid-container').html(response);
                }
            });
        });

    ");
?>

    </p>

   
</div>