<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<!-- ============================================================== -->
<!-- Adicionar serviço-->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Adicionar serviço:</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adicionar</a></li>
                                <li class="breadcrumb-item active">Serviço:</li>
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
                            $service_title = $_POST['service_title'];
                            $service_desc = $_POST['service_desc'];
                            $service_detail = $_POST['service_detail'];
                            $service_link = $_POST['service_link']; // Novo campo de link

                            // Agora você pode usar $service_link para criar o link no botão
                            $button_html = "<a class='service-btn mt-3 text-black' href='$service_link'>Learn More</a>";

                            if (strlen($service_title) < 5) {
                                $msg = $msg . "O título do serviço deve ter mais de 5 caracteres de comprimento.<BR>";
                                $status = "NOTOK";
                            }
                            if (strlen($service_desc) > 150) {
                                $msg = $msg . "A descrição resumida deve ter menos de 150 caracteres de comprimento.<BR>";
                                $status = "NOTOK";
                            }

                            if (strlen($service_detail) < 15) {
                                $msg = $msg . "O detalhe do serviço deve ter mais de 15 caracteres de comprimento.<BR>";
                                $status = "NOTOK";
                            }

                            $uploads_dir = 'uploads/services';
                            $tmp_name = $_FILES["ufile"]["tmp_name"];
                            $name = basename($_FILES["ufile"]["name"]);
                            $random_digit = rand(0000, 9999);
                            $new_file_name = $random_digit . $name;
                            move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

                            if ($status == "OK") {
                                $stmt = $con->prepare("INSERT INTO service (service_title, service_desc, service_detail, ufile, service_link) VALUES (?, ?, ?, ?, ?)");
                                $stmt->bindParam(1, $service_title);
                                $stmt->bindParam(2, $service_desc);
                                $stmt->bindParam(3, $service_detail);
                                $stmt->bindParam(4, $new_file_name);
                                $stmt->bindParam(5, $service_link); // Corrigido para service_link

                                if ($stmt->execute()) {
                                    // Se a inserção for bem-sucedida, exiba uma mensagem de sucesso.
                                    $errormsg = "
        <div class='alert alert-success alert-dismissible alert-outline fade show'>
            Serviço adicionado com sucesso!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
                                } else {
                                    // Se houver uma falha na inserção, exiba uma mensagem de erro.
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
                                                    <label for="firstnameInput" class="form-label"> Título do serviço:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="service_title">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Descrição serviço:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="service_desc" rows="2"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Detalhe do serviço:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="service_detail" rows="3"></textarea>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" id="firstnameInput" name="ufile">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="linkInput" class="form-label">Link do Serviço:</label>
                                                    <input type="text" class="form-control" id="linkInput" name="service_link">
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