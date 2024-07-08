<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php
error_reporting(10);
?>
<!-- ============================================================== -->
<!-- Configurações do footer -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Footer configuração:</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                                <li class="breadcrumb-item active">Footer</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--end col-->
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
                        $status = "OK"; // initial status
                        $msg = "";
                        if (isset($_POST['save'])) {
                            $site_keyword = $_POST['site_keyword'];
                            $site_desc = $_POST['site_desc'];
                            $site_title = $_POST['site_title'];
                            $site_about = $_POST['site_about'];
                            $site_footer = $_POST['site_footer'];
                            $follow_text = $_POST['follow_text'];
                            $site_url = $_POST['site_url'];

                            if (strlen($site_keyword) < 1) {
                                $msg = $msg . "O campo Palavra-chave do footer não pode ficar vazio.<BR>";
                                $status = "NOTOK";
                            }
                            if (strlen($site_desc) < 1) {
                                $msg = $msg . "Campo Descrição do footer Deve conter um Caractere.<BR>";
                                $status = "NOTOK";
                            }

                            if ($status == "OK") {
                                $stmt = $con->prepare("UPDATE siteconfig SET site_keyword = :site_keyword, site_desc = :site_desc, site_title = :site_title, site_about = :site_about, site_footer = :site_footer, follow_text = :follow_text, site_url = :site_url WHERE id = 1");
                                $stmt->bindParam(':site_keyword', $site_keyword);
                                $stmt->bindParam(':site_desc', $site_desc);
                                $stmt->bindParam(':site_title', $site_title);
                                $stmt->bindParam(':site_about', $site_about);
                                $stmt->bindParam(':site_footer', $site_footer);
                                $stmt->bindParam(':follow_text', $follow_text);
                                $stmt->bindParam(':site_url', $site_url);
                                $stmt->execute();

                                $errormsg = "
                  <div class='alert alert-success alert-dismissible alert-outline fade show'>
                      Footer atualizado com sucesso!.
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>
                  ";
                            } elseif ($status !== "OK") {
                                $errormsg = "
                  <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                      " . $msg . " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>"; // printing error if found in validation
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
                                    $query = "SELECT * FROM siteconfig WHERE id = 1";
                                    $stmt = $con->prepare($query);
                                    $stmt->execute();
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                                    $site_title = $row['site_title'];
                                    $site_keyword = $row['site_keyword'];
                                    $site_about = $row['site_about'];
                                    $site_footer = $row['site_footer'];
                                    $follow_text = $row['follow_text'];
                                    $site_desc = $row['site_desc'];
                                    $site_url = $row['site_url'];

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
                                                    <label for="firstnameInput" class="form-label">Título:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="site_title" value="<?php print $site_title ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Palavras chave do site:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="site_keyword" value="<?php print $site_keyword ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Site Descrição:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="site_desc" rows="3"><?php print $site_desc ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Footer Sobre:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="site_about" rows="3"> <?php print $site_about ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Atualizr Footer:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="site_footer" value="<?php print $site_footer ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Rede social texto:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="follow_text" rows="3"><?php print $follow_text ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Url do site:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="site_url" value="<?php print $site_url ?>">
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