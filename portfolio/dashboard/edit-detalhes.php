<?php
include "header.php";
include "sidebar.php";

$todo = $_GET['id'];
$query = "SELECT * FROM why_us WHERE id=:id";
$stmt = $con->prepare($query);
$stmt->bindParam(':id', $todo, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$id = $row['id'];
$title = $row['title'];
$detail = $row['detail'];
$ufile = $row['ufile'];

$status = "OK"; // status inicial
$msg = "";
$errormsg = "";

if (isset($_POST['save'])) {
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
    } else {
        $status = "Error";
        $msg = "O título do quem somos está ausente.";
    }

    if (isset($_POST['detail'])) {
        $detail = $_POST['detail'];
    } else {
        $status = "Error";
        $msg = "O detalhe do quem somos está faltando.";
    }

    if (isset($_FILES['ufile']) && $_FILES['ufile']['error'] === UPLOAD_ERR_OK) {
        $uploads_dir = 'uploads/why';

        $tmp_name = $_FILES["ufile"]["tmp_name"];
        $name = basename($_FILES["ufile"]["name"]);
        $random_digit = rand(0000, 9999);
        $new_file_name = $random_digit . $name;

        move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");
    } else {
        $status = "Error";
        $msg = "Falha no upload do arquivo.";
    }

    if ($status == "OK") {
        $stmt = $con->prepare("UPDATE why_us SET title=?, detail=?, ufile=? WHERE id=?");
        $stmt->execute([$title, $detail, $new_file_name, $id]);

        if ($stmt->rowCount() > 0) {
            $errormsg = "
                <div class='alert alert-success alert-dismissible alert-outline fade show'>
                    Quem somos atualizado com sucesso!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        } else {
            $status = "Error";
            $msg = "Falha ao atualizar quem somos.";
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

// Resto do seu código HTML/PHP aqui
?>

<!-- Exiba as mensagens de erro ou sucesso -->
<?php
if ($errormsg != "") {
    echo $errormsg;
}
?>

<!-- Resto do seu código HTML/PHP aqui -->

<!-- ============================================================== -->
<!-- Editar quem somos-->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar quem somos:</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                                <li class="breadcrumb-item active">Quem somos</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row ">

                <!--end col-->
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
                                                    <label for="firstnameInput" class="form-label">Quem somos título:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="title" value="<?php print $title ?>" placeholder="Enter Portfolio Title">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Quem somos descrição:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="detail" rows="2"><?php print $detail ?></textarea>
                                                </div>
                                            </div>




                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" name="ufile">
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <!--end col-->
                                            <div class="col-lg-12">
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