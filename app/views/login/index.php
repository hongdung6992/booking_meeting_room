<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo ROOT_URL ?>/public/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo ROOT_URL ?>/public/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo ROOT_URL ?>/public/plugins/toastr/toastr.min.css">
  <script src="<?php echo ROOT_URL ?>/public/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo ROOT_URL ?>/public/plugins/toastr/toastr.min.js"></script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Sign In</b>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo ROOT_URL ?>/login/checkLogin" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <?php echo errorMessage('email') ?>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <?php echo errorMessage('password') ?>
          </div>
          <div class="col-12 p-0 float-right">
            <input type="submit" class="btn btn-primary btn-block btn-flat" name="sign_in" value="Sign In">
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>

  <?php include_once './app/views/shared/_js.php' ?>
  
</body>

</html>