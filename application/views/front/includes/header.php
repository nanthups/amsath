<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Amsath Artist | Artists community </title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/front/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="<?php echo base_url('assets/front/fontawesome/css/fontawesome-all.css'); ?>" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="<?php echo base_url('assets/front/fontello/css/fontello.css'); ?>" rel="stylesheet">
    <!-- OwlCarosuel CSS -->
    <link href="<?php echo base_url('assets/front/css/owl.carousel.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/css/owl.theme.default.css'); ?>" type="text/css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/front/images/favicon.png?v01'); ?>">
    <!-- Style CSS -->
    <link href="<?php echo base_url('assets/front/css/custom-style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
    <!-- header -->

    <div class="header header-blue fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">
                    <!-- header-logo -->
                    <div class="header-logo">
                        <a href="<?=base_url()?>"><img src="<?=base_url('assets/front/images/logo-white.png');?>" alt="Amsath Artist"></a>
                    </div>
                    <!-- /.header-logo -->
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                    <!-- navigations -->
                    <div id="navigation">
                        <ul>
                            <li><a href="<?=base_url()?>image-list"  title="">Buy Photos</a></li>
                            <li><a href="<?=base_url()?>list-product/1" title="">Buy Cloths</a></li>
                            <li><a href="<?=base_url()?>list-product/5" title="">Buy Fashion Accessories</a></li>
                        </ul>
                    </div>
                    <!-- /.navigations -->
                </div>
                <div class="col-xl-3 col-lg-3 text-right col-md-2 col-sm-12 col-12 d-none d-xl-block d-lg-block">
                    <!-- header-btn -->
                    <div class="header-btn">
                     <a href="<?php echo base_url('sign-up');?>" class="btn btn-primary btn-sm">Sign Up</a>
                     <a href="<?php echo site_url('user-login');?>" class="btn btn-yellow btn-sm ml-3">Login</a>
                 </div>
                 <!-- <div class="cart-notify">
                    <ul class="list-unstyled float-right header-right-menu">
                        <li class="dropdown">
                            <span class="notification" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="number" id="carter"><?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); }else echo 0; ?></span>
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </span>
                            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="product-details">
                                    <span class="cart-nofy-img"><img src="images/prdct1.jpg" alt=""></span>
                                    <span class="cart-nofy-ttl">Women Tee-shirt<br>
                                        <b>Rs. 500</b>
                                    </span>
                                    <br clear="all">
                                </a>
                                <a class="dropdown-item" href="product-details">
                                    <span class="cart-nofy-img"><img src="images/prdct1.jpg" alt=""></span>
                                    <span class="cart-nofy-ttl">Women Tee-shirt<br>
                                        <b>Rs. 500</b>
                                    </span>
                                    <br clear="all">
                                </a>
                                <a class="dropdown-item" href="product-details">
                                    <span class="cart-nofy-img"><img src="images/prdct1.jpg" alt=""></span>
                                    <span class="cart-nofy-ttl">Women Tee-shirt<br>
                                        <b>Rs. 500</b>
                                    </span>
                                    <br clear="all">
                                </a>
                                <a href="<?=base_url()?>cart" class="btn btn-primary btn-sm">View all</a> 
                            </div>
                        </li>
						
						
                    </ul>
					
					
                </div> -->
				
				
                <!-- /.header-btn -->
            </div>
        </div>
    </div>
</div>