<?php include "./includes/header.php"; ?>
<section class="section color-1 d-flex align-items-center ptb_150">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breamcrumb Content -->
                <div class="breadcrumb-content text-center">
                    <h1 class="text-white  mb-3">Meus serviços</h1>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.html">Inicio</a></li>

                        <li class="breadcrumb-item text-white active">Serviços</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Service Area End ***** -->
<section id="service" class="section service-area ptb_150 color-1">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-10 col-lg-7">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2 class="text-black"><?php print $service_title ?></h2>
                    <p class="d-none d-sm-block mt-4 text-black"><?php print $service_text ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php include "./controllers/ControllerService.php"; ?>
        </div>
    </div>
</section>
<script src="assets/js/script-servico.js"></script>
<?php include "./includes/footer.php"; ?>