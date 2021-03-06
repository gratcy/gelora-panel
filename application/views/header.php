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
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('assets'); ?>/images/favicon.ico">
    <title>GELORA - CONTROL PANEL</title>

    <link href="<?php echo site_url('assets'); ?>/css/lib/chartist/chartist.min.css" rel="stylesheet">
	<link href="<?php echo site_url('assets'); ?>/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo site_url('assets'); ?>/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url('assets'); ?>/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo site_url('assets'); ?>/css/helper.css" rel="stylesheet">
    <link href="<?php echo site_url('assets'); ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo site_url('assets'); ?>/css/lib/html5-editor/bootstrap-wysihtml5.css" />
    <link href="<?php echo site_url('assets'); ?>/css/lib/dropzone/dropzone.css" rel="stylesheet">
    <link href="<?php echo site_url('assets'); ?>/css/lib/datetimepicker/jquery.datetimepicker.min.css" rel="stylesheet">
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
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo site_url(); ?>">
                        <!-- Logo icon -->
                        <b><img src="<?php echo site_url('assets'); ?>/images/logo.png" style="width:80%" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo site_url('assets'); ?>/images/person-female.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="<?php echo site_url('settings'); ?>"><i class="ti-settings"></i> Setting</a></li>
                                    <li><a href="<?php echo site_url('login/logout'); ?>" onclick="return confirm('<?php echo $this -> permission_lib -> sesresult['uemail']; ?>, are you sure you want to logout?');"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
