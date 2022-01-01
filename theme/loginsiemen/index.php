<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="<?=BASE_URL?>/theme/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
    <title>Login & Daftar | SEIMEN</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../../auth/login_siemen.php" method="POST" class="sign-in-form">
            <h2 class="title">Login SEIMEN</h2>
            <?php 
            session_start();
            if(!empty($_SESSION['error'])){
        ?>
        <p style="color: red;"><?=$_SESSION['errorMessage']?></p>
        <?php 
            unset($_SESSION['errorMessage']);
            unset($_SESSION['error']);
        }?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Kata sandi" name="password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
          </form>

          <form action="../../capeg/register.php" method="POST" class="sign-up-form">
            <h2 class="title">Form Daftar</h2>
            <div class="input-field">
                            <i class="fas fa-user"></i>
                                <input type="text" placeholder="Nama Lengkap" name="nama" autocomplete="off">
                        </div>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                                <input type="text" placeholder="Username" name="username" autocomplete="off">
                        </div>
                        <div class="input-field">
                            <i class="fa fa-whatsapp"></i>
                                <input type="text" placeholder="Whatsapp" name="wa">
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Kata sandi" name="password">
                        </div> 
            <input type="submit" class="btn" value="Daftar" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Baru Disini?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Daftar Sekarang
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sudah Mempunyai Akun?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent-login" id="sign-in-btn">
              Login
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
    <?php session_start();
    if(!empty($_SESSION['regOk'])){ ?>
        <script>
            alert('Registrasi berhasil silahkan Login');
        </script>
    <?php
    unset($_SESSION['regOk']);
     } //endif?>
  </body>
</html>
