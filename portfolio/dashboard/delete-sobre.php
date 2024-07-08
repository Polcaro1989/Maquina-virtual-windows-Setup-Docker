<?php
header("refresh:2;url=sobre-listar.php");
include_once("z_db.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page

if (isset($_GET['id'])) {
    $todelete = $_GET['id'];

    $query = "DELETE FROM sobre WHERE id = :todelete";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':todelete', $todelete);
    $result = $stmt->execute();

    if ($result) {
        echo "<center>Página sobre deletada com sucesso!<br/>Redirecionando em 2 segundos...</center>";
    } else {
        echo "<center>A ação não pôde ser executada, verifique novamente.<br/>Redirecionando em 2 segundos...</center>";
    }
} else {
    echo "<center>ID não definido<br/>Redirecionando em 2 segundos...</center>";
}
