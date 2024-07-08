<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php
error_reporting(10);
?>
<!-- ============================================================== -->
<!-- Redes socisia links -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Redes sociais:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Excluir</a></li>
                                <li class="breadcrumb-item active">Redes-sociais</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Excluir: </h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Rede social:</th>
                                        <th data-ordering="false">Link:</th>
                                        <th data-ordering="false">fa:</th>
                                        <th>Acão</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM social ORDER BY id DESC";
                                    $stmt = $con->prepare($q);
                                    $stmt->execute();

                                    while ($ro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $id = $ro['id'];
                                        $name = $ro['name'];
                                        $social_link = $ro['social_link'];
                                        $fa = $ro['fa'];

                                        echo "<tr>
                                         <td>
                                             $name
                                         </td>
                                         <td>
                                             <a href='$social_link'>$social_link</a>
                                         </td>
                                         <td>
                                             $fa
                                         </td>
                                         <td>
                                             <div class='dropdown d-inline-block'>
                                                 <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                     <i class='ri-more-fill align-middle'></i>
                                                 </button>
                                                 <ul class='dropdown-menu dropdown-menu-end'>
                                                     <li>
                                                         <a href='deletesocial.php?id=$id' class='dropdown-item remove-item-btn'>
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