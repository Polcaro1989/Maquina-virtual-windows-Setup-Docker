<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php
error_reporting(10);
?>
<!-- ============================================================== -->
<!-- Portfólio listar -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Banner listar:</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listar</a></li>
                                <li class="breadcrumb-item active">Banner</li>
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
                                        <th data-ordering="false">Imagem:</th>
                                        <th data-ordering="false">Título:</th>
                                        <th data-ordering="false">Descrição:</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM banner ORDER BY id DESC";
                                    $stmt = $con->prepare($q);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($result as $row) {
                                        $id = $row['id'];
                                        $banner_title = $row['banner_title'];
                                        $banner_text = $row['banner_text'];
                                        $ufile = $row['ufile'];
                                        echo "<tr>
    <td>
        <img src='uploads/portfolio/$ufile' alt='img' style='max-height:150px;'>
    </td>
    <td>
        $banner_title
    </td>
    <td>
        $banner_text
    </td>
    <td>
        <div class='dropdown d-inline-block'>
            <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                <i class='ri-more-fill align-middle'></i>
            </button>
            <ul class='dropdown-menu dropdown-menu-end'>
                <li>
                    <a href='editar-banner.php?id=$id' class='dropdown-item edit-item-btn'>
                        <i class='ri-pencil-fill align-bottom me-2 text-muted'></i> Edit
                    </a>
                </li>
                <li>
                    <a href='deletar-banner.php?id=$id' class='dropdown-item remove-item-btn'>
                        <i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Delete
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