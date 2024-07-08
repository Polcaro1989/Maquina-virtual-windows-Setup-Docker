<?php

include_once("z_db.php");
session_start();

if (isset($_GET['id'])) {
    $todelete = $_GET['id'];

    $query = "DELETE FROM admin WHERE id = :todelete";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':todelete', $todelete);
    $result = $stmt->execute();

    if ($result) {
        echo "<center>Admin deletado com sucesso!<br/>Redirecionando em 2 segundos...</center>";
        header("refresh:2;url=usuario");
        exit();
    } else {
        echo "<center>A ação não pôde ser executada, verifique novamente.<br/>Redirecionando em 2 segundos...</center>";
        header("refresh:2;url=usuario");
        exit();
    }
} else {
    echo "<center>ID não definido<br/>Redirecionando em 2 segundos...</center>";
    header("refresh:2;url=usuario");
    exit();
}
