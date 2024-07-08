<?php include "./includes/header.php";?>
<?php include "./config/TodoMsqli_real.php";?>

<!-- ***** Breadcrumb Area Start ***** -->
<section class="section breadcrumb-area overlay-dark d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <h2 class="text-white text-uppercase mb-3">Service Details</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.html">Home</a></li>

                        <li class="breadcrumb-item text-white active">Service</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "./controllers/ControllerServiceDetail.php";?>
<!-- ***** About Area Start ***** -->
<section class="section about-area ptb_100">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-lg-6">
                <!-- About Thumb -->
                <div class="about-thumb text-center">
                    <img src="./dashboard/uploads/services/<?php print $ufile; ?>" alt="img">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="about-content section-heading text-center text-lg-left pl-md-4 mt-5 mt-lg-0 mb-0">
                    <h2 class="mb-3"><?php print $service_title ?></h2>
                    <p><?php print $service_detail; ?></p>
                    <p><?php print $service_link; ?></p>

                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Contact Area Start ======-->

<!--====== Call To Action Area Start ======-->

<?php include "includes/footer.php"; ?>