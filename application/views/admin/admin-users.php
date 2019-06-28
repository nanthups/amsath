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
								<a href="<?=site_url('admin/home')?>">Home</a>
							</li>
							<li class="active"><?php echo $title; ?> </li>
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								<?php echo $title; ?> 
								
							</h1>
						</div><!-- /.page-header -->

				
                                  <div class="row">  
								  
                              <div class="col-sm-12" align="right">  
							  
                                <p>
                                <a class="btn btn-sm btn-success" href="javascript:void(0)" onClick="click_button(1)"><i class="ace-icon fa fa-save"></i>New</a>  
    						     <a class="btn btn-sm btn-danger" href="javascript:void(0)" onClick="click_button(2)"><i class=" ace-icon fa fa-search"></i>Search</a>  
								 <a class="btn btn-sm btn-yellow" href="<?=site_url('admin/admin-users')?>"><i class="ace-icon fa fa-refresh"></i>Reset</a>    
							      </p>
								  
								</div>
						
                                </div>
                                
                                
								<div class="row">
			
                     			<div class="col-xs-12">
								
								 <?php
									 $success_msg= $this->session->flashdata('success_msg');	
									  //$error_msg= $this->session->flashdata('error_msg1');								
									if($success_msg!="") 
									{ 
									?>
								 	<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
												<i class="ace-icon fa fa-times"></i>
											</button>

											<strong>
												<i class="ace-icon fa fa-check"></i>
												Sucsess!
											</strong>

											<?php echo $success_msg; ?>
											<br>
										</div>
								  <?php 
								  } 
								  if($error_msg!="")
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

											<?php echo $error_msg; ?>
											<br>
										</div>
								<?php } ?>
                                    
                       
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
									</div>
									<div class="row hide_div" style="display:<?=$adddiv?>" id="adddiv">
			
                                <div class="space-6"></div>
									 <?php
							
                                            if($btnaction=='update')
                                            {
											    $form_action = 'admin/admin-users/update';
											 }
											 else if($btnaction=='add')
											 {
											    $form_action = 'admin/admin-users/add';
											 }
											 else if($btnaction=='')
											 {
											    $form_action = 'admin/admin-users/add';
											 }
								
                                            ?>
										
				<form role="form" action="<?=site_url($form_action)?>" method="post" enctype="multipart/form-data" >
									<div class="col-md-12 col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title"><?php echo $title; ?>  Informations</h4>
													<input type="hidden" name="id" value="<?php echo $id;?>">

												</div>

												<div class="widget-body">
													<div class="widget-main">
													
														<div  class="col-md-4">
															<label for="username">Username</label>
                  <input type="text" class="form-control" value="<?php if(isset($username)){ echo $username;}else{ };?>" name="username" id="username"  required />
														</div>

														
														<div  class="col-md-4">
															 <label for="password">Password</label>
                   <input type="password" class="form-control"  name="password" id="password" value="<?php if(isset($de)){ echo $de;}else{ };?>"   maxlength="20" required />
														</div>

													

														<div class="col-md-4">
															 <label for="user_type">User Type</label>
                 <select class="form-control" name="user_type" id="user_type" value="<?php echo set_value('usertype');?>">
				 <option value="">Select</option>
                <option value="staff" <?php echo set_select('usertype','staff', ( !empty($usertype) && $usertype == "staff" ? TRUE : FALSE )); ?>>Staff</option>
				<option value="admin" <?php echo set_select('usertype','admin', ( !empty($usertype) && $usertype == "admin" ? TRUE : FALSE )); ?>>Super Admin</option>
				<option value="controller" <?php echo set_select('usertype','controller', ( !empty($usertype) && $usertype == "controller" ? TRUE : FALSE )); ?>>Controller</option>
				<option value="executive" <?php echo set_select('usertype','executive', ( !empty($usertype) && $usertype == "executive" ? TRUE : FALSE )); ?>>Executive</option>
				<option value="monitor" <?php echo set_select('usertype','monitor', ( !empty($usertype) && $usertype == "monitor" ? TRUE : FALSE )); ?>> Monitor</option>
                                            </select>
														</div>
                                                        
                                           <br clear="all"   />           
                                    <div class="clearfix form-actions center">
							
										
                                            
                                           <?php
								
                                               if($btnaction=='update')
                                            {
                                            ?>
                                            <button class="btn btn-info btn-sm" type="submit" name="Update"><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
                                      
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <button type="submit" class="btn btn-info btn-sm" name="Create"><span class="fa fa-save  ace-icon"></span>&nbsp;Save</button>
                                         
                                         <?php
                                            }
                                            ?>
											<a class="btn btn-sm" type="reset"  href="<?=site_url('admin/admin-users');?>"><i class="ace-icon fa fa-undo"></i>Cancel	</a>
                                        
									
									</div>
                                    
													</div>
												</div>
											</div>
										</div>
                                      </form>
								
									</div>  
									
									<div class="row hide_div"  style="display:<?=$srdiv?>"  id="srdiv">
			
                                <div class="space-6"></div>
																				
										<form role="form" action="<?php echo site_url('admin/admin-user/searchs');?>" method="post" enctype="multipart/form-data" >
									<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Search <?=$title?></h4>

											</div>

												<div class="widget-body">
													<div class="widget-main">
														<div  class="col-md-6">
															<label for="username">Username</label>
                  <input type="text" class="form-control" value="<?php echo $usernames;?>" name="usernames" id="un"  />
														</div>

														<div  class="col-md-6">
															 <label for="user_type">User Type</label>
                  <select class="form-control" name="usertype" id="ut" value="<?php echo $usertype;?>">
				  
                <option value="">Select</option>
				<option value="staff" <?php echo set_select('usertype','staff', ( !empty($usertype) && $usertype == "staff" ? TRUE : FALSE )); ?>>Staff</option>
				<option value="admin" <?php echo set_select('usertype','admin', ( !empty($usertype) && $usertype == "admin" ? TRUE : FALSE )); ?>>Super Admin</option>
				<option value="controller" <?php echo set_select('usertype','controller', ( !empty($usertype) && $usertype == "controller" ? TRUE : FALSE )); ?>>Controller</option>
				<option value="executive" <?php echo set_select('usertype','executive', ( !empty($usertype) && $usertype == "executive" ? TRUE : FALSE )); ?>>Executive</option>
				<option value="monitor" <?php echo set_select('usertype','monitor', ( !empty($usertype) && $usertype == "monitor" ? TRUE : FALSE )); ?>> Monitor</option>
				 
                                              
                                            </select>
														</div>
                                                        
                                                       <br clear="all"   />       
                                                        <div class="clearfix form-actions center">
																	
                                     
                                            <button type="submit" class="btn btn-info btn-sm" name="Search"><span class="fa fa-search  ace-icon"></span>&nbsp;Search</button>
                                         
                                        
										<a class="btn btn-sm" type="reset"  href="<?=site_url('admin/admin-users')?>"><i class="ace-icon fa fa-refresh"></i>Reset	</a>
                                        
										
									</div>
                                    
													</div>
												</div>
											</div>
										</div>
                                      </form>	
								
								</div>		
							<div class="row">
			
                                <div class="space-6"></div>
									<div class="col-xs-12">						
                            <div class="table-responsive">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													
													
													<th>Username</th>
													<th>User Type</th>
                                                    <th>Status</th>
													<th class="detail-col">Password</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                            
                                            <?php
									
										if($results)
										{
										  foreach($results as $key=>$val)
											  {
											  $pass=$val->password;
											  $password=  $this->password->decrypt_password($pass);
											  
											?>
												<tr>
                                                    <td><?php echo $val->username; ?></td>
                                                    <td><?php echo $val->user_type; ?></td>
                                                    <td>
												<?php
												if($val->status =='active')
												{
												?>
                                                <a href="<?=site_url('admin/admin-users/status/'.$val->id."/".$val->status);?>" role="button" >
												<span class="label label-sm label-success">Active</span>
                                                </a>
												<?php
												}
												else
												{
												?>
                                                <a href="<?=site_url('admin/admin-users/status/'.$val->id."/".$val->status);?>" role="button" >
												<span class="label label-sm label-warning">Inactive</span>
                                                </a>
												<?php
												}
												?>
												</td>
													<td class="center">
														<div class="action-buttons">
															<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
																<i class="ace-icon fa fa-angle-double-down"></i>
																<span class="sr-only">Details</span>
															</a>
														</div>
													</td>
													<td>
																							
													            <?php
												if($val->status =='active')
												{
												?>
												<a href="<?=site_url('admin/admin-users/status/'.$val->id."/" .$val->status);?>" role="button" class="btn btn-xs btn-success" ><i class="ace-icon fa fa-unlock bigger-120"></i></a>
												<?php
												}
												else
												{
												?>
												<a href="<?=site_url('admin/admin-users/status/'.$val->id."/".$val->status);?>" role="button" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-lock bigger-120"></i></a>
												<?php
												}
												?>
                                                                                              
                                                          <a href="<?=site_url('admin/admin-users/update/'.$val->id);?>" role="button" class="btn btn-xs btn-info" ><i class="ace-icon fa fa-pencil bigger-120"></i></a>
                                                          <a href="<?php echo site_url('admin/admin-users/delete/'.$val->id);?>" role="button" onClick="return confirm('Do you want to delete this User?')" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
															

												
														
													</td>
												</tr>

												<tr class="detail-row">
													<td colspan="8">
														<div class="table-detail">
															<div class="row">
																
																<div class="col-xs-12 col-sm-12">
																	<div class="space visible-xs"></div>

																	<div class="profile-user-info profile-user-info-striped">
																		<div class="profile-info-row">
																			<div class="profile-info-name"> Password </div>

																			<div class="profile-info-value">
																			
																				<span><?=$password;?></span>
																			</div>
																		</div>

																	</div>
																</div>

																
															</div>
														</div>
													</td>
												</tr>
                                                <?php
											  	  }
												}
												  else
												  {
												  ?>
												   
									  <div class="space-6"></div>
										<table id="simple-table" class="table  table-bordered table-hover">
												  <span id="res"><center>.........RESULT NOT FOUND.......</center></span>
												  </table>
												 
												
												 
												  
												  <?php
												  }
												  ?>
												
												
											</tbody>
										</table>
									</div>
									</tbody>
								

									

									 <div class="clearfix">
            <?php
									if($links) 
									{
									?>
									<div class="pull-right">
	                             
											    		
												<?php echo $links; ?>

											
									
									</div>
									<?php
										 }
									?>
            
            						</div>
										
									</div>
                                    
                                    </div>
									</tbody>

									<div class="vspace-12-sm"></div>

					
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
 			<?php $this->load->view('admin/includes/footer'); ?> 
	
		</div><!-- /.main-container -->
        <?php $this->load->view('admin/includes/footer-script'); ?> 
	</body>
</html>



			

