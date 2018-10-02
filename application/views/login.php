<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('assets'); ?>/images/favicon.png">
    <title>GELORA - CONTROL PANEL</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url('assets'); ?>/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo site_url('assets'); ?>/css/helper.css" rel="stylesheet">
    <link href="<?php echo site_url('assets'); ?>/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <div style="text-align: center;margin: 0 auto;padding-bottom: 20px">
                                    <span><i class="fa fa-sign-in f-s-50"></i></span>
                                </div>
                                <?php echo __get_error_msg(); ?>
                                <form action="<?php echo site_url('login/logging'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" name="uemail" placeholder="Email" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="upass" placeholder="Password" autocomplete="off">
                                    </div>
                                    <div class="checkbox">
                                        <label>
        										<input type="checkbox" name="remember" value="1"> Remember Me
        									</label>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="<?php echo site_url('assets'); ?>/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo site_url('assets'); ?>/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo site_url('assets'); ?>/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo site_url('assets'); ?>/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo site_url('assets'); ?>/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo site_url('assets'); ?>/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo site_url('assets'); ?>/js/custom.min.js"></script>

</body>

</html>