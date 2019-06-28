<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title; ?> | <?=WEBSITE_NAME?></title>
        <?php $this->load->view('admin/includes/header-script'); ?> 

	</head>

	<body class="skin-2">
			<?php $this->load->view('admin/includes/header'); ?> 
		<div class="main-container ace-save-state" id="main-container">
			
           
			<?php $this->load->view('admin/includes/left-menu'); ?> 
			
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Reset Password</li>
						</ul><!-- /.breadcrumb -->

					</div>
              	<div class="page-content">
						

						<div class="page-header">
							<h1>
								Reset Password
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								

								
                                
                     <?php           
	if($error = $this->session->flashdata('fail')){  ?>
                                                    <div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
												<i class="ace-icon fa fa-times"></i>
											</button>

											<strong>
												<i class="ace-icon fa fa-times"></i>
												Oh snap!
											</strong>

											<?php echo $error; ?>
											<br>
										</div>
                                                    
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                    
                                     <?php
                                       	if($error = $this->session->flashdata('mismatch')) {
                                        ?>
                                         <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Please fix the following errors:</b> <br>
                                             <?php
                                                  
                                                     echo "<div> - ".$error." </div>";
                                                ?>
                                    </div>
   
                                      <?php
                                         } 
                                         ?>
                                        
                                        
                                                    <?php
                                                 if($msg = $this->session->flashdata('sucess')){
													?>
                                                  
                                                    <div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
												<i class="ace-icon fa fa-times"></i>
											</button>

											<strong>
												<i class="ace-icon fa fa-check"></i>
												Sucsess!
											</strong>

											<?php echo $msg; ?>
											<br>
										</div>
                                                    
                                                    <?php
                                                    }
                                                    ?>
                         
                                <div class="space-6"></div>
								<?php
								
							
                                            if($btnaction=='change')
                                            {
											    $form_action = 'admin/admin-users/change';
											 }
											
                                            ?>
                               
	<?php echo form_open('admin/reset-password/change'); ?>
 <form role="form" action="" method="post" enctype="multipart/form-data" >
									<div class="col-md-6 col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Enter Password Informations</h4>

													<!--		<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

												<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</div>-->
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div>
															<label for="username">Old Password</label>
                                                            <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-key"></i>
																</span>
  <input type="password" class="form-control input-mask-phone" value="<?php echo $old_pwd;?>" name="old_pwd" id="old_pwd"  maxlength="20" required />
  
															
															</div>
														</div>

														
														<div>
															 <label for="password">New Password</label>
                   <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-key"></i>
																</span>
    <input type="password" class="form-control input-mask-phone"  name="new_pwd"   id="new_pwd"  value="<?php echo $new_pwd;?>" required  maxlength="20" />
															
															</div>									</div>

													

														<div>
															 <label for="user_type">Confirm Password</label>
                <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-key"></i>
																</span>
  <input type="password" class="form-control input-mask-phone"  name="conf_password"  id="conf_password"  value="<?php echo $conf_password;?>" required  maxlength="20" />
															
															</div>
														</div>
                                                        
                                                        
                                                        <div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
										
                                            
                                            <button type="submit" class="btn btn-info" name="Change"><span class="fa fa-thumbs-o-up"></span>&nbsp;Change</button>
                                         
                                         
                                        
										</div>
									</div>
                                    
													</div>
												</div>
											</div>
										</div>
                                      </form>
									<?php echo form_close(); ?>
										<div class="space-6"></div>

									

										
									</div>

									<div class="vspace-12-sm"></div>

									<!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>

								

								<!-- /.row -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
		
            
            
                                
                                
<?php $this->load->view('admin/includes/footer'); ?> 
	
		</div><!-- /.main-container -->
        <?php $this->load->view('admin/includes/footer-script'); ?> 

		<!-- page specific plugin scripts -->

		
	</body>
</html>
