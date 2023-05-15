<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Farmasi | RSUD Pulang Pisau</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" href="<?php echo base_url('assets/dist') ?>/img/rsudpp.png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/login') ?>/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/login') ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/login') ?>/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/login') ?>/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/login') ?>/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/login') ?>/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/login') ?>/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/login') ?>/css/main.css">
    <!--===============================================================================================-->
</head>

<style type="text/css">
    #txt {
        text-transform: lowercase;
    }
</style>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form action="<?php echo base_url('login/aksi_login'); ?>" method="POST" class="login100-form validate-form">
                    <table>
                        <span class="login100-form-title p-b-36">
                            <h4>FARMASI</h4>
                            <h4>RSUD PULANG PISAU</h4>
                        </span>
                        <span class="login100-form-title p-b-48">
                            <img src="<?php echo base_url('assets/dist') ?>/img/rsudpp.png" height="100" width="100">
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="Masukan Username">
                            <input class="input100" type="text" id="txt" name="username" autocapitalize="none" onkeyup="return forceLower(this);">
                            <span class="focus-input100" data-placeholder="Username"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Masukan Password">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input class="input100" type="password" name="password">
                            <span class="focus-input100" data-placeholder="Password"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn">
                                    Login
                                </button>
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/dist/login') ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/dist/login') ?>/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/dist/login') ?>/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url('assets/dist/login') ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/dist/login') ?>/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/dist/login') ?>/vendor/daterangepicker/moment.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/dist/login') ?>/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/dist/login') ?>/js/main.js"></script>

    <script type="text/javascript">
        function forceLower(strInput) {
            strInput.value = strInput.value.toLowerCase();
        }
    </script>

</body>

</html>
