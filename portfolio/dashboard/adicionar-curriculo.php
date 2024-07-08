<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<!-- ============================================================== -->
<!-- Adicionar currículo -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Adicionar currículo:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adicionar</a></li>
                                <li class="breadcrumb-item active">currículo</li>
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
                        if (isset($_POST['save'])) {
                            $nome = $_POST['nome'];
                            $pdf_curriculo = $_FILES['pdf_curriculo']['tmp_name'];

                           // var_dump($nome, $pdf_curriculo); // Debugging

                            $uploads_dir = 'uploads/curriculo';

                            // Verifica se a pasta de upload existe e cria-a se não existir
                            if (!file_exists($uploads_dir)) {
                                mkdir($uploads_dir, 0777, true);
                            }

                            // Move o currículo para o diretório de uploads com um novo nome
                            $random_digit = rand(0000, 9999);
                            $new_file_name = $random_digit . $_FILES['pdf_curriculo']['name'];
                            move_uploaded_file($pdf_curriculo, "$uploads_dir/$new_file_name");

                            //var_dump($new_file_name); // Debugging

                            // Insere os dados na tabela
                            $stmt = $con->prepare("INSERT INTO curriculos (nome, pdf_curriculo) VALUES (?, ?)");
                            $stmt->bindParam(1, $nome);
                            $stmt->bindParam(2, $new_file_name);

                            if ($stmt->execute()) {
                                $errormsg = "
                                <div class='alert alert-success alert-dismissible alert-outline fade show'>
                                    Currículo adicionado com sucesso!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
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
                                                    <label for="nome" class="form-label">Nome:</label>
                                                    <input type="text" class="form-control" id="nome" name="nome">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="pdf_curriculo" class="form-label">Adicionar currículo (PDF):</label>
                                                    <input type="file" class="form-control" id="pdf_curriculo" name="pdf_curriculo" accept=".pdf">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Adicionar Currículo</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
