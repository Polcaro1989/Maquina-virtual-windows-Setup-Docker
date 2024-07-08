<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php
error_reporting(10);
?>
<!-- ============================================================== -->
<!-- Atualizar contato -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Contato:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                                <li class="breadcrumb-item active">Contato</li>
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
                                        <i class="fas fa-home"></i>Editar:
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?php
                        $status = "OK";
                        $msg = "";
                        if (isset($_POST['save'])) {
                            $phone1 = $_POST['phone1'];
                            $phone2 = $_POST['phone2'];
                            $email1 = $_POST['email1'];
                            $email2 = $_POST['email2'];
                            $longitude = $_POST['longitude'];
                            $latitude = $_POST['latitude'];

                            if (strlen($phone1) < 10) {
                                $msg .= "O campo Telefone não pode ficar vazio.<BR>";
                                $status = "NOTOK";
                            }
                            if (strlen($email1) < 5) {
                                $msg .= "Campo Email Deve conter um email.<BR>";
                                $status = "NOTOK";
                            }

                            if ($status == "OK") {
                                $stmt = $con->prepare("UPDATE sitecontact SET phone1=?, phone2=?, email1=?, email2=?, longitude=?, latitude=? WHERE id=1");
                                $stmt->bindParam(1, $phone1);
                                $stmt->bindParam(2, $phone2);
                                $stmt->bindParam(3, $email1);
                                $stmt->bindParam(4, $email2);
                                $stmt->bindParam(5, $longitude);
                                $stmt->bindParam(6, $latitude);

                                if ($stmt->execute()) {
                                    $errormsg = "
                       <div class='alert alert-success alert-dismissible alert-outline fade show'>
                           Contato atualizado com sucesso!
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
                           Alguma falha técnica está lá. Tente novamente mais tarde ou peça ajuda ao administrador.
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                       </div>";
                            }
                        }

                        ?>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <?php
                                    $query = "SELECT * FROM sitecontact WHERE id=1";
                                    $stmt = $con->prepare($query);
                                    $stmt->execute();
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                                    $phone1 = $row['phone1'];
                                    $phone2 = $row['phone2'];
                                    $email1 = $row['email1'];
                                    $email2 = $row['email2'];
                                    $longitude = $row['longitude'];
                                    $latitude = $row['latitude'];

                                    ?>
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        print $errormsg;
                                    }
                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Telefone</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="phone1" value="<?php print $phone1 ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Telefone alternativo</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="phone2" value="<?php print $phone2 ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> E-mail</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="email1" value="<?php print $email1 ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> E-mail alternativo</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="email2" value="<?php print $email2 ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Mapa Longitude</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="longitude" value="<?php print $longitude ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Mapa Latitude</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="latitude" value="<?php print $latitude ?>">
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
<?php include "footer.php"; ?>