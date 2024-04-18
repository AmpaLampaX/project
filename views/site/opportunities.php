<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Opportunities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-opportunities">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Select the faculty for which you want to explore opportunities:</p>

    <div class="card">
        <div class="card-body faculty-grid">
            <?php
            $faculties = [
                'FESB' => 'FESB', 'FGAG' => 'FGAG', 'FF' => 'FF', 'KBF' => 'KBF',
                'KIF' => 'KIF', 'KTF' => 'KTF', 'MEDICINE' => 'MEDICINE', 'PMF' => 'PMF',
                'EFST' => 'EFST', 'SOSM' => 'SOSM', 'LAW' => 'LAW', 'SOFZ' => 'SOFZ',
                'SOSS' => 'SOSS', 'SOZS' => 'SOZS', 'MARITIME' => 'MARITIME', 'UMAS' => 'UMAS'
            ];
            foreach ($faculties as $code => $name) {
                $imgUrl = Url::to("@web/faculties_photos/{$code}.png"); 
                echo Html::beginTag('div', ['class' => 'faculty-card']);
                echo Html::img($imgUrl, ['alt' => $name, 'class' => 'faculty-image']);
                echo Html::button($name, [
                    'class' => 'btn btn-primary faculty-button',
                    'id' => $code,
                    'data-faculty' => $code,
                ]);
                echo Html::endTag('div');
            }
            ?>
        </div>
    </div>

    <div id="grid-container"></div>
</div>

<?php
$this->registerCss("
    .faculty-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .faculty-card {
        margin: 10px;
        text-align: center;
    }
    .faculty-image {
        max-width: 200px; 
        height: auto;
        margin-bottom: 5px;
    }
    .faculty-button {
        width: 100%;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        border: none;
        background: none;
        color: #007bff;
        padding: 0;
        font-weight: bold;
    }
    .card-body {
        text-align: center; // Center the buttons
    }
");

$this->registerJs("
    $(document).on('click', '.faculty-button', function() {
        var facultyCode = $(this).data('faculty');
        $.ajax({
            url: '/index.php?r=faculties/indexb',
            data: {button: facultyCode},
            success: function(response) {
                $('#grid-container').html(response);
            }
        });
    });
");
?>
