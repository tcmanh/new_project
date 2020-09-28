<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <base href="<?= base_url() ?>" />
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Veterinary</title>
  <link href="<?php echo base_url('resources/images/favicon.png'); ?>" rel="shortcut icon" type="image/x-icon" />

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url() ?>resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?= base_url() ?>resources/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
  <link href="<?= base_url() ?>resources/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <link href="<?= base_url() ?>resources/css/style.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url() ?>resources/css/sb-admin.css" rel="stylesheet">
  <link href="<?= base_url() ?>resources/vendor/toastr-master/build/toastr.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>resources/vendor/select2/select2.min.css" rel="stylesheet">


  <script src="<?= base_url() ?>resources/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>resources/vendor/angularjs/angularjs.min.js"></script>
  <script src="<?= base_url() ?>resources/vendor/moment/moment.min.js"></script>
  <script src="<?= base_url() ?>resources/vendor/toastr-master/build/toastr.min.js"></script>
  <script src="<?= base_url() ?>resources/vendor/select2/select2.min.js"></script>


  <script>
    var base_url = <?= '"' . base_url() . '"'; ?>
  </script>
</head>

<body>
  <div class="login_wrap">
    <div class="container">
      <div class="form_lg">
        <form class="form-signin" action="<?= base_url() ?>login" method="POST">
          <h2 class="form-signin-heading">Đăng Nhập</h2>
          <p><?php
              if ($error == 1) {
                echo "Too Many Login Attempts";
              }
              if ($error == 2) {
                echo "Invalid Login Credentials.";
              }
              ?></p>
          <div class="form-group">
            <input type="username" name="username" class="form-control" placeholder="Tài khoản" required autofocus>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Đăng nhập">
        </form>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url() ?>resources/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>resources/vendor/tether/tether.min.js"></script>
  <script src="<?= base_url() ?>resources/vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?= base_url() ?>resources/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>resources/vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url() ?>resources/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url() ?>resources/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?= base_url() ?>resources/js/sb-admin.min.js"></script>

</body>

</html>