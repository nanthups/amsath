<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Amsath Artist </title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/front/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="<?php echo base_url('assets/front/fontawesome/css/fontawesome-all.css');?>" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="<?php echo base_url('assets/front/fontello/css/fontello.css');?>" rel="stylesheet">
    <!-- OwlCarosuel CSS -->
    <link href="<?php echo base_url('assets/front/css/owl.carousel.css');?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/css/owl.theme.default.css');?>" type="text/css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/front/images/favicon.png?v01');?>">
    <!-- Style CSS -->
    <link href="<?php echo base_url('assets/front/css/custom-style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/css/style.css');?>" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <div class="header header-white fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">
                    <!-- header-logo -->
                    <div class="header-logo">
                        <a href="index.html"><img src="images/logo-white.png" alt=""></a>
                    </div>
                    <!-- /.header-logo -->
                </div>
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                    <!-- navigations -->
                    <form id="custom-search-form" class="form-search form-horizontal pull-right">
                        <div class="input-append span12">
                            <input type="text" class="search-query" placeholder="Search here">
                            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-5 col-lg-5 text-right col-md-2 col-sm-12 col-12 d-none d-xl-block d-lg-block">

                    <ul class="list-unstyled float-right header-right-menu">
                        <li>
                            <span class="prof-icon">
                                <img src="images/profile-img.jpg" class="rounded-circle">
                                <span class="status rounded-circle bg-success"></span>
                            </span>
                            <a href=""><?php print_r($this->session->userdata('name')); ?></a>
                        </li>
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li>
                            <a href="">Buy</a>
                        </li>
                        <li class="dropdown notification-ic">
                            <span class="notification" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="number">1</span>
                                <i class="fas fa-bell"></i>
                            </span>
                            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#"><b>Aneesh Balan</b> messaged you</a>
                                <a class="dropdown-item" href="#"><b>Kevin</b> sent you an <b>Agreement</b></a>
                                <a class="dropdown-item" href="#"><b>Jijo</b> followed you</a>
                                <a class="dropdown-item" href="#"><b>Salomi Volker</b> rated you <b>5*</b></a>
                            </div>
                        </li>
                        <li class="dropdown sttings">
                            <span class="notification" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </span>
                            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo site_url('User/chngpwd');?>">changepassword</a>
                                <a class="dropdown-item" href="<?php echo site_url('User/logout');?>">logout</a>
                                
                            </div>
                        </li>
                    </ul>
                    <!-- /.header-btn -->
                </div>
            </div>
        </div>
    </div>