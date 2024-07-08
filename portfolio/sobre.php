<?php include "includes/header.php"; ?>
<!-- ***** Breadcrumb Area Start ***** -->
<section class="section color-1 d-flex align-items-center ptb_150">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <h1 class="text-white  mt-5">Sobre min</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.html">Inicio</a></li>
                        <li class="breadcrumb-item text-white active">Sobre</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Breadcrumb Area End ***** -->
<!-- ***** About Area Start ***** -->
<section id="sobre" class="overflow-hidden pt-5 color-1 ptb_150">
    <?php include "./controllers/ControllerSobre.php"; ?>
</section>
<!-- ***** Promo Area Start ***** -->
<!-- ***** About Area End ***** -->
<script src="./assets/js/script-mensagens-sobre.js"></script>
<?php include "includes/footer.php"; ?>