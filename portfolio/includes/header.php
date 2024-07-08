<?php include "z_db.php"; ?>
<!doctype html>
<html class="no-js" lang="en">
<?php include "./controllers/ControllerSection_title.php"; ?>
<?php include "./controllers/ControllerSiteContato.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Themeland">
    <?php include "./controllers/ControllerSiteConfig.php"; ?>

    <title>Portfólio - <?php print $site_title ?></title>
    <?php include "./controllers/ControllerFavicon.php"; ?>

    <link rel="icon" type="image/png" href="dashboard/uploads/logo/<?php echo $xfile; ?>">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/style_animacao.css">
    <link rel="stylesheet" href="assets/css/scroll.down.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    var title = document.getElementById('stitle');

    // Inclua o valor obtido do banco de dados aqui
    var stitle = "<?php echo $stitle ?>";

    var typewriter = new Typewriter(title, {
        loop: true,
        delay: 75 // Ajuste o atraso (em milissegundos) entre cada caractere
    });

    typewriter.typeString(stitle)
        .pauseFor(2000) // Espera por 2 segundos
        .deleteAll()
        .typeString("<h2 style='color: white;'>Prazer Abraão Polcaro!</h2>")
        .pauseFor(2000) // Espera por 2 segundos
        .deleteAll()
        .typeString("<h2 style='color: white;'>Analista de Sistemas..</h2>")
        .pauseFor(2000) // Espera por 2 segundos
        .deleteAll()
        .typeString(stitle) // Exibe o primeiro texto novamente
        .pauseFor(2000) // Espera por 2 segundos antes de recomeçar
        .typeString("<h2 style='color: white;'>Desenvolvedor Php!</h2>")
        .pauseFor(2000) // Espera por 2 segundos
        .deleteAll()
        .start();

    // Aplicar estilos temporários ao elemento de digitação
    typewriter.on('start', function () {
        title.style.position = 'relative';
    });

    typewriter.on('stop', function () {
        title.style.position = 'static';
    });
});


</script>
<style></style>
</head>

<body>
    <!--====== Preloader Area Start ======-->
    <div id="preloader">
        <div id="digimax-preloader" class="digimax-preloader">
            <div class="preloader-animation">
                <div class="spinner"></div>
                <div class="loader">
                    <span data-text-preloader="P" class="animated-letters">P</span>
                    <span data-text-preloader="O" class="animated-letters">O</span>
                    <span data-text-preloader="r" class="animated-letters">r</span>
                    <span data-text-preloader="t" class="animated-letters">t</span>
                    <span data-text-preloader="f" class="animated-letters">f</span>
                    <span data-text-preloader="ó" class="animated-letters">ó</span>
                    <span data-text-preloader="l" class="animated-letters">l</span>
                    <span data-text-preloader="i" class="animated-letters">i</span>
                    <span data-text-preloader="o" class="animated-letters">o</span>

                </div>
                <p class="fw-5 text-center text-uppercase">Carregando</p>
            </div>
            <div class="loader-animation">
                <div class="row h-100">
                    <div class="col-3 single-loader p-0">
                        <div class="loader-bg"></div>
                    </div>
                    <div class="col-3 single-loader p-0">
                        <div class="loader-bg"></div>
                    </div>
                    <div class="col-3 single-loader p-0">
                        <div class="loader-bg"></div>
                    </div>
                    <div class="col-3 single-loader p-0">
                        <div class="loader-bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== Scroll To Top Area Start ======-->
    <div id="scrollUp" title="Scroll To Top">
        <i class="fas fa-arrow-up"></i>
    </div>
    <div class="main overflow-hidden">
        <header id="header">
            <nav data-aos="zoom-out" data-aos-delay="800" class="navbar navbar-expand">
                <div class="container header">
                    <?php include "./controllers/ControllerLogo.php"; ?>
                    <a id="logo" class="navbar-brand" href="index.html">
                    <img class="navbar-brand-regular" src="./dashboard/uploads/logo/<?php echo $ufile; ?>" alt="brand-logo" width="250px">
                        <img class="navbar-brand-sticky " src="./dashboard/uploads/logo/<?php echo $ux_file; ?>" alt="" width="250px">
                    </a>
                    <div class="ml-auto"></div>
                    <ul class="navbar-nav items">
                        <li class="nav-item">
                            <a class="nav-link" href="inicio">Início </a>
                        </li>
                        <li class="nav-item">
                            <a href="sobre" class="nav-link">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a href="cursos" class="nav-link">Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a href="portfolio" class="nav-link">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a href="contato" class="nav-link">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a href="servicos" class="nav-link">Serviços</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/vogue/index.php" class="nav-link"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/vogue/email/admin/" class="nav-link"><i class="fas fa-envelope-open"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav icons">
                        <?php include "./controllers/ControllerRedeSocial.php"; ?>
                    </ul>

                    <ul class="navbar-nav toggle">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
                                <i class="fas fa-bars toggle-icon m-0"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
    <!-- ***** Header End ***** -->