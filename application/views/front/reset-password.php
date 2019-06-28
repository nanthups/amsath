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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                        </div>
                                        <!-- login-form-heading-title  -->
                                        
                                        <h3 align="center">FORGOT PASSWORD</h3>
                                        <p></p>
                                        <!-- /.login-form-heading-title  -->
                                        <!-- login-form-->
                                         <form method="post" action="<?=base_url()?>User/forgotpassword" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <label class="control-label sr-only" for="username"></label>
                                                        <input id="text" type="email" name="email" placeholder="Please Enter Your Email " class="form-control" required>
                                                    </div>
                                                </div>
                                                <!-- Text input-->
                                                
                                                <!--  Buttons -->
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                    <button type="submit" name="singlebutton" class="btn btn-default">Change</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /.login-form -->

                                        
                                    </div>
                                </div>
                            </div>
                            
                            <!-- /.register-form -->
                            
                            <!-- /.login-form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.couple-sign up -->
     
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="<?php echo base_url();?>assets/front/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/front/js/bootstrap.min.js"></script>
      <!-- jquery-ui -->
    <script src="<?php echo base_url();?>assets/front/js/jquery-ui.js"></script>
   <script src="<?php echo base_url();?>assets/front/js/custom-script.js"></script>

</body>
</html>