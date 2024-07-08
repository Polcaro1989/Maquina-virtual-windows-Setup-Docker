<?php include "./includes/header.php"; ?>
<?php include "z_db.php"
?><!-- ***** Breadcrumb Area Start ***** -->
<!-- ***** Início da área de trilha de navegação ***** -->
<section class="section color-1 d-flex align-items-center ptb_100 ">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="breadcrumb-content text-center">
                    <h1 class="text-white  mb-3 mt-5">Contato</h1>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.html">Inicio</a></li>
                        <li class="breadcrumb-item text-white active">Contato</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Fim da área de localização atual ***** -->
<!--====== Contact Area Start ======-->
<section id="contact" class="contact-area ptb_100 color-1">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading text-center mb-3">
                    <h2 class="text-white"><?php print $contact_title ?></h2>
                    <p class="d-none d-sm-block mt-4 text-white"><?php print $contact_text ?></p>
                </div>
                <!-- Contact Us -->
                <div class="contact-us">
                    <ul>
                        <!-- Contact Info -->
                        <li class="contact-info color-1 bg-hover active hover-bottom text-center p-5 m-3">
                            <span><i class="fas fa-mobile-alt fa-3x"></i></span>
                            <a class="d-block my-2" href="tel:<?php print $phone1 ?>">
                                <h3><?php print $phone1 ?></h3>
                            </a>

                        </li>
                        <!-- Contact Info -->
                        <li class="contact-info color-3 bg-hover active hover-bottom text-center p-5 m-3">
                            <span><i class="fas fa-envelope-open-text fa-3x"></i></span>
                            <a class="d-none d-sm-block my-2 ml-n4" href="mailto:<?php print $email1 ?>">
                                <h3><?php print $email1 ?></h3>
                            </a>
                            <a class="d-block d-sm-none my-2 ml-n4" href="mailto:<?php print $email1 ?>">
                                <h3><?php print $email1 ?></h3>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-6 pt-4 pt-lg-0">
                <!-- Contact Box -->
                <div class="contact-box text-center">
                    <!-- Contact Form -->
                    <?php include "./controllers/ControllerContato.php" ?>

                    <form name="ContactForm" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Nome" required="required">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" name="emailaddres" placeholder="Email" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phonenumber" placeholder="Telefone" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Sujeito" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-bordered active btn-block mt-3" name="submit" value="send your message"><span class="text-white pr-3"><i class="fas fa-paper-plane"></i></span>Send Message</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-5">
    <div class="text-center mt-4">
        <div class="container-fluid p-0">
            <div id="bannerCarousel" class="carousel slide custom-carousel" data-bs-ride="carousel">
                <div class="carousel-inner mb-5">
                    <?php include "./controllers/ControllerBanner2.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<section class="section  color-1 ptb_150 " >
    <div class="container ptb_150">
        <div class="row">
            <!-- Coluna de Texto -->
            <div class="col-md-6">
                <div class="section-heading text-center m-0">
                    <h1 class="text-white"><?php print $enquiry_title; ?></h1>
                    <h3 class="text-white d-none d-sm-block mt-4"><?php print $enquiry_text; ?></h3>
                    <!-- <a href="contact mb-n5" class="btn btn-bordered-white">Contact Us</a> -->
                </div>
            </div>
            <!-- Coluna de Banner -->
            <div class="col-md-6 mt-5">
                <div class="text-center mt-4">
                    <div class="container-fluid p-0">
                        <div id="bannerCarousel" class="carousel slide custom-carousel" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php include "./controllers/ControllerBanner1.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Contact Area End ======-->
<!--====== Map Area End ======-->
<script src="assets/js/script-mensagem-contato.js"></script>
<?php include "includes/footer.php"; ?>