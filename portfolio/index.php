<?php include "./includes/header.php"; ?>
<?php include "./includes/z_db.php"; ?>
<section id="home" class="section color-1 overflow-hidden d-flex align-items-center ptb_150">
    <div class="container z-index">
        <div class="row align-items-center">
            <!-- Welcome Intro Start -->
            <div class="col-12 col-md-7 mt-5">
                <div class="welcome-intro">
                    <?php include "./controllers/ControllerWelcomeStatic.php"; ?>
                    <div class="container py-5">
                        <h1 id="stitle" class="cursor text-white text-center"></h1>
                        <h3 class="text-white my-4 mt-5 text-center"></h3>

                    </div>
                   
                 <div class="button-group text-center">
                        <a class='service-btn mt-3 text-white' href=''>
                            <i class="fas fa-envelope"></i> Contato
                        </a>
                        <a class='service-btn mt-3 text-white' href='./dashboard/uploads/curriculo/ <?php $pdf_curriculo ?>'>
                            <i class="fas fa-download"></i> Baixar Currículo
                        </a>
                    </div> 
                </div>
            </div>
            <div class="col-12 col-md-5">
                <!-- Welcome Thumb -->
                <div class="welcome-thumb-wrapper mt-5 mt-md-0">
                    <span class="welcome-thumb-1">
                        <div data-aos="fade-left"></div>
                        <img data-aos="fade-left" data-aos-duration="1000" class="d-block ml-auto" src="./dashboard/uploads/welcome/<?php echo $ufile; ?>" alt="Card image">
                </div>
            </div>
        </div>
    </div>
  
</section>
 
<div class="scroll_down " >
                        <a href="#banner" class="scroll ">
                            <i class="text-white"></i>
                        </a>
                    </div>
<section class="section promo-area bg-grey ptb_150 color-1">
    <div class="container ptb_150">
        <div class="row ptb_150" >
            <?php include "./controllers/ControllerWhy_us.php"; ?>
        </div>
    </div>
</section>
<!-- ***** Promo Area End ***** -->
<!--Video -->
<!-- <section id="video" class="overflow-hidden pt-5 mt-n5">
    <div class="container-fluid color-1">
        <div class="row justify-content-center">
            <div class="col-md-6 px-md-4">
                <div class="section-heading text-center m-0">
                    <h1 class="text-white mt-5"><?php print $why_title; ?></h1>
                    <p class="text-white  mt-4"><?php print $why_text; ?></p>
                </div>
            </div>
            <div class="col-md-6 px-md-4 ptb_150">
                <div class="container-fluid p-0">
                    <div id="videoCarousel" class="carousel slide custom-carousel" data-bs-ride="carousel">
                        <div class="carousel-inner ">
                            <?php include "./controllers/ControllerVideo.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Video end -->
<section id="service" class="section service-area bg-grey ptb_150 color-1" >
    <div class="shape shape-top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" fill="#FFFFFF">
            <path class="shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
        </svg>
    </div>
    <div class="container " id="banner">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-10 col-lg-7">
                <div class="section-heading text-center ">
                    <h1 class="text-white"><?php print $service_title ?></h1>
                    <p class="d-none d-sm-block mt-4 text-white"><?php print $service_text ?></p>
                </div>
            </div>
        </div>
        <div class="row" >
            <?php include "./controllers/ControllerService.php"; ?>
        </div>
    </div>
    <div class="shape shape-bottom color-1">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" fill="#FFFFFF">
            <path class="shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
        c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
        c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
        </svg> -->
    </div>
</section>
<section id="portfolio" class="portfolio-area overflow-hidden ptb_100 color-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-7">
                <div class="section-heading text-center">
                    <h1 class="text-white"><?php print $port_title ?></h1>
                    <p class="d-none d-sm-block mt-4 text-white"><?php print $port_text ?></p>
                </div>
            </div>
        </div>
        <div class="row items portfolio-items">
            <?php include "./controllers/ControllerPortfolio.php"; ?>
        </div>
    </div>
</section>
<section id="review" class="section review-area color-1 ptb_100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-7">
                <div class="section-heading text-center">
                    <h1 class="text-white"><?php print $test_title; ?></h2>
                        <p class="text-white d-none d-sm-block mt-4"><?php print $test_text; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="client-reviews owl-carousel">
                <?php include "./controllers/ControllerTestmony.php"; ?>
            </div>
        </div>
    </div>
</section>
<!--Cursos-->

<section class="section  color-1 d-flex align-items-center ptb_150">
    <div class="container color-1 rounded">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-12 ">
                <div class="section-heading text-center ">
                    <div class="section-heading text-center">
                        <h1 class="text-white"><?php print $about_title ?></h1>
                        <p class="d-none d-sm-block mt-4 text-white"><?php print $about_text ?></p>
                    </div>
                    <?php include "./controllers/ControllerCurso.php"; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<section id="banner" class="overflow-hidden pt-5 ">-->
<!--====== Map Area Start ======-->
<!-- <section class="section map-area">
    <?php include "./sections/section_area_map.php"; ?>
<!--</section> -->
<script src="assets/js/script_mensagens-inicio.js"></script>
<?php include "includes/footer.php"; ?>