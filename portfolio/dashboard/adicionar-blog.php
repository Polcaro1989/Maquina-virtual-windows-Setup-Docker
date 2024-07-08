<?php

include "header.php";
include "sidebar.php";


$status = "OK";
$msg = "";
$errormsg = "";

if (isset($_POST['save'])) {
    $blog_title = $_POST['blog_title'];
    $blog_desc = $_POST['blog_desc'];
    $blog_detail = $_POST['blog_detail'];

    if (strlen($blog_title) < 5) {
        $msg .= "O título do blog deve ter mais de 5 caracteres.<br>";
        $status = "NOTOK";
    }
    if (strlen($blog_desc) > 500) {
        $msg .= "A descrição resumida deve ter menos de 150 caracteres de comprimento.<br>";
        $status = "NOTOK";
    }
    if (strlen($blog_detail) < 15) {
        $msg .= "Os detalhes do blog devem ter mais de 15 caracteres de comprimento.<br>";
        $status = "NOTOK";
    }

    $uploads_dir = 'uploads/blog';
    $tmp_name = $_FILES["ufile"]["tmp_name"];
    $name = basename($_FILES["ufile"]["name"]);
    $random_digit = rand(0000, 9999);
    $new_file_name = $random_digit . $name;
    move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

    if ($status == "OK") {
        $stmt = $con->prepare("INSERT INTO blog (blog_title, blog_desc, blog_detail, ufile) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $blog_title);
        $stmt->bindParam(2, $blog_desc);
        $stmt->bindParam(3, $blog_detail);
        $stmt->bindParam(4, $new_file_name);

        if ($stmt->execute()) {
            $errormsg = "
            <div class='alert alert-success alert-dismissible alert-outline fade show'>
                Blog adicionado com sucesso!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            $errormsg = "
            <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                Alguma falha técnica ocorreu. Tente novamente mais tarde ou peça ajuda ao administrador.
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
            Alguma falha técnica ocorreu. Tente novamente mais tarde ou peça ajuda ao administrador.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
}
?>


?>

<!-- ============================================================== -->
<!--Adicionar blog-->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Adicionar blog:</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adicionar</a></li>
                                <li class="breadcrumb-item active">Blog</li>
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
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Título do blog:</label>
                                                    <input type="text" class="form-control" name="blog_title">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Descrição do blog:</label>
                                                    <textarea class="form-control" name="blog_desc" rows="2"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Detalhes do blog:</label>
                                                    <textarea class="form-control" name="blog_detail" rows="3"></textarea>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" name="ufile">
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