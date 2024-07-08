<?php include "z_db.php"; ?>
<!--====== Footer Area Start ======-->

<section><div class="tf__brand mt_120 xs_mt_80">
        <div class="row">
            <div class="col-12">
                <div class="marquee_animi"><div style="width: 100000px; transform: translateX(0px); animation: 24.62s linear 0s infinite normal none running marqueeAnimation-51759460;" class="js-marquee-wrapper"><div class="js-marquee" style="margin-right: 0px; float: left;">
                    <ul>
                        <li>* Html</li>
                        <li>* Css</li>
                        <li>* Javascript</li>
                        <li>* Php</li>
                        <li>* Laravel</li>
                    
                    </ul>
                </div><div class="js-marquee" style="margin-right: 0px; float: left;">
                    <ul>
                        <li>* Scrum</li>
                        <li>* Github</li>
                        <li>* Jira</li>
                        <li>* wordpress</li>
                        <li>* Codeinigther</li>
                    

                    </ul>
                </div></div></div>
            </div>
        </div>
    </div>
</div></section>
<footer class="section footer-area ">
    <div class="footer-top ptb_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="footer-items">
                        <h3 class="footer-title text-uppercase mb-2">About Us</h3>
                        <p class="mb-2"><?php print $site_about ?></p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="footer-items">
                        <h3 class="footer-title text-uppercase mb-2">Services</h3>
                        <ul>
                            <?php include "./controllers/ControllerServiceFooter.php"; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="footer-items">
                        <h3 class="footer-title text-uppercase mb-2">Follow Us</h3>
                        <p class="mb-2"><?php print $follow_text ?></p>
                        <ul class="social-icons list-inline pt-2">
                            <?php include "./controllers/ControllerSocialFooter.php"; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./controllers/ControllerConfigFooter.php"; ?>
    <!-- Footer Bottom -->
    <div class="footer-bottom bg-white ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copyright Area -->
                    <div class="copyright-area d-flex flex-wrap justify-content-center justify-content-sm-between text-center py-4">
                        <div class="copyright-left text-black"><?php print $site_footer ?></div>
                        <div class="copyright-right text-black">Made with <i class="fas fa-heart"></i> By <a href="https://facebook.com/hillsoftsnetwork">Hillsofts</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--====== Modal Responsive Menu Area Start ======-->
<div id="menu" class="modal fade p-0">
    <div class="modal-dialog dialog-animated">
        <div class="modal-content h-100">
            <div class="modal-header" data-dismiss="modal">
                Menu <i class="far fa-times-circle icon-close"></i>
            </div>
            <div class="menu modal-body">
                <div class="row w-100">
                    <div class="items p-0 col-12 text-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- ***** All jQuery Plugins ***** -->
<script src="assets/js/jquery/jquery-3.5.1.min.js"></script>

<!-- Bootstrap js -->
<script src="assets/js/bootstrap/popper.min.js"></script>
<script src="assets/js/bootstrap/bootstrap.min.js"></script>

<!-- Plugins js -->
<script src="assets/js/plugins/plugins.min.js"></script>

<!-- Active js -->
<script src="assets/js/active.js"></script>

<!-- Toastfy js -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<!--Chat app-->

<script src="assets/js/chat.js"></script>
<script src="assets/js/script_animacao.js"></script>
<script src="assets/js/core.js"></script>
</body>

</html>