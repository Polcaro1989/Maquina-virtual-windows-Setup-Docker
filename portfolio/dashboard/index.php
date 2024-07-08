<?php
include "header.php";
include "z_db.php"; 

$tables = [
    'static',
    'service',
    'portfolio',
    'blog',
    'slider',
    'testimony',
    'why_us',
    'admin',
    'banner',
    'sobre',
    'social',
    'admin',
    'curriculos'

];

$numrows = [];

foreach ($tables as $table) {
    $stmt = $con->query("SELECT COUNT(*) AS total FROM $table");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $numrows[$table] = (int)$row['total'];
}

include "sidebar.php";
?>


<!-- ============================================================== -->
<!-- Dashboard-->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5 mt-5">
                    <div class=" page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Admin D&L Construtora:</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">D&L Construtora</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 class="fs-16 mb-1">Olá, <?php print $username; ?>!</h4>
                                        <p class="text-muted mb-0">Bem-vindo ao painel administrativo D&L construtora.</p>
                                    </div>
                                    <div class="mt-3 mt-lg-0">
                                        <form action="javascript:void(0);">

                                        </form>
                                    </div>
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row h-100">
                            <!--<div class="col-lg-4 col-md-6">-->
                            <!--    <div class="card">-->
                            <!--        <div class="card-body">-->
                            <!--            <div class="d-flex align-items-center">-->
                            <!--                <div class="avatar-sm flex-shrink-0">-->
                            <!--                    <a href="pagina-inicial.php" class="avatar-title bg-warning text-primary rounded-circle fs-3">-->
                            <!--                        <i class="ri-git-merge-fill avatar"></i>-->
                            <!--                    </a>-->
                            <!--                </div>-->
                            <!--                <div class="flex-grow-1 ms-3">-->


                            <!--                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Página inicial</p>-->
                            <!--                    <h4 class="mb-0"><span class="counter-value" data-target="<?php print $numrows; ?>"></span></h4>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div><!-- end card body -->
                            <!--    </div><!-- end card -->
                            <!--</div><!-- end col -->

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <a href="servicos-listar.php" class="avatar-title bg-primary text-primary rounded-circle fs-3">
                                                    <i class="ri-git-merge-fill avatar"></i>
                                                </a>
                                            </div>
                                            <div class="flex-grow-1 ms-3">


                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total de serviços</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $numrows['service']; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <a href="portfolio-listar.php" class="avatar-title bg-dark text-primary rounded-circle fs-3">
                                                    <i class="ri-server-line avatar"></i>
                                                </a>
                                            </div>
                                            <div class="flex-grow-1 ms-3">

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Portfólio</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $numrows['portfolio']; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <a href="blog-listar.php" class="avatar-title bg-danger text-primary rounded-circle fs-3">
                                                    <i class="ri-pages-line avatar"></i>
                                                </a>
                                            </div>
                                            <div class="flex-grow-1 ms-3">

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Blog</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $numrows['blog']; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->


                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <a href="banner-listar.php" class="avatar-title bg-success text-primary rounded-circle fs-3">
                                                    <i class="ri-pages-line avatar"></i>
                                                </a>
                                            </div>
                                            <div class="flex-grow-1 ms-3">

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total banner</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $numrows['banner']; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <a href="testemunha-listar.php" class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-pages-line avatar"></i>
                                                </a>
                                            </div>
                                            <div class="flex-grow-1 ms-3">

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total testemunhas</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $numrows['testimony']; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <a href="quem-somos-listar.php" class="avatar-title bg-white text-primary rounded-circle fs-3">
                                                    <i class="ri-pages-line avatar"></i>
                                                </a>
                                            </div>
                                            <div class="flex-grow-1 ms-3">

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Quem somos</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $numrows['sobre']; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <a href="rede-social-listar.php" class="avatar-title bg-secondary text-primary rounded-circle fs-3">
                                                    <i class="ri-pages-line avatar"></i>
                                                </a>
                                            </div>
                                            <div class="flex-grow-1 ms-3">

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Redes sociais</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $numrows['social']; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <a href="usuario-listar.php" class="avatar-title bg-info text-primary rounded-circle fs-3">
                                                    <i class="ri-pages-line avatar"></i>
                                                </a>
                                            </div>
                                            <div class="flex-grow-1 ms-3">

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Usuarios</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $numrows['admin']; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <a href="curriculo-listar.php" class="avatar-title bg-info text-primary rounded-circle fs-3">
                                                    <i class="ri-pages-line avatar"></i>
                                                </a>
                                            </div>
                                            <div class="flex-grow-1 ms-3">

                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Curriculo</p>
                                                <h4 class=" mb-0"><span class="counter-value" data-target="<?php echo $numrows['curriculos']; ?>"></span></h4>
                                            </div>

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                        </div> <!-- end .h-100-->

                    </div> <!-- end col -->


                </div>

            </div>
            <!-- container-fluid -->
        </div>

    </div>
</div>
<br><br></br>
<!-- End Page-content -->
<?php include "footer.php"; ?>