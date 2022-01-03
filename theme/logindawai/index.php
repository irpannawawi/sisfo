<?php require_once '../../lib/autoload.php'; ?>
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
    <title>Login | DAWAI</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../../auth/login_dawai.php" method="POST" class="sign-in-form">
            <h2 class="title">Login Dawai</h2>
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

        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Bagaimana Rasanya?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
