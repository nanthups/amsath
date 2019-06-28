<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Amsath Artist | Artists community </title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/front/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css">
    <!-- FontAwesome icon -->
    <link href="<?php echo base_url('assets/front/fontawesome/css/fontawesome-all.css');?>" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="<?php echo base_url('assets/front/fontello/css/fontello.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/css/summernote-bs4.css');?>" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/front/images/favicon.png?v01');?>">
    <!-- OwlCarosuel CSS -->
    <link href="<?php echo base_url('assets/front/css/owl.carousel.css');?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/css/owl.theme.default.css');?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/css/custom-style.css');?>" rel="stylesheet">
    <!-- Style CSS -->
    <link href="<?php echo base_url('assets/front/css/style.css');?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/css/offcanvas.css');?>">
</head>

<body class="body-bg">
    <div class="dashboard-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-10 col-md-8 col-sm-12 col-6">
                    <div class="header-logo">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/front/images/logo-white.png');?>" alt="Amsath Artist"></a>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 text-right col-md-4 col-sm-12 col-6">
                    <div class="user-vendor">
                        <div class="dropdown">
                            <a class="dropdown-toggle" id="dropdownMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span class="user-icon">  
                                <img src="uploads/users/<?php echo($users->image); ?>" alt="" class="rounded-circle mb10">
                            </span>
                            <span class="user-vendor-name"> <?php echo($users->fname); ?> </span> 
                        </a>
                        <div class=" dashboard-dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo base_url('user-dashboard');?>">Dashboard</a>
                            <a class="dropdown-item" href="<?php echo base_url('user-profile');?>"> My Profile </a>
                            <a class="dropdown-item" href="<?php echo base_url('logout');?>">Logout</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="offcanvas">
        <span id="icon-toggle" class="fa fa-bars"></span>
    </button>
</div>
<div class="dashboard-wrapper">
    <div class="dashboard-sidebar offcanvas-collapse">
        <div class="vendor-user-profile">
            <div class="vendor-profile-img">
                <img src="uploads/users/<?php echo ($users->image); ?>" alt="" class="rounded-circle"></div>
                <h3 class="vendor-profile-name"> <?php echo ($users->fname); ?> </h3>
                <a href="<?php echo base_url('user-profile-settings');?>" class="edit-link">edit profile</a>
            </div>
            <div class="dashboard-nav chat-sec">
                <ul class="list-unstyled">
                    <li class="<?php echo ($this->router->method==="profile") ? 'active':''; ?>"><a href="<?php echo base_url('user-profile');?>"><span class="dash-nav-icon"><i class="fas fa-user-circle"></i></span>My Profile </a></li>
                    <li class="<?php echo ($this->router->method==="dashboard") ? 'active':''; ?>"><a href="<?php echo base_url('user-dashboard');?>"><span class="dash-nav-icon"><i class="fas fa-compass"></i></span>Dashboard</a></li>
                    <?php if($this->session->userdata('utype') == ('Photographers'||'Models'||'Photo Retoucher')):?>
                    <li class="<?php echo ($this->router->method==="sellfiles" || $this->router->method==="insertFile" || $this->router->method==="returnFile") ? 'active':''; ?>"><a href="<?php echo base_url('user-sell-files');?>"><span class="dash-nav-icon"><i class="fas fa-list-alt"></i> </span> Sell Files / Photos </a></li>
                    <li class="<?php echo ($this->router->method==="sellshop") ? 'active':''; ?>"><a href="<?php echo base_url('user-sell-shop');?>"><span class="dash-nav-icon"><i class="fas fa-list-alt"></i> </span> My Shop </a></li>
                    <li class="<?php echo ($this->router->method==="sellwork") ? 'active':''; ?>"><a href="<?php echo base_url('user-user-works');?>"><span class="dash-nav-icon"><i class="fas fa-image"></i> </span> My Works </a></li>
                    <?php endif; ?>
                    <li class="<?php echo ($this->router->method==="edit_bio" || $this->router->method==="edit_biography" || $this->router->method==="add_biography" || $this->router->method==="manage_bio") ? 'active':''; ?>"><a href="<?php echo base_url('user-bio');?>"><span class="dash-nav-icon"><i class="fas fa-user-circle"></i></span>Edit Biography</a></li>
                    <li class="<?php echo ($this->router->method==="edit_contact") ? 'active':''; ?>"><a href="<?php echo base_url('user-contact');?>"><span class="dash-nav-icon"><i class="fas fa-user-circle"></i></span>Edit Contact Details</a></li>
                    <li class="<?php echo ($this->router->method==="edit_appearance") ? 'active':''; ?>"><a href="<?php echo base_url('user-appearance');?>"><span class="dash-nav-icon"><i class="fas fa-user-circle"></i></span>Edit Appearance Details</a></li>
                    <li class="<?php echo ($this->router->method==="listads" || $this->router->method==="addads") ? 'active':''; ?>"><a href="<?php echo base_url('user-ads-listing');?>"><span class="dash-nav-icon"><i class="fas fa-user-circle"></i></span>Ads Listing </a></li>
                    <li class="<?php echo ($this->router->method==="agreementList" || $this->router->method==="agreementAdd") ? 'active':''; ?>"><a href="<?php echo base_url('user-agreement-list');?>"><span class="dash-nav-icon"><i class="fas fa-user-circle"></i></span>Agreements Listing </a></li>
                    <li class="<?php echo ($this->router->method==="edit_profile") ? 'active':''; ?>"><a href="<?php echo base_url('user-profile-settings');?>"><span class="dash-nav-icon"><i class="fas fa-user-circle"></i></span>Profile Settings </a></li>
                </ul>
            </div>
        </div>