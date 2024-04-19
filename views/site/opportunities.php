<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Opportunities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-opportunities">
    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
    <p class="page-description">Explore the diverse academic opportunities available at each faculty:</p>

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
                
                // Begin form
                echo Html::beginForm(Url::to(['faculties/indexb']), 'get', ['target' => '_self']);
                echo Html::hiddenInput('button', $code);
                echo Html::submitButton($name, ['class' => 'btn btn-primary faculty-button']);
                echo Html::endForm();
                
                echo Html::endTag('div');
            }
            ?>
        </div>
    </div>
</div>


<?php
$this->registerCss("
.site-opportunities {
    background-color: #f0f8ff; /* Slightly adjusted background color for better contrast */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.12);
}
.page-title {
    font-size: 2.5em; /* Larger font size */
    color: #0056b3; /* Theme color */
    text-align: center;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.2); /* Subtle text shadow for depth */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Stylish, readable font */
    margin-bottom: 20px;
}
.page-description {
    font-size: 1.2em;
    color: #333;
    text-align: center;
    margin-bottom: 30px; /* More space below the description */
    font-family: 'Arial', sans-serif;
}
.faculty-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.faculty-card {
    margin: 10px;
    text-align: center;
    transition: transform 0.3s ease-in-out;
}
.faculty-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.faculty-image {
    width: 100%;
    height: auto;
    max-width: 200px;
    border-radius: 5px;
    margin-bottom: 5px;
}
.faculty-button {
    width: 100%;
    background-color: #007bff;
    color: white;
    padding: 10px 0;
    border-radius: 4px;
    border: none;
    font-weight: bold;
    transition: background-color 0.3s;
}
.faculty-button:hover {
    background-color: #0056b3;
}
");

?>
