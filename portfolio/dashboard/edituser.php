<?php include "header.php";?>
<?php include "sidebar.php";?>
<!-- ============================================================== -->
<!-- Editar usuário -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar usuário:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                                <li class="breadcrumb-item active">Usuário:</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php
            $query = "SELECT * FROM admin WHERE id = :todo";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':todo', $todo);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $id = $row['id'];
                $username = $row['username'];
                $password = $row['password'];
                $role = $row['role'];
            }

            ?>
            <div class="row">
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
                        <?php
                        $status = "OK"; // inicializa o status
                        $errormsg = ""; // mensagem de erro vazia
                        $password = "";

                        if (isset($_POST['save'])) {
                            // Verifica se os campos do formulário estão definidos
                            if (isset($_POST['username'], $_POST['password'], $_POST['role'])) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $role = $_POST['role'];

                                // Prepara a consulta de atualização
                                $query = "UPDATE admin SET username = :username, password = :password, role = :role";
                                $stmt = $con->prepare($query);

                                // Verifica se a preparação da consulta foi bem-sucedida
                                if ($stmt) {
                                    // Vincula os parâmetros da consulta
                                    $stmt->bindParam(':username', $username);
                                    $stmt->bindParam(':password', $password);
                                    $stmt->bindParam(':role', $role);

                                    // Executa a consulta
                                    $result = $stmt->execute();

                                    if ($result) {
                                        $errormsg = "<div class='alert alert-success alert-dismissible alert-outline fade show'>
                                        Usuário editato com sucesso!
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                    } else {
                                        $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                        Erro ao atualizar o serviço. Tente novamente mais tarde ou entre em contato com o administrador para obter assistência.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                    }
                                } else {
                                    $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                    Erro ao preparar consulta de atualização. Tente novamente mais tarde ou entre em contato com o administrador para obter assistência.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                                }
                            } else {
                                $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                Dados de formulário inválidos. Tente novamente ou entre em contato com o administrador para obter assistência.
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
                                    ?><form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Usuario:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="username" value="<?php print $username ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Senha:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="password" rows="2"><?php print $password ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Selecione a função</label>
                                                    <select class="form-select" name="role" <?php print $role ?>aria-label="Default select example">
                                                        <option selected="">Selecione</option>
                                                        <option value="admin">Administrador</option>
                                                        <option value="user">Usuário</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
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