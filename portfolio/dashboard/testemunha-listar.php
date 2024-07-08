<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<!-- ============================================================== -->
<!-- Testemunhas lista -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Listar testemunhas:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listar</a></li>
                                <li class="breadcrumb-item active">Testemunhas </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <th data-ordering="false">Nome:</th>
                                        <th data-ordering="false">Posição:</th>
                                        <th>Ação:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM testimony ORDER BY id DESC";
                                    $stmt = $con->prepare($q);
                                    $stmt->execute();

                                    while ($ro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $id = $ro['id'];
                                        $message = $ro['message'];
                                        $name = $ro['name'];
                                        $position = $ro['position'];
                                        $ufile = $ro['ufile'];

                                        echo "<tr>
                                           <td>
                                               <img src='uploads/testimony/$ufile' alt='img' style='max-height:150px;'>
                                           </td>
                                           <td>
                                               $message
                                           </td>
                                           <td>
                                               $name
                                           </td>
                                           <td>
                                               $position
                                           </td>
                                           <td>
                                               <div class='dropdown d-inline-block'>
                                                   <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                       <i class='ri-more-fill align-middle'></i>
                                                   </button>
                                                   <ul class='dropdown-menu dropdown-menu-end'>
                                                       <li><a href='editar-testemunha.php?id=$id' class='dropdown-item edit-item-btn'><i class='ri-pencil-fill align-bottom me-2 text-muted'></i> Edit</a></li>
                                                       <li><a href='deletetest.php?id=$id' class='dropdown-item remove-item-btn'><i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Delete</a></li>
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