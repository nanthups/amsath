<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $titles; ?> | <?=WEBSITE_NAME?></title>
		   <?php $this->load->view('admin/includes/header-script'); ?> 
		     <script src="<?php echo base_url();?>assets/admin/css/bootstrap-datepicker3.min.css" type="text/javascript"></script>
    </head>
	<style>
	
	</style>

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
							<li class="active">Add Discount Coupon</li>
						</ul><!-- /.breadcrumb -->

					</div>
              	<div class="page-content">
						

						<div class="page-header">
							<h1>
								Add Discount Coupon
								
							</h1>
						</div><!-- /.page-header -->

				
                                  <div class="row">  
								  
                              <div class="col-sm-12" align="right">  
							  
                                <p>
                             <a class="btn btn-sm btn-success" href="<?php echo site_url('admin/add-coupon/add');?>" ><i class="ace-icon fa fa-save"></i>New</a>  
    						     <a class="btn btn-sm btn-danger" href="javascript:void(0)" onClick="click_button(2)"><i class=" ace-icon fa fa-search"></i>Search</a>  
								 <a class="btn btn-sm btn-yellow" href="<?php echo site_url('admin/list-coupon');?>"><i class="ace-icon fa fa-refresh"></i>Reset</a>    
							      </p>
								  
								</div>
						
                                </div>
                                
                                
								<div class="row">
							

                                <div class="space-6"></div>
									<div class="col-xs-12">
                                    
                                
							
								
			
                                <div class="space-6"></div>
														  <?php
                                            $success_msg= $this->session->flashdata('success_msg1');
                                           // $error_msg= $this->session->flashdata('error_msg');
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
                                            </div>
                                            <?php } ?>	
											<?php
							
                                           if($btnaction=='search')
                                            {
											    $form_action = 'admin/list-coupon/search';
											 }
											 ?>
											
												<div class="row hide_div"  style="display:<?=$srdiv?>"  id="srdiv">					
										<form role="form" action="<?php echo site_url('admin/list-coupon/searchs');?>" method="post" enctype="multipart/form-data" >
									<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Search page</h4>

											</div>

												<div class="widget-body">
													<div class="widget-main">
														<div  class="col-md-6">
															<label for="username">Discount Coupon Category</label>
                  <input type="text" class="form-control" value="<?php echo $category;?>"  name="category" id="un" />
														</div>

														<div  class="col-md-6">
															<label for="username">Discount Coupon Code</label>
                  <input type="text" class="form-control" value="<?php echo $coupon_code;?>" placeholder="" name="coupon_code" id="un" />
														</div>

														
                                                        
                                                       <br clear="all"   />       
                                                        <div class="clearfix form-actions center">
																	
                                     
                                            <button type="submit" class="btn btn-info btn-sm" name="Search"><span class="fa fa-search  ace-icon"></span>&nbsp;Search</button>
                                         
                                        
										<a class="btn btn-sm" type="reset"  href="<?php echo site_url('admin/list-coupon');?>"><i class="ace-icon fa fa-refresh"></i>Reset	</a>
                                        
										
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
											      <th>Coupon Category</th>
												  <th>Coupon code</th>
												  <th>Discount Price (INR)</th>
                                                  <th>Coupon Percentage</th>
												  <th>Min Amount (INR)</th>
												  <th>Coupon Count</th>
												  <th>Action</th>

												</tr>
											</thead>

											<tbody>
                                            
                                            <?php
										
										if(!empty($results))
										{
										
										  foreach($results as $row)
											  {
											?>
												<tr>
                                                    <td><?php echo $row->category ; ?></td>
												    <td><?php echo $row->coupon_code; ?></td>
												    <td><?php echo $row->percentage; ?></td>
												    <td><?php echo $row->amount; ?></td>
												    <td><?php echo $row->resamount; ?></td>
												    <td><?php echo $row->numcount; ?></td>

                                                 	
													<td>
												<?php
												if($val->status =='active')
												{
												?>
												<a href="<?=site_url('admin/add-coupon/status/'.$val->id."/" .$val->status);?>" role="button" class="btn btn-xs btn-success" ><i class="ace-icon fa fa-unlock bigger-120"></i></a>
												<?php
												}
												else
												{
												?>
												<a href="<?=site_url('admin/add-coupon/status/'.$val->id."/".$val->status);?>" role="button" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-lock bigger-120"></i></a>
												<?php
												}
												?>

														
                                                                                      
                                                  <a href="<?php echo site_url('admin/add-coupon/editcoupon/'.$row->id);?>"  role="button" class="btn btn-xs btn-info" ><i class="ace-icon fa fa-pencil bigger-120"></i></a>
												  <?php
												  if($row->image!="")
												  {
												  ?>
                                                  <a href="<?php echo site_url('admin/list-coupon/delete/'.$row->id."/".$row->image);?>" role="button" onClick="return confirm('Do you want to delete thisDiscount Coupon?')" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
												  <?php
												  }
												  else
												  {
												  ?>
												    <a href="<?php echo site_url('admin/Coupon/list_coupon/delete/'.$row->id);?>" role="button" onClick="return confirm('Do you want to delete this Coupon ?')" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
													<?php
													}
													?>
															


														
													</td>
												</tr>

											
                                                <?php
											  	  }
												  }
												  else
												  {
												  ?>
												   <div class="space-6"></div>
									<div class="col-xs-12">
                             <div class="table-responsive">
										<table id="simple-table" class="table  table-bordered table-hover">
												  <span id="res"><center>.........RESULT NOT FOUND.......</center></span>
												  </table>
												  </div>
												  </div>
												  </div>
												  <?php
												  }
												  ?>
												
												
												
												
											</tbody>
										</table>
									
</div>
									

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

									<div class="vspace-12-sm"></div>

					
					</div>
			      </div>
                 	
            
                                
                                
 			<?php $this->load->view('admin/includes/footer'); ?> 
	
		</div><!-- /.main-container -->
        <?php $this->load->view('admin/includes/footer-script'); ?> 
	
	<script>
		function click_button(id)
		{
			//alert(id);
			if(id==1)
			{
				$('.hide_div').hide();
				$('#adddiv').show();
			}
			if(id==2)
			{
				$('.hide_div').hide();
				$('#srdiv').show();
			}
		}
		</script>

		<script src="<?php echo base_url();?>assets/admin/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
         <script type="text/javascript">
	$('.datepicker').datepicker(
	{
		autoclose: true,
			todayHighlight: true,
			format: 'dd-mm-yyyy'
			
	}
	);
	</script> 
		</div><!-- /.main-container -->
       

		<!-- page specific plugin scripts -->


	
		
	</body>
</html>
