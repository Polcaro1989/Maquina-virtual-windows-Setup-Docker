<?php 

header("refresh:2;url=logo-listar.php");

include_once("z_db.php");
session_start();

$todelete = $_GET["id"];

// Obtenha os nomes dos arquivos para exclusão
$stmt = $con->prepare("SELECT xfile, ufile_x, ufile FROM logo WHERE id = :id");
$stmt->bindParam(':id', $todelete);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$xfile = $result['xfile'];
$ufile_x = $result['ufile_x'];
$ufile = $result['ufile'];

// Exclua os arquivos da pasta
$uploads_dir = 'uploads/logo';
$files_to_delete = [$xfile, $ufile_x, $ufile];
foreach ($files_to_delete as $file) {
    $file_to_delete = "$uploads_dir/$file";
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete);
    }
}

// Exclua a entrada do banco de dados
$stmt = $con->prepare("DELETE FROM logo WHERE id = :id");
$stmt->bindParam(':id', $todelete);

if ($stmt->execute()) {
    echo "<center>Logo deletado com sucesso!<br/>Redirecionando em 2 segundos...</center>";
} else {
    echo "<center>A ação não pôde ser executada, verifique novamente<br/>Redirecionando em 2 segundos...</center>";
}

header("refresh:2;url=logo-listar.php");
