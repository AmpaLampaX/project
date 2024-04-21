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
                $imgUrl = Url::to("@web/faculties/{$code}.png"); 
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
    background: #4793AF; 
    padding: 20px;
    border-radius: 8px;
}

.jumbotron {
    background-color: rgba(0, 0, 0, 0.5); 
    padding: 20px;
    border-radius: 8px;
}

.page-title {
    color: #FFC470;
    font-size: 4em; 
    font-weight: bold;
    text-shadow: 3px 3px 6px #333;
}

.page-description {
    color: #FFF;
    font-size: 1.5em;
    margin-bottom: 40px;
    text-shadow: 1px 1px 3px #333;
}

.faculty-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    gap: 20px; 
}

.faculty-card {
    flex-basis: calc(25% - 20px); 
    margin-bottom: 20px; 
    text-align: center;
    transition: transform 0.3s ease-in-out;
    background: linear-gradient(145deg, #f7fafd, #dfe7ee); 
    padding: 10px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    justify-content: space-between; 
    height: 100%; 
}

.faculty-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.3); 
}

.faculty-image {
    width: 100%;
    height: auto;
    max-width: 180px; 
    border-radius: 5px;
    margin: 10px auto; 
}

.button-custom {
    color: #FFF;
    background-color: #4793AF;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    margin-top: auto;
    width: 100%; 
}

.button-custom:hover {
    background-color: #FFC470;
    color: #FFF;
}

");
?>
