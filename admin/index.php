<?php include '../lib/autoload.php'; 

error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMPEG | Log in</title>

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
  <div class="card">
    <div class="card-body login-card-body">
    <?php if(!empty($_GET['error'])){?>
      <div class="alert alert-danger alert-dismissible fade show">
        <p>Username atau password salah</p>
        <button class="close" data-dismiss="alert">&times;</button>
      </div>
      <?php } // endif ?>
      <p class="login-box-msg">Silahkan Login !</p>
      <form action="../auth/act_login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
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
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br>
      <p class="mb-1">
        <a href="<?=BASE_URL?>"><i class="fas fa-long-arrow-alt-left"></i> Kembali ke Halaman Utama</a>
      </p>
    </div>
    <!-- /.login-card-body -->
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
