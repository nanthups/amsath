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
                                            <a href="index.html"><img src="<?php echo base_url();?>assets/front/images/logo-white.png" alt="Wedding Vendor & Supplier Directory HTML Template "></a>
                                        </div>
                                        <!-- login-form-heading-title  -->
                                        <!-- alert box  -->
                                        <?php $alert = $this->session->flashdata('alert');
                                        if(isset($alert)) { ?>
                                          <div class="alert">
                                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                            <strong><i class="fa fa-ban"></i></strong> <?php echo($alert); ?>
                                        </div>
                                    <?php } ?>
                                    <h3>SignUp</h3>
                                    
                                    <!-- /.login-form-heading-title  -->
                                    <!-- login-form-->
                                    <?php echo form_open_multipart('Site_visitor/signup_exe'); ?>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="name"></label>
                                                <input id="name" type="text" name="fname" placeholder="First name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="lastname"></label>
                                                <input id="name" type="text" name="sname" placeholder="Surname" class="form-control" required/>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="lastname"></label>
                                                <input id="email" type="email" name="email" placeholder="Email" class="form-control" required/>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="mobile"></label>
                                                <input id="mobile" type="text" name="mobile" placeholder="Mobile" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group">                                                     
                                              <select class="form-control" id="usertitle" name="type">
                                                <option>---Select---</option>
                                                <option value="Advertiser">Advertiser</option>
                                                <option value="Art Director">Art Director</option>
                                                <option value="Assistant art director">Assistant art director</option>
                                                <option value="Assistant Director ">Assistant Director </option>
                                                <option value="Assistantlocationmanager">Assistant location manager</option>
                                                <option value="Best Boy">Best Boy</option>
                                                <option value="Boom operator">Boom operator</option>
                                                <option value="Breakdown artist">Breakdown artist</option>
                                                <option value="Buyer">Buyer</option>
                                                <option value="Camera Assistant ">Camera Assistant </option>
                                                <option value="Camera Operator">Camera Operator</option>
                                                <option value="Camera Operator-Drone Photography">Camera Operator - Drone Photography</option>
                                                <option value="Camera Operator-Crane">Camera Operator-Crane</option>
                                                <option value="Camera production assistant">Camera production assistant</option>
                                                <option value="Cast PA<">Cast PA</option>
                                                <option value="Casting Director">Casting Director</option>
                                                <option value="Cinematographer">Cinematographer</option>
                                                <option value="Colorist">Colorist</option>
                                                <option value="Community Members ">Community Members </option>
                                                <option value="Composer">Composer </option>
                                                <option value="Compositor">Compositor</option>
                                                <option value="Concept Artist ">Concept Artist </option>
                                                <option value="Conductor">Conductor</option>
                                                <option value="Construction coordinator">Construction coordinator</option>
                                                <option value="Costume buyer">Costume buyer</option>
                                                <option value="Costume designer">Costume designer</option>
                                                <option value="Costume standby">Costume standby</option>
                                                <option value="Creative Director ">Creative Director </option>
                                                <option value="Custom Title ">Custom Title </option>
                                                <option value="Cutter">Cutter</option>
                                                <option value="Data Wrangling">Data Wrangling</option>
                                                <option value="Dialogue editor<">Dialogue editor</option>
                                                <option value="Digital Imaging Technician">Digital Imaging Technician</option>
                                                <option value="Director">Director</option>
                                                <option value="Dolly grip">Dolly grip</option>
                                                <option value="Dubbing Artist ">Dubbing Artist </option>
                                                <option value="Electrician">Electrician</option>
                                                <option value="Event Manger ">Event Manger </option>
                                                <option value="Executive-Production">Executive-Production</option>
                                                <option value="Fashion Designer ">Fashion Designer  </option>
                                                <option value="Film Actor">Film Actor</option>
                                                <option value="Film Actress">Film Actress</option>
                                                <option value="Film Editor">Film Editor</option>
                                                <option value="First Assistant Camera" >First Assistant Camera</option>
                                                <option value="Foley Artist">Foley Artist</option>
                                                <option value="Gaffer">Gaffer</option>
                                                <option value="Graphic artist">Graphic artist</option>
                                                <option value="Greensman">Greensman</option>
                                                <option value="Grip">Grip</option>
                                                <option value="Hair Stylist">Hair Stylist</option>
                                                <option value="Head carpenter">Head carpenter</option>
                                                <option value="Head of Plaster">Head of Plaster</option>
                                                <option value="Illustrator">Illustrator</option>
                                                <option value="Key costumer">Key costumer</option>
                                                <option value="Key Grip">Key Grip</option>
                                                <option value="Key hair">Key hair</option>
                                                <option value="Key make-up artist">Key make-up artist</option>
                                                <option value="Key scenic">Key scenic</option>
                                                <option value="Lead man">Lead man</option>
                                                <option value="Legal counsel">Legal counsel</option>
                                                <option value="Lighting technician">Lighting technician</option>
                                                <option value="Line Producer<">Line Producer</option>
                                                <option value="Location Assistant<">Location Assistant</option>
                                                <option value="Location Manager">Location Manager</option>
                                                <option value="Location Production Assistant<">Location Production Assistant</option>
                                                <option value="Location Scout">Location Scout</option>
                                                <option value="Makeup Artist">Makeup Artist</option>
                                                <option value="Make-up-Supervisor">Make-up-Supervisor</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Matte Painter">Matte Painter</option>
                                                <option value="Models ">Models </option> 
                                                <option value="Motion-Control-Technician">Motion Control Technician</option>
                                                <option value="Music-Director ">Music Director </option>
                                                <option value="Music-Editor">Music Editor</option>
                                                <option value="Music-Preparation">Music Preparation</option>
                                                <option value="Music-Supervisor">Music Supervisor</option>
                                                <option value="Negative-Cutter">Negative Cutter</option>
                                                <option value="New-Face-Actor ">New Face Actor </option>
                                                <option value="New Face Actress">New Face Actress </option>
                                                <option value="New Face Models">New Face Models  </option>
                                                <option value="Photo Retoucher ">Photo Retoucher </option>
                                                <option value="Photographers">Photographers </option> 
                                                <option value="Post-production Supervisor">Post-production Supervisor</option>
                                                <option value="Producer">Producer</option>
                                                <option value="Production">Production</option>
                                                <option value="Production Assistant">Production Assistant</option>
                                                <option value="Production Coordinator">Production Coordinator</option>
                                                <option value="Production Designer">Production Designer</option>
                                                <option value="Production Manager<">Production Manager</option>
                                                <option value="Production sound mixer">Production sound mixer</option>
                                                <option value="Production Stills">Production Stills</option>
                                                <option value="Prop Maker">Prop Maker</option>
                                                <option value="Prop Master">Prop Master</option>
                                                <option value="Publisher">Publisher</option>
                                                <option value="Pyro Technician">Pyro Technician</option>
                                                <option value="Re-recording mixer">Re-recording mixer</option>
                                                <option value="Rotoscope artists">Rotoscope artists</option>
                                                <option value="Scenic Painter">Scenic Painter</option>
                                                <option value="Score Recorder<">Score Recorder</option>
                                                <option value="Script Supervisor ">Script Supervisor </option>
                                                <option value="Second Assistant Camera<">Second Assistant Camera</option>
                                                <option value="Second Assistant Sound">Second Assistant Sound</option>
                                                <option value="Set Construction Coordinator<">Set Construction Coordinator</option>
                                                <option value="Set Decorator<">Set Decorator</option>
                                                <option value="Set Designer">Set Designer</option>
                                                <option value="Set Dresser">Set Dresser</option>
                                                <option value="Short Film Actor">Short Film Actor</option>
                                                <option value="Short Film Actress">Short Film Actress</option>
                                                <option value="Sound Designer">Sound Designer</option>
                                                <option value="Sound Editor">Sound Editor</option>
                                                <option value="Sound Grip">Sound Grip</option>
                                                <option value="Sound Mixer">Sound Mixer</option>
                                                <option value="Sound Recordist ">Sound Recordist </option>
                                                <option value="Studio">Studio</option>
                                                <option value="Special Effects Assistant<">Special Effects Assistant</option>
                                                <option value="Special Effects Coordinator">Special Effects Coordinator</option>
                                                <option value="Special Effects Supervisor<">Special Effects Supervisor</option>
                                                <option value="Special Effects Technician<">Special Effects Technician</option>
                                                <option value="Special FX Makeup">Special FX Makeup</option>
                                                <option value="Special Make-up effects Artist<">Special Make-up effects Artist</option>
                                                <option value="Standby Art Director">Standby Art Director</option>
                                                <option value="Steadicam Operator<">Steadicam Operator</option>
                                                <option value="Steadicam Owner">Steadicam Owner</option>
                                                <option value="Storyboard Artist">Storyboard Artist</option>
                                                <option value="Stunt Coordinator">Stunt Coordinator</option>
                                                <option value="Stunt Driver">Stunt Driver</option>
                                                <option value="Stunt Performer<">Stunt Performer</option>
                                                <option value="System Administrator">System Administrator</option>
                                                <option value="Telecine Colorist">Telecine Colorist</option>
                                                <option value="Teleprompter Operator">Teleprompter Operator</option>
                                                <option value="Television Actor ">Television Actor </option>
                                                <option value="Television Actress">Television Actress</option>
                                                <option value="Transportation Coordinator">Transportation Coordinator</option>
                                                <option value="Transportation Driver<">Transportation Driver</option>
                                                <option value=" Unit Publicist"> Unit Publicist</option>
                                                <option value="Video Assist Operator <">Video Assist Operator </option>
                                                <option value="Video Editor ">Video Editor </option>
                                                <option value="Videographer<">Videographer</option>
                                                <option value="Visual Effects">Visual Effects</option>
                                                <option value="Visual effects Creative Director<">Visual effects Creative Director</option>
                                                <option value="Visual Effects Editor">Visual Effects Editor</option>
                                                <option value="Visual Effects Producer">Visual Effects Producer</option>
                                                <option value="Visual Effects Supervisor">Visual Effects Supervisor</option>
                                                <option value="Wardrobe Stylist">Wardrobe Stylist</option>



                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group service-form-group">

                                            <input id="password" type="file" name="myfile" placeholder="image" class="form-control" required/>
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group service-form-group">
                                            <label class="control-label sr-only" for="passwordlogin"></label>
                                            <input id="password" type="password" name="password" placeholder="Password" class="form-control" required/>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group service-form-group">
                                            <label class="control-label sr-only" for="passwordlogin"></label>
                                            <input id="repassword" type="password" name="repassword" placeholder="Re-Type Password" class="form-control" required/>
                                        </div>
                                    </div>
                                    <!--  Buttons -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">                                            
                                      <input type="submit" class="btn btn-default" name="Sign Up">
                                  </div>
                              </div>
                              <?php echo form_close(); ?>
                              <!-- /.login-form -->

                              <p class="mt-2">Already have an account? Sign in.<a href="<?php echo site_url('user-login'); ?>"> Click here</a></p>
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