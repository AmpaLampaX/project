<?php
/** @var yii\web\View $this */
use yii\helpers\Html;

$this->title = 'Opportunities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-opportunities">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Select the faculty for which you want to explore opportunities:</p>

    <div class="card">
        <div class="card-body">
            <?php
            $faculties = [
                'FESB' => 'FESB', 'FGAG' => 'FGAG', 'FF' => 'FF', 'KBF' => 'KBF',
                'KIF' => 'KIF', 'KTF' => 'KTF', 'MEDICINE' => 'MEDICINE', 'PMF' => 'PMF',
                'EFST' => 'EFST', 'SOSM' => 'SOSM', 'LAW' => 'LAW', 'SOFZ' => 'SOFZ',
                'SOSS' => 'SOSS', 'SOZS' => 'SOZS', 'MARITIME' => 'MARITIME', 'UMAS' => 'UMAS'
            ];
            foreach ($faculties as $code => $name) {
                echo Html::button($name, ['class' => 'btn btn-outline-primary faculty-button', 'id' => $code, 'data-faculty' => $code]) . " ";
            }
            ?>
        </div>
    </div>

    <!-- Placeholder for dynamic content -->
    <div id="grid-container"></div>
</div>

<?php
$this->registerCss("
    .faculty-button {
        margin: 5px;
    }
    .card-body {
        text-align: center; /* Center the buttons */
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
