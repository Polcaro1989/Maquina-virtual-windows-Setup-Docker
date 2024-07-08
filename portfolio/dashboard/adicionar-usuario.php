<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<!-- ============================================================== -->
<!-- Adicionar usuário -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Adicionar usuário:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adicionar</a></li>
                                <li class="breadcrumb-item active">Usuário:</li>
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
                                        <i class="fas fa-home"></i>Adicionar:
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?php
                        $status = "OK"; //initial status
                        $msg = "";
                        $errormsg = "";

                        if (isset($_POST['save'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $role = $_POST['role'];

                            if (strlen($username) < 5) {
                                $msg .= "Username Must Be More Than 5 Char Length.<br>";
                                $status = "NOTOK";
                            }
                            if (strlen($password) < 5) {
                                $msg .= "Password Must Be More Than 5 Char Length.<br>";
                                $status = "NOTOK";
                            }

                            $stmt = $con->prepare("SELECT COUNT(*) FROM admin WHERE username = ?");
                            $stmt->bindParam(1, $username);
                            $stmt->execute();
                            $nr = $stmt->fetchColumn();

                            if ($nr == 1) {
                                $msg .= "Username Already Exists. Please Try Another One.<br>";
                                $status = "NOTOK";
                            }

                            $uploads_dir = 'uploads/users';
                            $tmp_name = $_FILES["ufile"]["tmp_name"];
                            $name = basename($_FILES["ufile"]["name"]);
                            $random_digit = rand(0000, 9999);
                            $new_file_name = $random_digit . $name;
                            move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

                            if ($status == "OK") {
                                $stmt = $con->prepare("INSERT INTO admin (username, password, role, ufile) VALUES (?, ?, ?, ?)");
                                $stmt->bindParam(1, $username);
                                $stmt->bindParam(2, $password);
                                $stmt->bindParam(3, $role);
                                $stmt->bindParam(4, $new_file_name);

                                if ($stmt->execute()) {
                                    $errormsg = "
                        <div class='alert alert-success alert-dismissible alert-outline fade show'>
                            Usuário adicionado com sucesso!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                                }
                            } elseif ($status !== "OK") {
                                $errormsg = "
                        <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                            " . $msg . "
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>"; //printing error if found in validation
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
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        print $errormsg;
                                    }
                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Selecione a Função</label>
                                                    <select class="form-select" name="role" aria-label="Default select example">
                                                        <option selected="">Selecione a Função </option>
                                                        <option value="admin">Administrador</option>
                                                        <option value="user">Usuário</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Usuário:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="username">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Senha:</label>
                                                    <input type="password" class="form-control" id="firstnameInput" name="password">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" id="firstnameInput" name="ufile">
                                                </div>
                                            </div>


                                            <!--end col-->

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