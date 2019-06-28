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
							<li class="active">Add Attribute</li>
						</ul><!-- /.breadcrumb -->

					</div>
              	<div class="page-content">
						

						<div class="page-header">
						<?php
						
						if($btnaction=='add')
						{
						?>
							<h1>
								Add Attribute
								
							</h1>
							<?php
							}
							else
							{
							?>
							<h1>
								Edit Attribute
								
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
							
                                           if($btnaction=='edit')
                                            {
											    $form_action = 'admin/add-attribute/edit';
											 }
											 else if($btnaction=='add')
											 {
											    $form_action = 'admin/add-attribute/add';
											 }
											 
                                            ?>

 <form role="form" action="<?=site_url($form_action)?>" method="post" enctype="multipart/form-data" id="form" >
									<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Enter Page Informations</h4>

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
														


														    <div class="form-group">
														    	<input type="hidden" name="id" value="<?=$id?>">
															 <label for="user_type">Attribute  Name</label>
															  <span class="error" style="color:red;">*</span>
                  <input type="text" class="form-control" value="<?php echo $name;?>" name="name" id="name" required />
														</div>
														
														
									  <div class="form-group">
									  <label for="status">Status</label><br />
									  <span class="error" style="color:red;">*</span>

									  <label class="radio-inline"> <input type="radio" value="active" name="status" <?php if($status=='active') {?> checked="checked" <?php } ?> >Yes</label>

									  <label class="radio-inline">  <input type="radio" value="inactive" name="status" <?php if($status=='inactive') {?> checked="checked" <?php } ?>  > No</label>
									</div>
                                                        
                                                        
														</div>
                                                        
                                                        
                                                        
                                                        <div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
										
                                            
                                                   <?php
                                           if($btnaction=='edit')
                                            {
                                            ?>
                                            <button class="btn btn-info" type="submit" name="Update"><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
                                      
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <button type="submit" class="btn btn-info" name="Create"><span class="fa fa-save"></span>&nbsp;Save</button>
                                         
                                         <?php
                                            }
                                            ?>
		<a href="<?php echo site_url('admin/list-attribute');?>"><button class="btn" type="button" name="Cancel" ><i class="ace-icon fa fa-undo bigger-110"></i>Cancel</button></a>
                                        
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
