<?php include '../lib/autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=BASE_URL?>/theme/adminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=BASE_URL?>/theme/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- <?=BASE_URL?>/Theme style -->
  <link rel="stylesheet" href="<?=BASE_URL?>/theme/adminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition bg-secondary">
<div class="login-box" style="margin: 0px auto; margin-top: 40px; ">
  <div class="col-5" style="margin: 0px auto;">
    <img src="<?=BASE_URL?>/assets/logo.png" alt="" class="img-fluid">
  </div>
  <div class="col-12">
    <h4 align="center">RUMAH SAKIT BHAYANGKARA PALEMBANG</h4>
  </div>
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-body">
      <?php if(!empty($_GET['error'])){?>
      <div class="alert alert-danger alert-dismissible fade show">
        <p>Username atau password salah</p>
        <button class="close" data-dismiss="alert">&times;</button>
      </div>
      <?php } // endif ?>
      <p class="login-box-msg">Silahkan Login</p>
      <form action="../auth/act_login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=BASE_URL?>/theme/adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=BASE_URL?>/theme/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=BASE_URL?>/theme/adminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
