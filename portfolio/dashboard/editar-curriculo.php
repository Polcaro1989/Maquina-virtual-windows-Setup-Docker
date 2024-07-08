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

                        $dbHost = 'localhost';
                        $dbName = 'vogue2';
                        $dbUser = 'root';
                        $dbPass = '';

                        try {
                            $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $e) {
                            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
                        }

                        $nome = '';
                        $pdf_curriculo = '';

                        $curriculumId = $_GET['id']; // Obtém o ID do currículo a ser editado

                        $query = "SELECT * FROM curriculos WHERE id = :id";
                        $stmt = $pdo->prepare($query);
                        $stmt->bindParam(':id', $curriculumId);
                        $stmt->execute();

                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        if ($row) {
                            $curriculumId = $row['id'];
                            $nome = $row['nome'];
                            $pdf_curriculo = $row['pdf_curriculo'];

                            $status = "OK";
                            $msg = "";
                            $errormsg = "";

                            if (isset($_POST['save'])) {
                                if (isset($_POST['nome'])) {
                                    $nome = $_POST['nome'];
                                } else {
                                    $status = "Error";
                                    $msg = "O nome do currículo está ausente.";
                                }

                                if (isset($_FILES['pdf_curriculo']) && $_FILES['pdf_curriculo']['error'] === UPLOAD_ERR_OK) {
                                    $uploads_dir = 'uploads/curriculos';

                                    $tmp_name = $_FILES["pdf_curriculo"]["tmp_name"];
                                    $name = basename($_FILES["pdf_curriculo"]["name"]);
                                    $random_digit = rand(0000, 9999);
                                    $new_file_name = $random_digit . $name;

                                    move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");
                                } else {
                                    $status = "Error";
                                    $msg = "Falha no upload do arquivo.";
                                }

                                if ($status == "OK") {
                                    $query = "UPDATE curriculos SET nome = :nome, pdf_curriculo = :pdf_curriculo WHERE id = :id";
                                    $stmt = $pdo->prepare($query);
                                    $stmt->bindParam(':nome', $nome);
                                    $stmt->bindParam(':pdf_curriculo', $new_file_name);
                                    $stmt->bindParam(':id', $curriculumId);
                                    $qb = $stmt->execute();

                                    if ($qb) {
                                        $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
    Currículo editado com sucesso!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
                                    } else {
                                        $status = "Error";
                                        $msg = "Falha ao editar o currículo!";
                                    }
                                }

                                if ($status !== "OK") {
                                    $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
    " . $msg . "
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
                                }
                            }
                        }
                        ?>

                        <!-- Aqui você pode continuar com o seu HTML, usando as variáveis $nome e $pdf_curriculo para exibir os dados do currículo. -->

                        <div class="col-12 col-md-7">
                            <div class="welcome-intro">
                                <!-- Inclua aqui a exibição dos dados do currículo -->
                                <h1 class="text-white mt-5"><?php print $nome ?></h1>
                                <div class="button-group text-center">
                                    <a class='service-btn mt-3 text-white' href='contato.php'>
                                        <i class="fas fa-envelope"></i> Contato
                                    </a>
                                    <a class='service-btn mt-3 text-white' href='download.php?filename=<?php echo $pdf_curriculo; ?>'>
                                        <i class="fas fa-download"></i> Baixar Currículo
                                    </a>
                                </div>
                            </div>
                        </div>
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
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>