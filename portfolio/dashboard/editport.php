<?php
include "header.php";
error_reporting(10);
ini_set('display_errors', true);
include "sidebar.php";
include "z_db.php"; 

$errormsg = "";

$porti_title = "";
$porti_desc = "";
$porti_detail = "";
$portfolio_link = "";

$uploads_dir = 'uploads/portfolio';

if (isset($_GET['id'])) {
    $todo = $_GET['id'];
    $todo = htmlspecialchars($todo);

    $status = "OK";
    $msg = "";

    try {
        $query = "SELECT * FROM portfolio WHERE id = :todo";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':todo', $todo);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $id = $row['id'];
            $porti_title = $row['porti_title'];
            $porti_desc = $row['porti_desc'];
            $porti_detail = $row['porti_detail'];
            $portfolio_link = $row['portfolio_link'];

        }

        if (isset($_POST['save'])) {
            $porti_title = $_POST['porti_title'];
            $porti_desc = $_POST['porti_desc'];
            $porti_detail = $_POST['porti_detail'];
            $portfolio_link = $_POST['portfolio_link'];

            $tmp_name = $_FILES["ufile"]["tmp_name"];
            $name = basename($_FILES["ufile"]["name"]);
            $random_digit = rand(0000, 9999);
            $new_file_name = $random_digit . $name;
            $target_path = "$uploads_dir/$new_file_name";

            move_uploaded_file($tmp_name, $target_path);

            if ($status == "OK") {
                $query = "UPDATE portfolio SET porti_title = :porti_title, porti_desc = :porti_desc, porti_detail = :porti_detail, portfolio_link = :portfolio_link, ufile = :new_file_name WHERE id = :todo";
                $stmt = $con->prepare($query);
                $stmt->bindParam(':porti_title', $porti_title);
                $stmt->bindParam(':porti_desc', $porti_desc);
                $stmt->bindParam(':porti_detail', $porti_detail);
                $stmt->bindParam(':portfolio_link', $portfolio_link);
                $stmt->bindParam(':new_file_name', $new_file_name);
                $stmt->bindParam(':todo', $todo);
                $stmt->execute();

                $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
    Portfólio atualizado com sucesso!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
            }
        } elseif ($status !== "OK") {
            $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
    " . $msg . " 
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
        } else {
            $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
    Alguma falha técnica ocorreu. Tente novamente mais tarde ou peça ajuda ao administrador.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
        }
    } catch (PDOException $e) {
        $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
    Erro de conexão: " . $e->getMessage() . "
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
}
?>

<!-- ============================================================== -->
<!-- Editar serviço -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar portfólio:</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                                <li class="breadcrumb-item active">Portfólio</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="false">
                                        <i class="fas fa-home"></i> Editar:
                                    </a>
                                </li>
                            </ul>
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
                                                    <label for="serviceTitleInput" class="form-label">Serviço Título:</label>
                                                    <input type="text" class="form-control" id="serviceTitleInput" name="porti_title" value="<?php echo htmlspecialchars($porti_title); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="serviceDescTextarea" class="form-label">Serviço descrição:</label>
                                                    <textarea class="form-control" id="serviceDescTextarea" name="porti_desc" rows="2"><?php echo htmlspecialchars($porti_desc); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="serviceDetailTextarea" class="form-label">Serviço detalhes:</label>
                                                    <textarea class="form-control" id="serviceDetailTextarea" name="porti_detail" rows="3"><?php echo htmlspecialchars($porti_detail); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="linkInput" class="form-label">Link do portfolio:</label>
                                                    <input type="text" class="form-control" id="linkInput" name="portfolio_link" value="<?php echo htmlspecialchars($portfolio_link); ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="fileInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" id="fileInput" name="ufile">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Atualizar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page-content -->

<?php include "footer.php"; ?>