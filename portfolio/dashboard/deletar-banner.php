<?php
include_once("z_db.php");
session_start();

$todelete = $_GET["id"];
$stmt = $con->prepare("SELECT ufile FROM banner WHERE id = :id");
$stmt->bindParam(':id', $todelete);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$filenameToDelete = $row['ufile'];

// Exclua o registro da tabela
$stmt = $con->prepare("DELETE FROM banner WHERE id = :id");
$stmt->bindParam(':id', $todelete);
$deleteSuccess = $stmt->execute();

if ($deleteSuccess) {
    // Exclua o arquivo da pasta
    $uploadsDir = 'uploads/banner';
    $filePathToDelete = "$uploadsDir/$filenameToDelete";
    if (file_exists($filePathToDelete)) {
        unlink($filePathToDelete);
    }

    echo "<center>Banner deletado com sucesso!<br/>Redirecionando em 2 segundos...</center>";
} else {
    echo "<center>A ação não pôde ser executada, verifique novamente<br/>Redirecionando em 2 segundos...</center>";
}

header("refresh:2;url=banner-listar.php");
?>
