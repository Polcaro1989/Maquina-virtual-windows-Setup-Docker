<?php
include "header.php";
include "sidebar.php";

$status = "OK"; // initial status
$msg = "";
$errormsg = "";

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $detail = $_POST['detail'];

    if (strlen($title) < 5) {
        $msg .= "O título do quem somos deve ter mais de 5 caracteres de comprimento.<br>";
        $status = "NOTOK";
    }
    if (strlen($detail) < 50) {
        $msg .= "O detalhe do quem somos deve ter mais de 50 caracteres de comprimento.<br>";
        $status = "NOTOK";
    }

    $uploads_dir = 'uploads/why';

    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }

    if (isset($_FILES["ufile"]) && $_FILES["ufile"]["error"] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["ufile"]["tmp_name"];
        $name = basename($_FILES["ufile"]["name"]);
        $random_digit = rand(0000, 9999);
        $new_file_name = $random_digit . $name;

        if (move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name")) {
            $stmt = $con->prepare("INSERT INTO why_us (title, detail, ufile) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $title);
            $stmt->bindParam(2, $detail);
            $stmt->bindParam(3, $new_file_name);

            if ($stmt->execute()) {
                $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
Quem somos foi adicionado com sucesso!
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
            } else {
                $status = "Error";
                $msg = "Falha ao adicionar quem somos.";
            }
        } else {
            $status = "Error";
            $msg = "Falha ao mover o arquivo enviado.";
        }
    } else {
        $status = "Error";
        $msg = "Falha no upload do arquivo.";
    }
}

if ($status !== "OK") {
    $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
" . $msg . "
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}

?>
<!-- ============================================================== -->
<!-- Adiciona porque nos escolher -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Quem somos:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adicionar</a></li>
                                <li class="breadcrumb-item active">Quem somos:</li>
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

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="titleInput" class="form-label">Título:</label>
                                                    <input type="text" class="form-control" id="titleInput" name="title" autocapitalize="on">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="detailInput" class="form-label">Detalhes:</label>
                                                    <textarea class="form-control" id="detailInput" name="detail" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" id="firstnameInput" name="ufile">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Adicionar</button>
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
</div>
<!-- End Page-content -->
<?php include "footer.php"; ?>