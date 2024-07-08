<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<!-- ============================================================== -->
<!-- Adicionar rede social -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Adiciona</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adicionar</a></li>
                                <li class="breadcrumb-item active">Rede social</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="false">
                                        <i class="fas fa-home"></i> Adicionar:
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?php
                        $status = "OK"; //initial status
                        $msg = "";
                        $errormsg = "";

                        if (isset($_POST['save'])) {
                            $name = $_POST['name'];
                            $fa = $_POST['fa'];
                            $social_link = $_POST['social_link'];

                            if (strlen($name) < 2) {
                                $msg .= "O nome da rede social deve conter um caractere.<br>";
                                $status = "NOTOK";
                            }
                            if (strlen($fa) < 1) {
                                $msg .= "A fonte Awesome deve ter pelo menos 2 caracteres.<br>";
                                $status = "NOTOK";
                            }
                            if (strlen($social_link) < 5) {
                                $msg .= "O link social deve ter mais de 6 caracteres de comprimento.<br>";
                                $status = "NOTOK";
                            }

                            if ($status == "OK") {
                                $stmt = $con->prepare("INSERT INTO social (name, fa, social_link) VALUES (?, ?, ?)");
                                $stmt->bindParam(1, $name);
                                $stmt->bindParam(2, $fa);
                                $stmt->bindParam(3, $social_link);

                                if ($stmt->execute()) {
                                    $errormsg = "
                    <div class='alert alert-success alert-dismissible alert-outline fade show'>
                        O link social foi adicionado com sucesso.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                                } else {
                                    $errormsg = "
                    <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                        Alguma falha técnica está lá. Tente novamente mais tarde ou peça ajuda ao administrador.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                                }
                            } elseif ($status !== "OK") {
                                $errormsg = "
                    <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                        " . $msg . " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                            } else {
                                $errormsg = "
                    <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                        Alguma falha técnica está lá. Tente novamente mais tarde ou peça ajuda ao administrador.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                            }
                        }

                        ?>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        print $errormsg;
                                    }
                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Rede social</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="name" placeholder="Nome">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Código Social Fontawesome</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="fa" placeholder="fa-envelop-o">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Link rede social</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="social_link" placeholder="https://facebook.com/hillsoftsnetwork/">
                                                </div>
                                            </div>

                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Adicionar</button>

                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->

                                <!--end tab-pane-->

                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php include "footer.php"; ?>