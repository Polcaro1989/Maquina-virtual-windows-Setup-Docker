<?php 
$todo = $_GET['id'];
$todo = htmlspecialchars($todo); // Evitar ataques de SQL injection

include "sidebar.php";

$curso_title = ""; // Inicializa a variável $service_title
$curso_desc = ""; // Inicializa a variável $service_desc
$curso_detail = ""; // Inicializa a variável $service_detail

try {
    // Defina as informações de conexão com o banco de dados
    $dsn = "mysql:host=localhost;dbname=vogue2";
    $username = "root";
    $password = "";

    // Estabelecer a conexão com o banco de dados usando PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM cursos WHERE id = :todo";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':todo', $todo);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $id = $row['id'];
        $curso_title = $row['curso_title'];
        $curso_desc = $row['curso_desc'];
        $curso_detail = $row['curso_detail'];
    }

    $status = "OK";
    $msg = "";

    if (isset($_POST['save'])) {
        $curso_title = $_POST['curso_title'];
        $curso_desc = $_POST['curso_desc'];
        $curso_detail = $_POST['curso_detail'];
        $uploads_dir = 'uploads/cursos';
        $tmp_name = $_FILES["ufile"]["tmp_name"];
        $name = basename($_FILES["ufile"]["name"]);
        $random_digit = rand(0000, 9999);
        $new_file_name = $random_digit . $name;

        move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

        if ($status == "OK") {
            $query = "UPDATE cursos SET curso_title = :curso_title, curso_desc = :curso_desc, curso_detail = :curso_detail, ufile = :new_file_name WHERE id = :todo";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':curso_title', $curso_title);
            $stmt->bindParam(':curso_desc', $curso_desc);
            $stmt->bindParam(':curso_detail', $curso_detail);
            $stmt->bindParam(':new_file_name', $new_file_name);
            $stmt->bindParam(':todo', $todo);
            $stmt->execute();

            $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
    Serviço atualizado com sucesso!
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
    Alguma falha técnica ocorreu. Tente novamente mais tarde ou peça ajuda ao administrador.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
