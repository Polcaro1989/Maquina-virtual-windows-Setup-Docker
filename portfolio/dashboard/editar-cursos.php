<?php include "header.php"; ?>
<?php include "Controllers/ControllerEditarCurso.php"; ?>
<?php
include "header.php";
error_reporting(E_ALL);
ini_set('display_errors', true);
include "sidebar.php";
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar Serviço:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                                <li class="breadcrumb-item active">Serviço</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="false">
                                        <i class="fas fa-home"></i> Editar:
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <?php include "config/Request_method_editar_curso.php"; ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="serviceTitleInput" class="form-label">Serviço Título:</label>
                                                    <input type="text" class="form-control" id="serviceTitleInput" name="curso_title" value="<?php echo htmlspecialchars($curso_title); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="serviceDescTextarea" class="form-label">Serviço descrição:</label>
                                                    <textarea class="form-control" id="serviceDescTextarea" name="curso_desc" rows="2"><?php echo htmlspecialchars($curso_desc); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="serviceDetailTextarea" class="form-label">Cursos detalhes:</label>
                                                    <textarea class="form-control" id="serviceDetailTextarea" name="curso_detail" rows="3"><?php echo htmlspecialchars($curso_detail); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="fileInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" id="fileInput" name="ufile">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Atualizar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page-content -->

<?php include "footer.php"; ?>