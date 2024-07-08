<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "z_db.php"; ?>


<!-- ============================================================== -->
<!-- Adicionar portfólio-->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Adicionar Portfólio:</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">adicionar</a></li>
                                <li class="breadcrumb-item active">Portfólio</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
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
// Inicialização das variáveis
$status = "OK";
$msg = "";
$errormsg = "";

// Dados do formulário
$porti_title = $_POST['porti_title'] ?? '';
$porti_desc = $_POST['porti_desc'] ?? '';
$porti_detail = $_POST['porti_detail'] ?? '';
$ufile = $_POST['ufile'] ?? '';
$portfolio_link = $_POST['portfolio_link'] ?? '';

// Verificação dos campos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (strlen($porti_title) < 5) {
        $msg .= "O título do portfólio deve ter mais de 5 caracteres de comprimento.<br>";
        $status = "NOTOK";
    }
    if (strlen($porti_desc) > 150) {
        $msg .= "A descrição do portfólio deve ter menos de 150 caracteres de comprimento.<br>";
        $status = "NOTOK";
    }
    if (strlen($porti_detail) < 15) {
        $msg .= "O detalhe do portfólio deve ter mais de 15 caracteres de comprimento.<br>";
        $status = "NOTOK";
    }
    
    if (strlen($portfolio_link) < 15) {
        $msg .= "O link do portfólio deve ter mais de 15 caracteres de comprimento.<br>";
        $status = "NOTOK";
    }

    // Upload do arquivo
    $uploads_dir = 'uploads/portfolio';
    $tmp_name = $_FILES["ufile"]["tmp_name"];
    $name = basename($_FILES["ufile"]["name"]);
    $random_digit = rand(0000, 9999);
    $new_file_name = $random_digit . $name;
    if (!move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name")) {
        $msg .= "Falha ao fazer upload do arquivo.<br>";
        $status = "NOTOK";
    }

    // Inserção no banco de dados
    if ($status === "OK") {
        require_once("z_db.php"); // Inclua aqui o arquivo de configuração da conexão com o banco de dados

        $stmt = $con->prepare("INSERT INTO portfolio (porti_title, porti_desc, porti_detail, ufile, portfolio_link) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $porti_title);
        $stmt->bindParam(2, $porti_desc);
        $stmt->bindParam(3, $porti_detail);
        $stmt->bindParam(4, $new_file_name);
        $stmt->bindParam(5, $portfolio_link);
        

        if ($stmt->execute()) {
            $errormsg = "<div class='alert alert-success alert-dismissible alert-outline fade show'>
                            Portfólio adicionado com sucesso!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
        } else {
            $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                            Alguma falha técnica ocorreu. Tente novamente mais tarde ou peça ajuda ao administrador.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
        }
    }
}

// Exibição das mensagens de erro
if ($status !== "OK") {
    $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>$msg<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
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
                                                    <label for="firstnameInput" class="form-label"> Portfólio Título:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="porti_title">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Portifólio Descrição:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="porti_desc" rows="2"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Detalhes do portfólio:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="porti_detail" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="linkInput" class="form-label">Link do portfolio:</label>
                                                    <input type="text" class="form-control" id="linkInput" name="portfolio_link">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" id="firstnameInput" name="ufile">
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