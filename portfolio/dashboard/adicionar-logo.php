<?php
include "header.php"; ?>
<?php include "sidebar.php"; ?>
<!-- ============================================================== -->
<!-- Atualizar logo -->
<!-- ============================================================== -->
<?php
    if (isset($_POST['save'])) {
        $uploads_dir = 'uploads/logo';
    
        if (isset($_FILES["xfile"], $_FILES["ufile_x"], $_FILES["ux_file"], $_FILES["ufile"])) {
            function moveFile($file, $newFileName, $uploadsDir)
            {
                $tmpName = $file["tmp_name"];
                $name = basename($file["name"]);
                $randomDigit = rand(0000, 9999);
                $newFile = $randomDigit . $newFileName;
                move_uploaded_file($tmpName, "$uploadsDir/$newFile");
                return $newFile;
            }
    
            $xfile = moveFile($_FILES["xfile"], "xfile", $uploads_dir);
            $ufile_x = moveFile($_FILES["ufile_x"], "ufile_x", $uploads_dir);
            $ufile = moveFile($_FILES["ufile"], "ufile", $uploads_dir);
            $ux_file = moveFile($_FILES["ux_file"], "ux_file", $uploads_dir);
    
            $stmt = $con->prepare("INSERT INTO logo (xfile, ufile_x, ufile, ux_file) VALUES (:xfile, :ufile_x, :ufile, :ux_file)");
            $stmt->bindParam(':xfile', $xfile);
            $stmt->bindParam(':ufile_x', $ufile_x);
            $stmt->bindParam(':ufile', $ufile);
            $stmt->bindParam(':ux_file', $ux_file);
    
            if ($stmt->execute()) {
                $errormsg = "
                <div class='alert alert-success alert-dismissible alert-outline fade show'>
                    Logo adicionada com sucesso!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            } else {
                $errormsg = "
                <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                    Alguma falha técnica ocorreu. Tente novamente mais tarde ou peça ajuda ao administrador.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        } else {
            $errormsg = "
            <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                Nenhum arquivo foi enviado.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
    

$query = "SELECT * FROM logo WHERE id";
$stmt = $con->query($query);
$xfile = "";
$ufile_x = "";
$ufile = "";
$ux_file = "";


while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $xfile = $row['xfile'];
    $ufile_x = $row['ufile_x'];
    $ufile = $row['ufile'];
    $ux_file = $row['ux_file'];

}

?>
<!-- ============================================================== -->
<!--Atualizar logo-->
<!-- ============================================================== -->
<div class="main-content ">
    <div class="page-content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12 mb-5 ">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 mx-auto">Editarlogo</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                                <li class="breadcrumb-item active">logo</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-9-overlay w-100 ">
                    <div class="card mt-xxl-n5">
                        <div class="card-header ">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="false">
                                        <i class="fas fa-home"></i>Editar
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content ">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel mx-auto">
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        print $errormsg;
                                    }
                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img src="uploads/logo/<?php print $xfile; ?>" alt="img" style="max-height:120px;">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Favicon:</label>
                                                    <input type="file" class="form-control" id="firstnameInput" name="xfile">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="uploads/logo/<?php print $ufile; ?>" alt="img" style="max-height:70px;">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Logo:</label>
                                                    <input type="file" class="form-control" id="firstnameInput" name="ufile">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="uploads/logo/<?php print $ux_file; ?>" alt="img" style="max-height:70px;">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Logo ux:</label>
                                                    <input type="file" class="form-control" id="firstnameInput" name="ux_file">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="uploads/logo/<?php print $ufile_x; ?>" alt="img" style="max-height:120px;">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Logo login:</label>
                                                    <input type="file" class="form-control" id="firstnameInput" name="ufile_x">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>