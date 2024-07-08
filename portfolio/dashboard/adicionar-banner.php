<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<!-- ============================================================== -->
<!-- Adicionar slide -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Adicionar slide:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adicionar</a></li>
                                <li class="breadcrumb-item active">Slide</li>
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
                            $banner_title = $_POST['banner_title'];
                            $banner_text = $_POST['banner_text'];
                            $ufile = $_POST['ufile'];

                            var_dump($banner_title, $banner_text, $ufile); // Debugging

                            $uploads_dir = 'uploads/banner';

                            // Verifica se a pasta de upload existe e cria-a se não existir
                            if (!file_exists($uploads_dir)) {
                                mkdir($uploads_dir, 0777, true);
                            }

                            // Verifica o tipo de arquivo de imagem
                            if (isset($_FILES['ufile']) && !empty($_FILES['ufile']['name'])) {
                                $file_type = $_FILES['ufile']['type'];
                                if (strpos($file_type, 'image/') === 0) {
                                    // É uma imagem
                                    $tmp_name = $_FILES['ufile']['tmp_name'];

                                    // Gerar um novo nome de arquivo
                                    $name = basename($_FILES['ufile']['name']);
                                    $random_digit = rand(0000, 9999);
                                    $new_file_name = $random_digit . $name;

                                    // Mova o arquivo carregado para o diretório de uploads com o novo nome
                                    move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

                                    var_dump($new_file_name); // Debugging

                                    // Insere os dados na tabela
                                    $stmt = $con->prepare("INSERT INTO banner (banner_title, banner_text, ufile) VALUES (?, ?, ?)");
                                    $stmt->bindParam(1, $banner_title);
                                    $stmt->bindParam(2, $banner_text);
                                    $stmt->bindParam(3, $new_file_name);

                                    if ($stmt->execute()) {
                                        $errormsg = "
                                    <div class='alert alert-success alert-dismissible alert-outline fade show'>
                                        Banner adicionado com sucesso!
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                    } else {
                                        $errormsg = "
                                    <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                        Alguma falha técnica está lá. Tente novamente mais tarde ou peça ajuda ao administrador.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                    }
                                } else {
                                    $errormsg = "
                                <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                    Tipo de arquivo não suportado. Apenas imagens são permitidas.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                                }
                            } else {
                                // Handle the case when no file is uploaded
                                $errormsg = "
                            <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                Nenhum arquivo de imagem foi carregado.
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
                                                    <label for="banner_title" class="form-label">Banner Título:</label>
                                                    <input type="text" class="form-control" id="banner_title" name="banner_title">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="banner_text" class="form-label">Banner Texto:</label>
                                                    <input type="text" class="form-control" id="banner_text" name="banner_text">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="ufile" class="form-label">Adicionar imagem:</label>
                                                    <input type="file" class="form-control" id="ufile" name="ufile" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Adicionar Banner</button>
                                                </div>
                                            </div>
                                        </div>
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