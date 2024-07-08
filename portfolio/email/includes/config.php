<?php
// Configuração do banco de dados
define('DB_HOST', 'localhost');
define('DB_USER', 'id20977104_root1');
define('DB_PASS', 'abraao8153aA*');
define('DB_NAME', 'id20977104_email');

try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Falha na conexão com o banco de dados: " . $e->getMessage());
}
