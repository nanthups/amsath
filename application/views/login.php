<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Amsath Artist | Artists community</title>
  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>assets/front/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
  <!-- FontAwesome icon -->
  <link href="<?php echo base_url();?>assets/front/fontawesome/css/fontawesome-all.css" rel="stylesheet">
  <!-- Fontello icon -->
  <link href="<?php echo base_url();?>assets/front/fontello/css/fontello.css" rel="stylesheet">
  <!--jquery-ui  -->
  <link href="<?php echo base_url();?>assets/front/css/jquery-ui.css" rel="stylesheet">
  <!-- Favicon icon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/front/images/favicon.png?v01">
  <!-- Style CSS -->
  <link href="<?php echo base_url();?>assets/front/css/style.css" rel="stylesheet">
  <style type="text/css">
    .alert {
      padding: 20px;
      background-color: #f44336;
      color: white;
    }

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }
  </style>
</head>
<!-- couple-sign up -->

<body class="couple-bg-image">
  <div class="couple-form">
    <div class="container">
      <div class="row ">
        <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12  ">
          <!-- couple-head -->

          <!-- /.couple-head -->
          <!-- st-tab -->
          <div class="st-tab">

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                <div class="container">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="couple-head">
                      <a href="<?php echo(base_url()); ?>"><img src="<?php echo base_url('assets/front/images/logo-white.png');?>" alt="Wedding Vendor & Supplier Directory HTML Template "></a>
                    </div>
                    <!-- login-form-heading-title  -->
                    <!-- alert box  -->
                    <?php $alert = $this->session->flashdata('alert');
                    if(isset($alert)) { ?>
                      <div class="alert">
                        <span class="closebtn" onClick="this.parentElement.style.display='none';">&times;</span> 
                        <strong><i class="fa fa-ban"></i></strong> <?php echo($alert); ?>
                      </div>
                    <?php } ?>

                    <h3>LoginHere</h3>

                    <!-- /.login-form-heading-title  -->
                    <!-- login-form-->
                    <?php echo form_open_multipart('Site_visitor/login_exe'); ?>
                    <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="control-label sr-only" for="name"></label>
                          <input id="name" type="text" name="name" placeholder="Email" class="form-control" required>
                        </div>
                      </div>		
                      <!-- Text input-->
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group service-form-group">
                          <label class="control-label sr-only" for="passwordlogin"></label>
                          <input id="password" type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                      </div>                                            
                      <!--  Buttons -->
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">                                            
                        <h3 colspan="3" align="center"><input type="submit" class="btn btn-default" name="Sign Up"></h3>
                      </div>
					  <p class="mt-2"> <a href="<?=base_url()?>user/forgotpassword">I forgot my password</a></p>

                    </div>
                    <?php echo form_close(); ?>
                    <!-- /.login-form -->

                      <p class="mt-2"> Are you new here? Create a New Account.<a href="<?php echo site_url('Site_visitor/signup');?>"> Click here</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?php echo base_url();?>assets/front/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url();?>assets/front/js/bootstrap.min.js"></script>
  <!-- jquery-ui -->
  <script src="<?php echo base_url();?>assets/front/js/jquery-ui.js"></script>
  <script src="<?php echo base_url();?>assets/front/js/custom-script.js"></script>

</body>

</html>