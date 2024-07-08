<?php
header("refresh:2;url=blog");
include_once("z_db.php");
session_start();

if (isset($_GET['id'])) {
    $todelete = $_GET['id'];

    $query = "DELETE FROM blog WHERE id = :todelete";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':todelete', $todelete);
    $result = $stmt->execute();

    if ($result) {
        echo "<center>Blog deletado com sucesso!<br/>Redirecionando em 2 segundos...</center>";
    } else {
        echo "<center>A ação não pôde ser executada, verifique novamente<br/>Redirecionando em 2 segundos...</center>";
    }
} else {
    echo "<center>ID não definido<br/>Redirecionando em 2 segundos...</center>";
}
