<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php
error_reporting(10);
?>
<!-- ============================================================== -->
<!-- Currículos Listar -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Currículos Listar:</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listar</a></li>
                                <li class="breadcrumb-item active">Currículos</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Listar:</h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Nome:</th>
                                        <th data-ordering="false">Currículo:</th>
                                        <th data-ordering="false">Data de Envio:</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                  $dbHost = 'localhost';
                                  $dbName = 'vogue2';
                                  $dbUser = 'root';
                                  $dbPass = '';
                                  
                                  $nome = '';
                                  $pdf_curriculo = '';
                                  
                                    try {
                                        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
                                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    } catch (PDOException $e) {
                                        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
                                    }
                                    
                                    $q = "SELECT * FROM curriculos ORDER BY id DESC";
                                    $stmt = $pdo->prepare($q);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($result as $row) {
                                        $id = $row['id'];
                                        $nome = $row['nome'];
                                        $pdf_curriculo = $row['pdf_curriculo'];
                                        $data_envio = $row['data_envio'];

                                        echo "<tr>
    <td>
        $nome
    </td>
    <td>
        <a href='download-curriculo.php?filename=$pdf_curriculo'>$pdf_curriculo</a>
    </td>
    <td>
        $data_envio
    </td>
    <td>
        <div class='dropdown d-inline-block'>
            <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                <i class='ri-more-fill align-middle'></i>
            </button>
            <ul class='dropdown-menu dropdown-menu-end'>
                <li>
                    <a href='editar-curriculo.php?id=$id' class='dropdown-item edit-item-btn'>
                        <i class='ri-pencil-fill align-bottom me-2 text-muted'></i> Editar
                    </a>
                </li>
                <li>
                    <a href='delete-curriculo.php?id=$id' class='dropdown-item remove-item-btn'>
                        <i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Excluir
                    </a>
                </li>
            </ul>
        </div>
    </td>
</tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
