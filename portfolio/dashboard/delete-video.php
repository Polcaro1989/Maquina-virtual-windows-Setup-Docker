<?php
header("refresh:2;url=video-listar.php");

include_once("z_db.php");
session_start();

$todelete = $_GET["id"];

$stmt = $con->prepare("DELETE FROM slider WHERE id = :id");
$stmt->bindParam(':id', $todelete);

if ($stmt->execute()) {
    echo "<center>Video deletado com sucesso!<br/>Redirecionando em 2 segundos...</center>";
} else {
    echo "<center>A ação não pôde ser executada, verifique novamente<br/>Redirecionando em 2 segundos...</center>";
}

header("refresh:2;url=banner-listar.php");
