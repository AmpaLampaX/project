<?php
/** @var yii\web\View $this */
$this->title = 'My Yii Application';

// Registering CSS directly in the view
$this->registerCss("
    body {
        background: url('".Yii::getAlias('@web')."/background/home_page.jpg') no-repeat center center fixed;
        background-size: cover;
        min-height: 100%;
        background-attachment: fixed;
    }
    .jumbotron, .body-content {
        background-color: rgba(0, 0, 0, 0.4);
        padding: 20px;
        border-radius: 8px;
    }
    .jumbotron h1 {
        color: #4793AF;
        font-size: 48px;
        font-weight: bold;
        text-shadow: 2px 2px 4px #333;
    }
    .jumbotron p.lead {
        color: #FFC470;
        font-size: 24px;
        font-weight: bold;
        text-shadow: 1px 1px 3px #333;
    }
    .jumbotron a.btn {
        color: #FFF;
        background-color: #4793AF;
        font-size: 20px;
        padding: 15px 30px;
        border-radius: 4px;
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transition: background-color 0.3s, color 0.3s;
    }
    .jumbotron a.btn:hover {
        background-color: #DD5746;
        color: #FFF;
    }
    .body-content p {
        color: #ffffff;
    }
    .body-content h2 {
        color: #FFC470;
        font-weight: bold;
    }
    .body-content a.btn-outline-secondary {
        color: #FFF;
        background-color: #4793AF;
        border: 2px solid #4793AF;
        padding: 10px 20px;
        border-radius: 4px;
        transition: background-color 0.3s, border-color 0.3s, color 0.3s;
    }
    .body-content a.btn-outline-secondary:hover {
        color: #FFF;
        background-color: #DD5746;
        border-color: #DD5746;
    }
");
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">GO ERASMUS!</h1>
        <p class="lead">Unlock the World, Unleash Your Future</p>
        <p><a class="btn btn-lg" href="https://www.unist.hr/me%C4%91unarodna-suradnja/me%C4%91unarodna-razmjena-i-natjecaji/natjecaji/mobilnost-studenata">Begin Your Quest</a></p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <h2>Start Your Journey</h2>
                <p>Unlock the full potential of your Erasmus journey by registering with us. This is your first step towards exploring a world of opportunities and connecting with like-minded individuals. By signing up,
                you gain access to exclusive resources, personalized advice, and a community of prospective and former Erasmus students eager to share their experiences. Registration is quick, easy, and your gateway
                to an enriching Erasmus exchange. Don't wait to discover what's possible – join our community today and start shaping your future.</p>
                <p><a class="btn btn-outline-secondary" href="http://localhost/index.php?r=register%2Fcreate">Join the Erasmus Elite &raquo;</a></p>
            </div>
            <div class="col-lg-4 mb-3">
                <h2>Explore Your Horizons</h2>
                <p>Discover the gateway to your Erasmus adventure through our University Opportunities section. Here, a comprehensive list of faculties from our university awaits, each offering unique Erasmus exchange
                opportunities abroad. Whether you dream of studying in a specific country or are exploring the academic offerings of different institutions, our intuitive search feature assists you in finding exactly
                what you need. Delve into the possibilities and take the first step toward an unforgettable educational experience. Click below to start exploring Erasmus opportunities tailored to your interests.</p>
                <p><a class="btn btn-outline-secondary" href="http://localhost/index.php?r=site%2Fopportunities">Adventure Launcher &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Dive Into Discussions</h2>
                <p>Embark on your Erasmus journey with insights from those who've walked the path before you. Our Forum is a vibrant community space where prospective and former Erasmus students share experiences,
                tips, and advice. Whether you're looking for accommodation, seeking the perfect roommate, or curious about which university to choose for your Erasmus exchange, our forum is your go-to resource.
                Dive into discussions, ask questions, and get a real feel for your upcoming adventure. Ready to connect and learn? Click the button below to explore our Forum.</p>
                <p><a class="btn btn-outline-secondary" href="http://localhost/index.php?r=article%2Findex">Engage & Exchange &raquo;</a></p>
            </div>
        </div>
    </div>
</div>
