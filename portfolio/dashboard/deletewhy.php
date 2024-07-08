<?php
header("refresh:2;url=quem-somos-listar.php");
include_once("z_db.php");
// Inicialize a sessão
session_start();
// Verifique se a sessão de usuário está configurada, caso contrário, redirecione para a página de login

if (isset($_GET['id'])) {
    $todelete = $_GET['id'];

    $query = "DELETE FROM why_us WHERE id = :todelete";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':todelete', $todelete);
    $result = $stmt->execute();

    if ($result) {
        echo "<center> Quem somos deletado com sucesso!<br/>Redirecionando em 2 segundos...</center>";
    } else {
        echo "<center>A ação não pôde ser executada, verifique novamente<br/>Redirecionando em 2 segundos...</center>";
    }
} else {
    echo "<center>ID não definido<br/>Redirecionando em 2 segundos...</center>";
}
