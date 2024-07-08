<?php
include "header.php";
include "sidebar.php";

$dbHost = 'localhost';
$dbName = 'vogue2';
$dbUser = 'root';
$dbPass = '';


try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

$stitle = '';
$stext = '';

if (isset($_GET['id'])) {
    $todo = $_GET['id'];

    $query = "SELECT * FROM static WHERE id = :todo";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':todo', $todo);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $id = $row['id'];
        $stitle = $row['stitle'];
        $stext = $row['stext'];
        $ufile = $row['ufile'];

        $status = "OK"; // initial status
        $msg = "";
        $errormsg = "";

        if (isset($_POST['save'])) {
            if (isset($_POST['stitle'])) {
                $stitle = $_POST['stitle'];
            } else {
                $status = "Error";
                $msg = "O título da Página inicial está ausente.";
            }
            if (isset($_POST['stext'])) {
                $stext = $_POST['stext'];
            } else {
                $status = "Error";
                $msg = "O detalhe da página inicial está faltando.";
            }

            if (isset($_FILES['ufile']) && $_FILES['ufile']['error'] === UPLOAD_ERR_OK) {
                $uploads_dir = 'uploads/welcome';
                $tmp_name = $_FILES["ufile"]["tmp_name"];
                $name = basename($_FILES["ufile"]["name"]);
                $random_digit = rand(0000, 9999);
                $new_file_name = $random_digit . $name;
                move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");
            } else {
                $status = "Error";
                $msg = "Falha no upload do arquivo!";
            }

            if ($status == "OK") {
                $query = "UPDATE static SET stitle = :stitle, stext = :stext, ufile = :ufile WHERE id = :todo";
                $stmt = $con->prepare($query);
                $stmt->bindParam(':stitle', $stitle);
                $stmt->bindParam(':stext', $stext);
                $stmt->bindParam(':ufile', $new_file_name);
                $stmt->bindParam(':todo', $todo);
                $qb = $stmt->execute();

                if ($qb) {
                    $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
    Página inicial editada com sucesso!.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
                } else {
                    $status = "Error";
                    $msg = "A atualização da página inicial falhou!.";
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
    } else {
        $status = "Error";
        $msg = "Registro não encontrado."; // Record not found message
    }
} else {
    $status = "Error";
    $msg = "ID não definido."; // ID not defined message
}

?>

<!-- ============================================================== -->
<!-- Editar página inicial -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar página inicial:</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                                <li class="breadcrumb-item active">Página inicial</li>
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
                                                    <label for="firstnameInput" class="form-label"> Pagina inicial título:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="stitle" value="<?php print $stitle ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Página inicial descrição:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="stext" rows="2"><?php print $stext ?></textarea>
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