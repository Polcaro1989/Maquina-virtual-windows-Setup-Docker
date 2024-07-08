<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<!-- ============================================================== -->
<!-- Sobre listar-->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Página sobre listar:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listar</a></li>
                                <li class="breadcrumb-item active">Sobre:</li>
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
                                        <th data-ordering="false" class="col-1">Título:</th>
                                        <th data-ordering="false">Descrição:</th>
                                        <th>Ação:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM cursos ORDER BY id DESC";
                                    $stmt = $con->prepare($q);
                                    $stmt->execute();

                                    while ($ro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $id = $ro['id'];
                                        $curso_title = $ro['curso_title'];
                                        $curso_desc = $ro['curso_desc'];
                                        $curso_detail = $ro['curso_detail'];
                                        $ufile = $ro['ufile'];

                                        echo "<tr>
                                          <td>
                                              <img src='uploads/cursos/$ufile' alt='img' style='max-height:150px;'>
                                          </td>
                                          <td>
                                              $curso_title
                                          </td>
                                          <td>
                                              $curso_desc
                                          </td>
                                          <td>
                                          $curso_detail
                                      </td>
                                          <td>
                                              <div class='dropdown d-inline-block'>
                                                  <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                      <i class='ri-more-fill align-middle'></i>
                                                  </button>
                                                  <ul class='dropdown-menu dropdown-menu-end'>
                                                      <li>
                                                          <a href='editar-cursos.php?id=$id' class='dropdown-item edit-item-btn'>
                                                              <i class='ri-pencil-fill align-bottom me-2 text-muted'></i> Edit
                                                          </a>
                                                      </li>
                                                      <li>
                                                          <a href='deletar-curso.php?id=$id' class='dropdown-item remove-item-btn'>
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