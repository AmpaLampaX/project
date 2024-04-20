<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Opportunities';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/buttons.css');
?>
<div class="site-opportunities">
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
        <p class="page-description">Explore the diverse academic opportunities available at each faculty:</p>
    </div>

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
                echo Html::submitButton($name, ['class' => 'btn button-custom']);
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
    background: #4793AF; /* Keep the main theme color as the page background */
    padding: 20px;
    border-radius: 8px;
}

.jumbotron {
    background-color: rgba(0, 0, 0, 0.5); /* More transparency for the overlay */
    padding: 20px;
    border-radius: 8px;
}

.page-title {
    color: #FFC470;
    font-size: 4em; /* Larger for impact */
    font-weight: bold;
    text-shadow: 3px 3px 6px #333;
}

.page-description {
    color: #FFF;
    font-size: 1.5em; /* Larger for readability */
    margin-bottom: 40px; /* More space */
    text-shadow: 1px 1px 3px #333;
}

.faculty-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    gap: 20px; /* Add gap for consistent spacing */
}

.faculty-card {
    flex-basis: calc(25% - 20px); /* Adjust the width for 4 items per line accounting for the gap */
    margin-bottom: 20px; /* Consistent margin at the bottom */
    text-align: center;
    transition: transform 0.3s ease-in-out;
    background: linear-gradient(145deg, #f7fafd, #dfe7ee); /* Subtle gradient for cards */
    padding: 10px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* This will push the button to the bottom */
    height: 100%; /* Ensures that all cards are the same height */
}

.faculty-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.3); /* Deeper shadow for hover effect */
}

.faculty-image {
    width: 100%;
    height: auto;
    max-width: 180px; /* Slightly smaller images */
    border-radius: 5px;
    margin: 10px auto; /* Center image horizontally */
}

.button-custom {
    color: #FFF;
    background-color: #4793AF;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    margin-top: auto; /* Pushes the button to the bottom */
    width: 100%; /* Ensures button stretches to card width */
}

.button-custom:hover {
    background-color: #FFC470;
    color: #FFF;
}

");
?>
