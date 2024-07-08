<?php 

header("refresh:2;url=curriculo-listar.php");

include_once("z_db.php");
session_start();

$todelete = $_GET["id"];

// Primeiro, obtenha o nome do arquivo a ser excluído
$stmt = $con->prepare("SELECT pdf_curriculo FROM curriculos WHERE id = :id");
$stmt->bindParam(':id', $todelete);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $pdf_curriculo = $row['pdf_curriculo'];

    // Exclua o arquivo da pasta
    $uploads_dir = 'uploads/curriculo';
    $file_to_delete = "$uploads_dir/$pdf_curriculo";
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete);
    }

    // Agora, exclua a entrada do banco de dados
    $stmt = $con->prepare("DELETE FROM curriculos WHERE id = :id");
    $stmt->bindParam(':id', $todelete);

    if ($stmt->execute()) {
        echo "<center>Currículo e arquivo deletados com sucesso!<br/>Redirecionando em 2 segundos...</center>";
    } else {
        echo "<center>A ação não pôde ser executada, verifique novamente<br/>Redirecionando em 2 segundos...</center>";
    }
} else {
    echo "<center>Currículo não encontrado no banco de dados.<br/>Redirecionando em 2 segundos...</center>";
}

header("refresh:2;url=curriculo-listar.php");
