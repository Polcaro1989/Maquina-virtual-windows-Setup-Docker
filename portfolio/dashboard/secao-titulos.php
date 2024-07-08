<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php ini_set('display_errors', 1);
error_reporting(E_ALL);
error_reporting(10)
?>


<!-- ============================================================== -->
<!-- Seção titulos -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Seção títulos</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Seção</a></li>
                                <li class="breadcrumb-item active">Títulos</li>
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
                                        <i class="fas fa-home"></i> Seção titulos
                                    </a>
                                </li>


                            </ul>
                        </div>


                        <?php
                        $status = "OK"; // initial status
                        $msg = "";
                        if (isset($_POST['save'])) {
                            $about_title = $_POST['about_title'];
                            $about_text = $_POST['about_text'];
                            $why_title = $_POST['why_title'];
                            $why_text = $_POST['why_text'];
                            $service_title = $_POST['service_title'];
                            $service_text = $_POST['service_text'];
                            $port_title = $_POST['port_title'];
                            $port_text = $_POST['port_text'];
                            $test_title = $_POST['test_title'];
                            $test_text = $_POST['test_text'];
                            $contact_title = $_POST['contact_title'];
                            $contact_text = $_POST['contact_text'];
                            $enquiry_title = $_POST['enquiry_title'];
                            $enquiry_text = $_POST['enquiry_text'];

                            if (strlen($about_title) < 1) {
                                $msg .= "About Title field cannot be empty.<br>";
                                $status = "NOTOK";
                            }
                            if (strlen($about_text) < 1) {
                                $msg .= "About Text Field must contain a character.<br>";
                                $status = "NOTOK";
                            }

                            if ($status == "OK") {
                                try {
                                    $stmt = $con->prepare("UPDATE section_title SET about_title=:about_title, about_text=:about_text, why_title=:why_title, why_text=:why_text, service_title=:service_title, service_text=:service_text, port_title=:port_title, port_text=:port_text, test_title=:test_title, test_text=:test_text, contact_title=:contact_title, contact_text=:contact_text, enquiry_title=:enquiry_title, enquiry_text=:enquiry_text WHERE id=1");
                                    $stmt->bindParam(':about_title', $about_title);
                                    $stmt->bindParam(':about_text', $about_text);
                                    $stmt->bindParam(':why_title', $why_title);
                                    $stmt->bindParam(':why_text', $why_text);
                                    $stmt->bindParam(':service_title', $service_title);
                                    $stmt->bindParam(':service_text', $service_text);
                                    $stmt->bindParam(':port_title', $port_title);
                                    $stmt->bindParam(':port_text', $port_text);
                                    $stmt->bindParam(':test_title', $test_title);
                                    $stmt->bindParam(':test_text', $test_text);
                                    $stmt->bindParam(':contact_title', $contact_title);
                                    $stmt->bindParam(':contact_text', $contact_text);
                                    $stmt->bindParam(':enquiry_title', $enquiry_title);
                                    $stmt->bindParam(':enquiry_text', $enquiry_text);
                                    $stmt->execute();

                                    $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
Seção títulos atualizada com sucesso!    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
                                } catch (PDOException $e) {
                                    $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
Alguma falha técnica está lá. Tente novamente mais tarde ou peça ajuda ao administrador.    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
                                }
                            } else {
                                $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
    " . $msg . "
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>"; //printing error if found in validation
                            }
                        } else {
                            $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
Alguma falha técnica está lá. Tente novamente mais tarde ou peça ajuda ao administrador.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>"; //printing error if found in validation
                        }
                        ?>

                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <?php
                                    $query = "SELECT * FROM section_title WHERE id = 1";

                                    $stmt = $con->prepare($query);
                                    $stmt->execute();
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                                    $about_title = $row['about_title'];
                                    $about_text = $row['about_text'];
                                    $why_title = $row['why_title'];
                                    $why_text = $row['why_text'];
                                    $service_title = $row['service_title'];
                                    $service_text = $row['service_text'];
                                    $port_title = $row['port_title'];
                                    $port_text = $row['port_text'];
                                    $test_title = $row['test_title'];
                                    $test_text = $row['test_text'];
                                    $contact_title = $row['contact_title'];
                                    $contact_text = $row['contact_text'];
                                    $enquiry_title = $row['enquiry_title'];
                                    $enquiry_text = $row['enquiry_text'];
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
                                                    <label for="firstnameInput" class="form-label"> Blog Título</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="about_title" value="<?php print $about_title ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Blog texto</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="about_text" rows="2"><?php print $about_text ?></textarea>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Quem somos título</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="why_title" value="<?php print ucwords($why_title) ?>">

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Quem somos texto</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="why_text" rows="2"><?php print $why_text ?></textarea>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Serviço título</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="service_title" value="<?php print $service_title ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Serviço Texto</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="service_text" rows="2"><?php print $service_text ?></textarea>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Portfólio título</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="port_title" value="<?php print $port_title ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Portfolio Texto</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="port_text" rows="2"><?php print $port_text ?></textarea>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Testemunha título</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="test_title" value="<?php print $test_title ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Testemunha texto</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="test_text" rows="2"><?php print $test_text ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Contato título</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="contact_title" value="<?php print $contact_title ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Contato texto</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="contact_text" rows="2"><?php print $contact_text ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Rodapé título</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="enquiry_title" value="<?php print $enquiry_title ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Rodapé texto</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="enquiry_text" rows="2"><?php print $enquiry_text ?></textarea>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

<?php include "footer.php"; ?>