<?php
header("refresh:2;url=last-sevendays-contacts.php");
include('includes/config.php');
session_start();

// Verifique se a variável de sessão de nome de usuário está configurada, caso contrário, redirecione para a página de login

if (isset($_GET['id'])) {
    try {
        // Obtenha o ID a ser excluído
        $id = $_GET['id'];

        // Estabeleça a conexão com o banco de dados
        $con = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare a consulta SQL
        $query = "DELETE FROM tblcontactdata WHERE id = :id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            echo "<html>
<head>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10'>
</head>
<body>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script>
        // Mensagem de sucesso após exclusão usando SweetAlert2
        Swal.fire(
            'Excluído!',
            'Email excluido com sucesso!',
            'success'
        ).then(() => {
            // Lógica a ser executada após o usuário fechar o pop-up de sucesso
            window.location.href = 'last-sevendays-contacts.php'; // Redirecionar para outra página após a mensagem ser exibida
        });
    </script>
</body>
</html>";
        } else {
            echo "<html>
<head>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10'>
</head>
<body>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script>
        // Mensagem de erro após falha na exclusão
        Swal.fire(
            'Erro!',
            'Ocorreu um erro ao excluir o arquivo.',
            'error'
            timer: 5000,

        );
        window.location.href = 'last-sevendays-contacts.php'; // Redirecionar para outra página após a mensagem de erro ser exibida
    </script>
</body>
</html>";
        }
    } catch (PDOException $e) {
        die("Falha na conexão com o banco de dados: " . $e->getMessage());
    }
} else {
    $msg = "Nenhum ID de registro fornecido para exclusão.";
    $toastClassName = 'error';
}
