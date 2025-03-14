<?php
session_start();
if (strlen($_SESSION['userlogin']) == 0) :
  header('location:index.php');
else :
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

  <!DOCTYPE html>
  <html class="loading" lang="en" data-textdirection="ltr">

  <head>
    <title>Todos os E-mails cosntrutora D&L</title>
    <link rel="icon" href="./app-assets/images/12favicon.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-callout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>

  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/leftbar.php'); ?>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Todos os e-mails</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Todos os e-mails
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <p class="px-1">
                  <div class="table-responsive">
                    <table class="table mb-0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nome:</th>
                          <th>Telefone:</th>
                          <th>Data da postagem:</th>
                          <th>Status:</th>
                          <th>Ação:</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $sql = "SELECT FullName,PhoneNumber,PostingDate,id,Is_Read from tblcontactdata";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) :
                          foreach ($results as $result) :
                        ?>

                            <tr>
                              <th scope="row"><?php echo htmlentities($cnt); ?></th>
                              <td><?php echo htmlentities($result->FullName); ?></td>
                              <td><?php echo htmlentities($result->PhoneNumber); ?></td>
                              <td><?php echo date('d/m/Y H:i:s', strtotime($result->PostingDate)); ?></td>
                              <td><?php if ($result->Is_Read != 1) :
                                    echo htmlentities("E-mail não lido");
                                  else :
                                    echo htmlentities("E-mail lido");
                                  endif;
                                  ?></td>

                              <td>
                                <a href="contact-details.php?cid=<?php echo htmlentities($result->id); ?>"><button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1">Ver detalhes</button></a>

                                <a href='delete-emails.php?id=<?php echo $result->id; ?>' class='-btn btn btn-info btn-min-width btn-glow mr-1 mb-1'>
                                  <i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Delete
                                </a>
                              </td>
                            </tr>
                          <?php
                            $cnt++;
                          endforeach;
                        else : ?>
                          <tr>
                            <td colspan="5" style="color:red; font-size:22px;" align="center">Caixa de e-mails vazia!</td>
                          </tr>
                        <?php
                        endif;
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
    </div>
    </div>
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