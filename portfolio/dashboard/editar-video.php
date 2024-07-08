<?php
include "z_db.php"; // Inclua o arquivo de conexão com o banco de dados

include "header.php";
include "sidebar.php";

$slide_title = '';
$slide_text = '';

$todo = $_GET['id'];
$query = "SELECT * FROM slider WHERE id = :id";
$stmt = $con->prepare($query);
$stmt->bindParam(':id', $todo);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $id = $row['id'];
    $slide_title = $row['slide_title'];
    $slide_text = $row['slide_text'];
    $video_file = $row['video_file'];

    $status = "OK";
    $msg = "";
    $errormsg = "";

    if (isset($_POST['save'])) {
        if (isset($_POST['slide_title'])) {
            $slide_title = $_POST['slide_title'];
        } else {
            $status = "Error";
            $msg = "O título do slide está ausente.";
        }

        if (isset($_POST['slide_text'])) {
            $slide_text = $_POST['slide_text'];
        } else {
            $status = "Error";
            $msg = "O detalhe do slide está ausente.";
        }

        if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] === UPLOAD_ERR_OK) {
            $uploads_dir = 'uploads/slider';

            $tmp_name = $_FILES["video_file"]["tmp_name"];
            $name = basename($_FILES["video_file"]["name"]);
            $random_digit = rand(0000, 9999);
            $new_file_name = $random_digit . $name;

            move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");
        } else {
            $status = "Error";
            $msg = "Falha no upload do arquivo.";
        }

        if ($status == "OK") {
            $query = "UPDATE slider SET slide_title = :slide_title, slide_text = :slide_text, video_file = :video_file WHERE id = :id";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':slide_title', $slide_title);
            $stmt->bindParam(':slide_text', $slide_text);
            $stmt->bindParam(':video_file', $new_file_name);
            $stmt->bindParam(':id', $todo);
            $qb = $stmt->execute();

            if ($qb) {
                $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
    Video editado com sucesso!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
            } else {
                $status = "Error";
                $msg = "Falha ao editar o slide!";
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

<!-- ============================================================== -->
<!-- Editar slide-->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar slide:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listar</a></li>
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
                                        <i class="fas fa-home"></i>Editar
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
                                                    <label for="firstnameInput" class="form-label">Slide título:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="slide_title" value="<?php print $slide_title ?>" placeholder="Enter Portfolio Title">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Slide descrição:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="slide_text"><?php print $slide_text ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" id="firstnameInput" name="video_file">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class=" col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Atualizar</button>

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