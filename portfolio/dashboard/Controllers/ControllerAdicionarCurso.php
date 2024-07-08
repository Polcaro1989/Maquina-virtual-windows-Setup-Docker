<?php
$status = "OK"; 
$msg = "";
$errormsg = "";
if (isset($_POST['save'])) {
    $curso_title = $_POST['curso_title'];
    $curso_desc = $_POST['curso_desc'];
    $curso_detail = $_POST['curso_detail'];
    $ufile = $_FILES["ufile"]["name"]; 
    if (strlen($curso_title) < 5) {
        $msg = $msg . "O título do serviço deve ter mais de 5 caracteres de comprimento.<BR>";
        $status = "NOTOK";
    }
    if (strlen($curso_desc) > 150) {
        $msg = $msg . "A descrição resumida deve ter menos de 150 caracteres de comprimento.<BR>";
        $status = "NOTOK";
    }
    if (strlen($curso_detail) < 15) {
        $msg = $msg . "O detalhe do serviço deve ter mais de 15 caracteres de comprimento.<BR>";
        $status = "NOTOK";
    }

    $uploads_dir = 'uploads/cursos';
    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0755, true);
    }
    $tmp_name = $_FILES["ufile"]["tmp_name"];
    $name = basename($_FILES["ufile"]["name"]);
    $random_digit = rand(0000, 9999);
    $new_file_name = $random_digit . $name;
    move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");
    
    if ($status == "OK") {
        $stmt = $con->prepare("INSERT INTO cursos (curso_title, curso_desc, curso_detail, ufile) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $curso_title);
        $stmt->bindParam(2, $curso_desc);
        $stmt->bindParam(3, $curso_detail);
        $stmt->bindParam(4, $new_file_name);
        if ($stmt->execute()) {
            $errormsg = "
                       <div class='alert alert-success alert-dismissible alert-outline fade show'>
                           Curso adicionado com sucesso!
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                       </div>";
        } else {
            $errormsg = "
                       <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                           Alguma falha técnica está lá. Tente novamente mais tarde ou peça ajuda ao administrador.
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                       </div>";
        }
    } elseif ($status !== "OK") {
        $errormsg = "
                       <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                           " . $msg . " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                       </div>";
    } else {
        $errormsg = "
                       <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                           Alguma falha técnica está lá. Tente novamente mais tarde ou peça ajuda ao administrador.
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                       </div>";
    }
}
