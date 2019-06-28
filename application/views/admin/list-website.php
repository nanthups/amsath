<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $titles; ?> | <?=WEBSITE_NAME?></title>
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
							<li class="active">Update Website</li>
						</ul><!-- /.breadcrumb -->

					</div>
              	<div class="page-content">
						

						<div class="page-header">
						<?php
						
						if($btnaction=='add')
						{
						?>
							<h1>
								Update Website
								
							</h1>
							<?php
							}
							else
							{
							?>
							<h1>
								Update Website
								
							</h1>
							<?php
							}
							?>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<?php
										if(validation_errors()!= false) 
										{
									?>
										<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
												<i class="ace-icon fa fa-times"></i>
											</button>

											<strong>
												<i class="ace-icon fa fa-times"></i>
												Oh snap!
											</strong>
											<ul>
														    <?php echo validation_errors(); ?> 
														</ul>
										</div>
										<?php
										 }
										?>
												</div>
								
                                
                                
								<?php echo validation_errors(); ?> 
                                <div class="space-6"></div>
                                <?php
                                            $success_msg= $this->session->flashdata('success_msgs');
                                            $error_msg= $this->session->flashdata('error_msg');
                                            if($success_msg){ ?>
                                            <div class="alert alert-success">
										
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
												<i class="ace-icon fa fa-times"></i>
											</button>
                                            <?php echo $success_msg; ?>
                                            </div>
                                            <?php } if($error_msg){ ?>
                                            <div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            <strong><i class="fa fa-ban"></i> Oh Snap!</strong></button>
                                            <?php echo $error_msg; ?>
                                            </div>
                                            <?php } ?>
									<?php
							
                                          
											 
                                            ?>

 <form role="form" action="<?=base_url()?>admin/website/list_website/edit" method="post" enctype="multipart/form-data" id="form" >
									<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Enter Page Informations</h4>

												<!-- <div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

												<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</div>-->
													
												</div>
												<input type="hidden" name="id" value="<?=$id?>">
												<div class="widget-body">
												<div class="widget-main">
													 <div class="row">
													<div class="col-md-6 form-group">
                                                         <label for="title">Land Number <span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->land_number?>" name="land_number" id="land_number">
                                                         </div>
													  
													
														<div class="col-md-6 form-group">
                                                         <label for="title">Mobile Number <span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->mobile_number?>" name="mobile_number" id="mobile_number" >
                                                         </div>
														 
														 
														<div class="col-md-6 form-group">
                                                         <label for="title">Email<span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->email?>" name="email" id="email">
                                                         </div>
														 
														 
														 
														<div class="col-md-6 form-group">
                                                         <label for="title">FaceBook Id<span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->facebook_id?>" name="facebook_id" id="facebook_id" >
                                                         </div>
														 
														 
														 
														<div class="col-md-6 form-group">
                                                         <label for="title">Twitter Id <span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->twitter_id?>" name="twitter_id" id="twitter_id">
                                                         </div>
														 
														  
														<div class="col-md-6 form-group">
                                                         <label for="title">Google Id <span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->google_id?>" name="google_id" id="google_id">
                                                         </div>
														 
														 	  
														<div class="col-md-6 form-group">
                                                         <label for="title">Instagram Id <span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->insta_id?>" name="insta_id" id="insta_id">
                                                         </div>
														 
														 	<div class="col-md-6 form-group">
                                                         <label for="title">Youtub Id <span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->youtub_id?>" name="youtub_id" id="youtub_id">
                                                         </div>
														 
														 
														 	<div class="col-md-6 form-group">
                                                         <label for="title">Meta Title<span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->meta_titile?>" name="meta_titile" id="meta_titile">
                                                         </div>
														 
														 
														 	<div class="col-md-6 form-group">
                                                         <label for="title">Meta Description<span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->meta_description?>" name="meta_description" id="meta_description">
                                                         </div>
														 
														 
														 	<div class="col-md-6 form-group">
                                                         <label for="title">Address<span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->address?>" name="address" id="address">
                                                         </div>
														 
														 
														 	<div class="col-md-6 form-group">
                                                         <label for="title">State<span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->state?>" name="state" id="state">
                                                         </div>
														 
														 
														 	<div class="col-md-6 form-group">
                                                         <label for="title">City<span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->city?>" name="city" id="city">
                                                         </div>
														 
														 
														 	<div class="col-md-6 form-group">
                                                         <label for="title">place<span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->place?>" name="place" id="place">
                                                         </div>
														 
														 <div class="col-md-6 form-group">
                                                         <label for="title">Pincode<span class="red"></span></label>
                                                            <input type="text" class="form-control" value="<?=$results[0]->pincode?>" name="pincode" id="pincode">
                                                         </div>

                                                         <input type="hidden" name="id" value="1">

                                                </div>
                                                         
                                                        
                                       
                </div>
                                                        
                                                        
                                                        
                                                        <div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
										
                                            
                                                
                                            <button class="btn btn-info" type="submit" name="Update"><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
                                      
                                         
                                        
										</div>
									</div>
                                    
													</div>
												</div>
											</div>
						
                                      </form>
									
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
					<!-- /.page-content -->
		             
	<?php $this->load->view('admin/includes/footer'); ?> 
	
		</div>
		<!-- /.main-container -->
             <?php $this->load->view('admin/includes/footer-script'); ?> 
		
		<!-- page specific plugin scripts -->


	</body>
</html>
