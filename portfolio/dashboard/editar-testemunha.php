<?php
include "header.php";
include "sidebar.php";

$dbHost = 'localhost';
$dbName = 'vogue2';
$dbUser = 'root';
$dbPass = '';

$message = '';
$name = '';
$position = '';

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
$query = "SELECT * FROM testimony WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $todo);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $id = $row['id'];
    $message = $row['message'];
    $name = $row['name'];
    $position = $row['position'];
    $ufile = $row['ufile'];

    $status = "OK";
    $msg = "";
    $errormsg = "";

    if (isset($_POST['save'])) {
        if (isset($_POST['message'])) {
            $message = $_POST['message'];
        } else {
            $status = "Error";
            $msg = "A mensagem da testemunha está ausente.";
        }

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        } else {
            $status = "Error";
            $msg = "O nome da testemunha está ausente.";
        }

        if (isset($_POST['position'])) {
            $position = $_POST['position'];
        } else {
            $status = "Error";
            $msg = "A posição da testemunha está ausente.";
        }

        if (isset($_FILES['ufile']) && $_FILES['ufile']['error'] === UPLOAD_ERR_OK) {
            $uploads_dir = 'uploads/testimony';

            $tmp_name = $_FILES["ufile"]["tmp_name"];
            $filename = basename($_FILES["ufile"]["name"]);
            $random_digit = rand(0000, 9999);
            $new_file_name = $random_digit . $filename;

            move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");
        } else {
            $status = "Error";
            $msg = "Insira a imagem!";
        }

        if ($status == "OK") {
            $query = "UPDATE testimony SET message = :message, name = :name, position = :position, ufile = :ufile WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':ufile', $new_file_name);
            $stmt->bindParam(':id', $todo);
            $qb = $stmt->execute();

            if ($qb) {
                $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
    Testemunha editada com sucesso!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
            } else {
                $status = "Error";
                $msg = "Falha ao atualizar a testemunha!";
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
<!-- ============================================================== -->
<!-- Testemunhas editar-->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar testemunhas:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                                <li class="breadcrumb-item active">Testemunha</li>
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
                                                    <label for="firstnameInput" class="form-label"> Testemunha mensagem:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="message" value="<?php print $message ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Testemunha nome:</label>
                                                    <input class="form-control" id="firstnameinput" name="name" value="<?php print isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                                                </div>
                                            </div>
                                            <div class=" col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Testemunha posição:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="position" value="<?php print $position ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" name="ufile">
                                                </div>
                                            </div>
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
                <!--end col-->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<?php include "footer.php"; ?>