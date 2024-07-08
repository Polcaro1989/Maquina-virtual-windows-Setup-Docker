<?php
header("refresh:2;url=portfolio-listar.php");
require_once("./z_db.php");

// Initialize the session
session_start();

// Check if the user session is set; otherwise, redirect to the login page

if (isset($_GET['id'])) {
    $todelete = $_GET['id'];

    $query = "DELETE FROM portfolio WHERE id = :todelete";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':todelete', $todelete);
    $result = $stmt->execute();

    if ($result) {
        echo "<center>Portfolio deletado com secesso!<br/>Redirecionando em 2 segundos...</center>";
    } else {
        echo "<center>A ação não pôde ser executada, verifique novamente<br/>Redirecionando em 2 segundos...</center>";
    }
} else {
    echo "<center>ID não definido<br/>Redirecionando em 2 segundos...</center>";
}
