<div class="container">
    <div class="row justify-content-between align-items-center bg-white rounded">
        <div class="col-12 col-lg-5">
            <!-- Section Heading -->
            <div class="section-heading text-center mb-3">
                <h2 class="text-black mt-5"><?php print $contact_title ?></h2>
                <p class="d-none d-sm-block mt-4 text-white"><?php print $contact_text ?></p>
            </div>
            <!-- Contact Us -->
            <div class="contact-us">
                <ul>
                    <!-- Contact Info -->
                    <li class="contact-info  bg-hover active hover-bottom text-center p-5 m-3 overlay-dark">
                        <span><i class="fas fa-mobile-alt fa-3x"></i></span>
                        <a class="d-block my-2 text-black" href="tel:<?php print $phone1 ?>">
                            <h3 class="text-black"><?php print $phone1 ?></h3>
                        </a>

                    </li>
                    <!-- Contact Info -->
                    <li class="contact-info color-3 bg-hover active hover-bottom text-center p-5 m-3 ">
                        <span><i class="fas fa-envelope-open-text fa-3x"></i></span>
                        <a class="d-none d-sm-block my-2 text-black" href="mailto:<?php print $email1 ?>">
                            <h3 class="text-black"><?php print $email1 ?></h3>
                        </a>
                        <a class="d-block d-sm-none my-2 " href="mailto:<?php print $email1 ?>">
                            <h3><?php print $email1 ?></h3>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-lg-6 pt-4 pt-lg-0">
            <!-- Contact Box -->
            <div class="contact-box text-center">
                <?php include "./controllers/ControllerContato.php"; ?>
                <form name="ContactForm" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nome" autocomplete="off"placeholder="Nome">
                                <div id="nameError" class="error-message"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="exe:(00)000000000">
                                <div id="phonenumberError" class="error-message"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="emailaddres" id="emailaddres" placeholder="Email">
                                <div id="emailError" class="error-message"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujeito">
                                <div id="subjectError" class="error-message"></div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" placeholder="Mensagem"></textarea>
                                    <div id="messageError" class="error-message"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-bordered active btn-block mt-3" value="send your message" name="submit"><span class="text-white pr-3"><i class="fas fa-paper-plane"></i></span>Enviar mensagem</button>
                        </div>
                    </div>
                </form>

                <script src="assets/js/validação-form.js"></script>

                <p class="form-message"></p>
            </div>
        </div>
    </div>
</div>