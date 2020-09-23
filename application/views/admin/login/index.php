
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Batches | Admin Login </title>
    <!-- <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>admin/assets/img/favicon.ico"/> -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo base_url(); ?>admin/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>admin/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>admin/assets/css/users/login-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->    
</head>
<body class="login">
    <div id="eq-loader">
      <div class="eq-loader-div">
          <div class="eq-loading dual-loader mx-auto mb-5"></div>
      </div>
    </div>
    <form class="form-login" action="<?php echo base_url(); ?>Adminlogin/admin_login" method="POST" enctype="multipart/form-data" >
        <div class="row">
            
            <div class="col-md-12 text-center mb-4">
                <!-- <img alt="logo" src="<?php echo base_url(); ?>admin/assets/img/payla.png" class="theme-logo"> -->
            </div>
<div class="col-md-12 text-center mb-4">
    <h4 style="color: white;">Admin Login</h4>
      <?php if( $error = $this->session->flashdata('login_error')): ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-dismissible alert-danger">
          <?= $error ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
           <div class="col-md-12">
                
                <label for="inputEmail" class="sr-only">Email</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-inputEmail"><i class="flaticon-user-7"></i> </span>
                    </div>
                    <input type="email" id="username" class="form-control" name="username" placeholder="username" aria-describedby="inputEmail" required >
                </div>
                <label for="inputPassword" class="sr-only">Password</label>            
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-inputPassword"><i class="flaticon-key-2"></i> </span>
                    </div>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" aria-describedby="inputPassword" name="password" required >
                </div>   
                <button class="btn btn-lg btn-gradient-warning btn-block btn-rounded mb-4 mt-5" type="submit" style="background: #00d9fe !important;">Login</button>
            </div>
        </div>
    </form>   
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?php echo base_url(); ?>admin/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>admin/assets/js/loader.js"></script>
    <script src="<?php echo base_url(); ?>admin/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>admin/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>