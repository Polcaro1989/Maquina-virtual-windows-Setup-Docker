<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['userlogin']) == 0) :
  header('location:index.php');
else :
  if (isset($_GET['cid'])) {
    $formid = $_GET['cid'];
    $isread = 1;
    $sql = " update  tblcontactdata set Is_Read=:isread where id=:cfid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':cfid', $formid, PDO::PARAM_STR);
    $query->bindParam(':isread', $isread, PDO::PARAM_STR);
    $query->execute();
  }
  if (isset($_POST['submit'])) {
    $formid = $_GET['cid'];
    $remark = $_POST['remark'];
    $sql = "INSERT INTO   tbladminremarks(contactFormId,adminRemark) VALUES(:cfid,:adminrmrk)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':cfid', $formid, PDO::PARAM_STR);
    $query->bindParam(':adminrmrk', $remark, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      echo "<script>alert('Observação adicionada com sucesso!');</script>";
      echo "<script>window.location.href='all-contacts.php'</script>";
    } else {
      echo "<script>alert('Alguma coisa deu errado. Por favor tente outra vez!');</script>";
      echo "<script>window.location.href='all-contacts.php'</script>";
    }
  }

?>
  <!DOCTYPE html>
  <html class="loading" lang="en" data-textdirection="ltr">

  <head>

    <title>E-mails|D&L construções
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/invoice.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>

  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <?php include('includes/header.php'); ?>
    <?php include('includes/leftbar.php'); ?>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Detalhes do contato</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                  </li>
                  </li>
                  <li class="breadcrumb-item active">Detalhes do contato</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <section class="card">
            <div id="invoice-template" class="card-body">
              <?php
              $fid = intval($_GET['cid']);
              $sql = "SELECT tblcontactdata.FullName,tblcontactdata.PhoneNumber,tblcontactdata.UserIp,tblcontactdata.EmailId,tblcontactdata.Subject,tblcontactdata.Message,tblcontactdata.PostingDate,tblcontactdata.id from tblcontactdata  where tblcontactdata.id=:fid";
              $query = $dbh->prepare($sql);
              $query->bindParam(':fid', $fid, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) :
                foreach ($results as $result) :
              ?>
                  <div id="invoice-customer-details" class="row pt-2">
                    <div class="col-md-6 col-sm-12 text-center text-md-left">
                      <ul class="px-0 list-unstyled">
                        <li class="text-bold-800"><?php echo htmlentities($result->FullName); ?> (IP Address : <?php echo htmlentities($result->UserIp); ?>)</li>
                        <li><b>Numero de telefone: : </b><?php echo htmlentities($result->PhoneNumber); ?></li>
                        <li><b>E-mail: </b><?php echo htmlentities($result->EmailId); ?></li>
                        <li><b>Data da postagem:</b> <?php echo date('d/m/Y H:i:s', strtotime($result->PostingDate)); ?></li>
                      </ul>
                    </div>
                  </div>
                  <div id="invoice-items-details" class="pt-2">
                    <div class="row">
                      <div class="table-responsive col-sm-12">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th scope="row">Assunto:</th>
                              <td>
                                <p><?php echo htmlentities($result->Subject); ?></p>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row">Mensagem:</th>
                              <td>
                                <p><?php echo htmlentities($result->Message); ?></p>
                              </td>
                            </tr>
                            <?php
                            $stmt = "SELECT tbladminremarks.adminRemark, tbladminremarks.remarkDate FROM tbladminremarks WHERE contactFormId = :fid";
                            $query1 = $dbh->prepare($stmt);
                            $query1->bindParam(':fid', $fid, PDO::PARAM_STR);
                            $query1->execute();
                            $resultss = $query1->fetchAll(PDO::FETCH_OBJ);

                            foreach ($resultss as $results) :
                            ?>
                              <tr>
                                <th scope="row">Observações do administrador</th>
                                <td>
                                  <p><?php echo htmlentities($results->adminRemark); ?><br />
                                    <b>Data de Observação:</b> <?php echo date('d/m/Y H:i:s', strtotime($results->remarkDate)); ?>
                                  </p>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                <?php
                  $cnt++;
                endforeach;
              endif;
                ?>
                  </div>
                  <div id="invoice-footer">
                    <div class="row">
                      <div class="col-md-5 col-sm-12 text-center">
                        <button type="button" class="btn btn-outline-warning block btn-lg" data-toggle="modal" data-target="#warning">
                          Adicionar observação
                        </button>
                        <div class="modal fade text-left" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-warning white">
                                <h3 class="modal-title white" id="myModalLabel12"><i class="la la-file"></i> Adicionar observação do administrador aqui</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4><i class="la la-arrow-right"></i> Observação</h4>
                                <form name="remark" method="post">
                                  <p>
                                    <textarea class="form-control" name="remark" rows="6" required></textarea>
                                  </p>
                                  <hr>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" name="submit" class="btn btn-outline-warning">Salvar observação</button> </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>

  </body>

  </html>
<?php endif; ?>