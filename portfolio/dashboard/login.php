<?php
include_once("z_db.php");

error_reporting(10);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
  $status = "OK"; //initial status
  $msg = "";
  $username = $_POST['username'];
  $password = $_POST['password'];
  $ufile = $_POST['password'];
  if ($status == "OK") {

    // Retrieve username and password from database according to user's input, preventing sql injection
    $query = "SELECT * FROM admin WHERE (username = :username) AND (password = :password)";

    $stmt = $con->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    $num = $stmt->rowCount();

    // Check username and password match
    if ($num == 1) {
      session_start();
      // Set username session variable
      $_SESSION['username'] = $username;

      $username = $_SESSION['username'];
      print "
       <script language='javascript'>
         window.location = 'index.php';
       </script>";
    } else {
      $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
O Nome de usuário e/ou senha não correspondem.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>"; //printing error if found in validation

    }
  } else {

    $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                " . $msg . "
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>"; //printing error if found in validation

  }
}
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

  <meta charset="utf-8" />
  <title>Construtora| D&L</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="D&L construções" name="descrição" />
  <meta content="D&L construções" name="author Abraão-Martins" />
  <!-- App favicon -->
  <!-- Seus metadados aqui -->
  <?php
  $stmt = $con->prepare("SELECT xfile FROM logo WHERE id ");
  $stmt->execute();
  $tr = $stmt->fetch(PDO::FETCH_ASSOC);
  $xfile = $tr['xfile'];
  ?>
  <link rel="icon" type="image/png" href="uploads/logo/<?php print $xfile; ?>">
  <!-- Layout config Js -->
  <script src="assets/js/layout.js"></script>
  <!-- Bootstrap Css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-color:#8A2BE2;">

  <!-- auth-page wrapper -->
  <div class="auth-page-wrapper  py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class=""></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
      <div class="container w-100">
        <div class="row">
          <div class="col-lg-12">
            <div class="card overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="p-lg-5 p-4 overlay">
                    <div class="bg-overlay"></div>
                    <div class="mb-4">
                      <?php
                      $stmt = $con->prepare("SELECT ufile FROM logo");
                      $stmt->execute();
                      $r = $stmt->fetch(PDO::FETCH_NUM);
                      $ufile = $r[0];

                      ?>
                      <a href="index.html" class="d-block">
                        <img src="uploads/logo/<?php print $ufile; ?>" class="mb-n0" alt="" height="30">
                      </a>
                    </div>
                    <div class="bg-auth">
                      <?php
                      $stmt = $con->prepare("SELECT xfile FROM logo");
                      $stmt->execute();
                      $r = $stmt->fetch(PDO::FETCH_NUM);
                      $xfile = $r[0];

                      ?>
                      <img src="uploads/logo/<?php print $xfile; ?>" class="w-300" alt="" height="170">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="p-lg-5 p-4">
                    <div>
                      <h5 class="text-primary">Bem-vindo !</h5>
                      <p class="text-muted">Faça login para continuar no painel.</p>
                    </div>

                    <div class="mt-4">
                      <?php
                      if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg != "")) {
                        print $errormsg;
                      }
                      ?>
                      <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
                        <div class="mb-3">
                          <label for="username" class="form-label">Usuário</label>
                          <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                        </div>

                        <div class="mb-3">

                          <label class="form-label" for="password-input">Senha</label>
                          <div class="position-relative auth-pass-inputgroup mb-3">
                            <input type="password" class="form-control pe-5" name="password" placeholder="************" id="password-input">

                          </div>
                        </div>
                        <div class="mt-4">
                          <button class="btn btn-success w-100" type="submit">Logar</button>
                        </div>

                        <a class="nav-link mr-2 nav-link-label " href="../index.php">
                          <i class="bi bi-arrow-left"></i> Voltar
                        </a>
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
    <!-- footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center">
              <?php
              $stmt = $con->prepare("SELECT site_footer FROM siteconfig");
              $stmt->execute();
              $r = $stmt->fetch(PDO::FETCH_NUM);
              $site_footer = $r[0];
              ?>
              <p class="mb-0">
                <?php print $site_footer ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- JAVASCRIPT -->
  <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/simplebar/simplebar.min.js"></script>
  <script src="assets/libs/node-waves/waves.min.js"></script>
  <script src="assets/libs/feather-icons/feather.min.js"></script>
  <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
  <script src="assets/js/plugins.js"></script>
  <!-- password-addon init -->
  <script src="assets/js/pages/password-addon.init.js"></script>
</body>

</html>