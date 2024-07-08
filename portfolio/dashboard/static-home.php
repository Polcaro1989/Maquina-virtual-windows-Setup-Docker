<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php
error_reporting(10);
?>
<!-- ============================================================== -->
<!-- Home -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Static Slider</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Slider</a></li>
                                <li class="breadcrumb-item active">Update</li>
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
                                        <i class="fas fa-home"></i> Update Slider
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?php
                        $status = "OK";
                        $msg = "";
                        if (isset($_POST['save'])) {
                            $stitle = $_POST['stitle'];
                            $stext = $_POST['stext'];

                            if (strlen($stitle) < 100) {
                                $msg .= "Title field can not be empty.<BR>";
                                $status = "NOTOK";
                            }
                            if (strlen($stext) < 500) {
                                $msg .= "Slider Text Field Must contain characters.<BR>";
                                $status = "NOTOK";
                            }

                            $uploads_dir = 'uploads/welcome';
                            $tmp_name = isset($_FILES["ufile"]["tmp_name"]) ? $_FILES["ufile"]["tmp_name"] : null;
                            $name = isset($_FILES["ufile"]["name"]) ? basename($_FILES["ufile"]["name"]) : null;

                            $random_digit = rand(0000, 9999);
                            $new_file_name = $random_digit . $name;
                            move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

                            if ($status == "OK") {
                                $stmt = $con->prepare("UPDATE static SET stitle=?, stext=? WHERE id=1");
                                $stmt->bindParam(1, $stitle);
                                $stmt->bindParam(2, $stext);

                                if ($stmt->execute()) {
                                    $errormsg = "
                       <div class='alert alert-success alert-dismissible alert-outline fade show'>
                           Slider Info Updated successfully.
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
                           Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help.
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                       </div>";
                            }
                        }

                        ?>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <?php
                                    $query = "SELECT * FROM static WHERE id = 1";
                                    $stmt = $con->prepare($query);
                                    $stmt->execute();
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                                    if ($row) {
                                        $stitle = $row['stitle'];
                                        $stext = $row['stext'];
                                    } else {
                                        // Registro não encontrado, faça o tratamento adequado
                                        $stitle = ""; // Valor padrão ou tratamento alternativo
                                        $stext = ""; // Valor padrão ou tratamento alternativo
                                    }
                                    ?>

                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        echo $errormsg;
                                    }
                                    ?>


                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Slider Title</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="stitle" value="<?php print $stitle ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Slider Text</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="stext" value="<?php print $stext ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Update Slider</button>
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