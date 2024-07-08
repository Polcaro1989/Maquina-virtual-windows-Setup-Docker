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
    $slide_title = $_POST['slide_title'];
    $slide_text = $_POST['slide_text'];

    $uploads_dir = 'uploads/slider';

    // Verifica o tipo de arquivo de vídeo
    if (isset($_FILES['ufile_video']) && !empty($_FILES['ufile_video']['name'])) {
        $file_type = $_FILES['ufile_video']['type'];
        if (strpos($file_type, 'video/') === 0) {
            // É um vídeo
            $tmp_name = $_FILES['ufile_video']['tmp_name'];
        }
    }

    if (!isset($tmp_name)) {
        // Tipo de arquivo não suportado
        $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
Tipo de arquivo não suportado. Apenas vídeos são permitidos.
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }

    if (!isset($errormsg)) {
        // Upload do arquivo de vídeo
        $name = basename($_FILES['ufile_video']['name']);
        $random_digit = rand(0000, 9999);
        $new_file_name = $random_digit . $name;
        move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

        // Insere os dados na tabela
        $stmt = $con->prepare("INSERT INTO slider (slide_title, slide_text, video_file) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $slide_title);
        $stmt->bindParam(2, $slide_text);
        $stmt->bindParam(3, $new_file_name);

        // Obtenha a extensão do arquivo
        $file_extension = pathinfo($name, PATHINFO_EXTENSION);

        // Verifique se a extensão está em uma lista de extensões permitidas (adicionar todas as extensões desejadas)
        $allowed_extensions = array('mp4', 'avi', 'mov', );

        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
            // Tipo de arquivo não suportado
                    $errormsg = "
        <div class='alert alert-danger alert-dismissible alert-outline fade show'>
        Tipo de arquivo não suportado. Apenas vídeos são permitidos.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
                }

                if ($stmt->execute()) {
                    $errormsg = "
        <div class='alert alert-success alert-dismissible alert-outline fade show'>
        Slide de vídeo adicionado com sucesso!
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
                <label for="slide_title" class="form-label">Slide Título:</label>
                <input type="text" class="form-control" id="slide_title" name="slide_title">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="slide_text" class="form-label">Slide Texto:</label>
                <input type="text" class="form-control" id="slide_text" name="slide_text">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="ufile_video" class="form-label">Adicionar vídeo:</label>
                <input type="file" class="form-control" id="ufile_video" name="ufile_video" accept="video/*">
            </div>
        </div>

        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="submit" name="save" class="btn btn-primary">Adicionar Vídeo</button>
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