<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/assets/images/favicon.png">
    <title><?php echo getInfoRS('nama_sistem')?></title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?php echo base_url(); ?>assets/img/loginbg.jpg) no-repeat center center;">
            <div class="auth-box"><p>
                <div id="loginform">
                    <div class="logo">
                        <span class="db" ><img style="width:100px;" src="<?php echo base_url(); ?>assets/img/aceh.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20"><?php echo getInfoRS('nama_sistem')?></h5>
                        <?php
                $status_login = $this->session->userdata('status_login');
                if (empty($status_login)) {
                    $message = "Silahkan login untuk masuk ke aplikasi";
                } else {
                    $message = $status_login;
                }
                ?>
                                    <p class="login-box-msg" style="color: red;">
                                        <?php echo $message; ?>
                                    </p>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" id="loginform" <?php echo form_open('auth/cheklogin');?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" aria-label="username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" aria-label="password" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3 text-center">
                                    <center><?=$cap_img?></center>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="captcha" class="form-control form-control-lg" placeholder="Masukkan Captcha" required oninvalid="this.setCustomValivdity('Captcha tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center"> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
</body>

</html>