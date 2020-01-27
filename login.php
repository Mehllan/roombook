<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Booking System | Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="backend/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-3">
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="card shadow my-5" style="border-radius: 10px;">
        <div class="card-header" style="background-color: #5cd0ed;">
          <h3 class="text-center" style="color: white; padding: 30px; border-radius: 20px;">Sign In</h3>
        </div>
        <br>
        <!-- <form method="post" action="signin.php"> -->
            <div class="card-body">
              <?php if(isset($_SESSION['login_reject'])){ ?>
              <div class="alert alert-warning alert-dismissable fade show" rolw="alert">
                <strong><?php echo $_SESSION['login_reject'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <?php unset($_SESSION['login_reject']); } ?>
        <form method="post" action="signin.php">
          <div class="row my-3">
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-8 col-sm-8">            
                  <input type="text" name="name" class="form-control " style="border-radius: 20px; background-color: #d0d7d9" placeholder="User name">
            </div>
            <div class="col-md-2 col-sm-2"></div>
          </div>
          <div class="row">
            <div class="col-md-2 col-sm-2">
            </div>
            <div class="col-md-8 col-sm-8">
              <input type="password" name="password" class="form-control " style="border-radius: 20px; background-color: #d0d7d9" placeholder="Password">
            </div>
            <div class="col-md-2 col-sm-2"></div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-2 col-sm-2">
            </div>
            <div class="col-md-8 col-sm-8">
              <button class="btn btn-info w-100" style="border-radius: 20px;">SIGN IN</button>
            </div>
            <div class="col-md-2 col-sm-2"></div>
          </div>
          <br><br><br><br><br><br><br>
          <p class="text-center">Don't have an account?</p>
          <p class="text-center"><a href="register.php" style="color: #5cd0ed;">SIGN UP NOW</a></p>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

</html>