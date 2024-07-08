<?php
include "header.php";
include "sidebar.php";


$dbHost = 'localhost';
$dbName = 'vogue2';
$dbUser = 'root';
$dbPass = '';

$sobre_stitle = '';
$sobre_stext = '';


$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, $options);
} catch (PDOException $e) {
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}

$todo = $_GET['id'];
$query = "SELECT * FROM sobre WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $todo);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $id = $row['id'];
    $sobre_stitle = $row['sobre_stitle'];
    $sobre_stext = $row['sobre_stext'];
    $ufile = $row['ufile'];

    $status = "OK";
    $msg = "";
    $errormsg = "";

    if (isset($_POST['save'])) {
        if (isset($_POST['sobre_stitle'])) {
            $sobre_stitle = $_POST['sobre_stitle'];
        } else {
            $status = "Error";
            $msg = "O título da Página sobre está ausente.";
        }
        if (isset($_POST['sobre_stext'])) {
            $sobre_stext = $_POST['sobre_stext'];
        } else {
            $status = "Error";
            $msg = "O detalhe da página sobre está faltando.";
        }

        if (isset($_FILES['ufile']) && $_FILES['ufile']['error'] === UPLOAD_ERR_OK) {
            $uploads_dir = 'uploads/sobre';

            $tmp_name = $_FILES["ufile"]["tmp_name"];
            $filename = basename($_FILES["ufile"]["name"]);
            $random_digit = rand(0000, 9999);
            $new_file_name = $random_digit . $filename;

            move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");
        } else {
            $status = "Error";
            $msg = "Falha no upload do arquivo!";
        }

        if ($status == "OK") {
            $query = "UPDATE sobre SET sobre_stitle = :sobre_stitle, sobre_stext = :sobre_stext, ufile = :ufile WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':sobre_stitle', $sobre_stitle);
            $stmt->bindParam(':sobre_stext', $sobre_stext);
            $stmt->bindParam(':ufile', $new_file_name);
            $stmt->bindParam(':id', $todo);
            $qb = $stmt->execute();

            if ($qb) {
                $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
    Página sobre editada com sucesso!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
            } else {
                $status = "Error";
                $msg = "A atualização da página sobre falhou!";
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
}

?>
<?php
include "header.php";
error_reporting(E_ALL);
ini_set('display_errors', true);
include "sidebar.php";

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
                        <h4 class="mb-sm-0">Editar página sobre:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                                <li class="breadcrumb-item active">Sobre</li>
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
                                                    <label for="firstnameInput" class="form-label"> Pagina sobre título:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="sobre_stitle" value="<?php print $sobre_stitle ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Página sobre descrição:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="sobre_stext" rows="2"><?php print $sobre_stext ?></textarea>
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