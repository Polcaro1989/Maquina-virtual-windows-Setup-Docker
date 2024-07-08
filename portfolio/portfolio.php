<?php include "./includes/header.php"; ?>
<section class="section  color-1 d-flex align-items-center ptb_150">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content text-center">
                    <h1 class="text-white  mb-3">Our Past Works</h2>
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.html">Inicio</a></li>
                            <li class="breadcrumb-item text-white active">Our Portfolio</li>
                        </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Portfolio Area Start ***** -->
<section id="portfolio" class="portfolio-area overflow-hidden ptb_100 color-1">
    <div class="container">
        <div class="row items portfolio-items">
            <?php include "./controllers/ControllerPortfolio2.php"; ?>
        </div>
    </div>
</section>
<script src="./assets/js/script-mensagens-portfolio.js"></script>
<?php include "includes/footer.php"; ?>