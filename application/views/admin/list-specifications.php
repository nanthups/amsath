<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $titles; ?> | <?=WEBSITE_NAME?></title>
		   <?php $this->load->view('admin/includes/header-script'); ?> 
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
							<li class="active">List Specifiations</li>
						</ul><!-- /.breadcrumb -->

					</div>
              	<div class="page-content">
						

						<div class="page-header">
							<h1>
								List Specifiations
								
							</h1>
						</div><!-- /.page-header -->

				
                                  <div class="row">  
								  
                              <div class="col-sm-12" align="right">  
							  
                                <p>
                             <a class="btn btn-sm btn-success" href="<?php echo site_url('admin/add-specifications/add');?>" ><i class="ace-icon fa fa-save"></i>New</a>  
    						     <a class="btn btn-sm btn-danger" href="javascript:void(0)" onClick="click_button(2)"><i class=" ace-icon fa fa-search"></i>Search</a>  
								 <a class="btn btn-sm btn-yellow" href="<?php echo site_url('admin/list-specifications');?>"><i class="ace-icon fa fa-refresh"></i>Reset</a>    
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
											    $form_action = 'admin/list-specifications/search';
											 }
											 ?>
											
												<div class="row hide_div"  style="display:<?=$srdiv?>"  id="srdiv">					
										<form role="form" action="<?php echo site_url('admin/list-specifications/searchs');?>" method="post" enctype="multipart/form-data" >
									<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Search page</h4>

											</div>

												<div class="widget-body">
													<div class="widget-main">
														<div  class="col-md-6">
															<label for="username">Product Name</label>
                  <select class="form-control selectpicker" name="prod_id"   id="prod_id"  data-live-search="true" required >
                                                           <option value="" selected="selected" >-Select-</option>
                                                            <?php
				                                              if($pro1_cnt>0)
				                                              {
						                                       	foreach($pro1 as $key=>$val)
						                                        {
				                                              ?>
                                                                  <option value="<?=$val['id']?>"><?=$val['name']?></option>
                                                           <?php
						                                        }
					                                          }else{
						                                       	foreach($pro1 as $key=>$val)
						                                        {
				                                              ?>
                                                                  <option value="<?=$val['id']?>"><?=$val['name']?></option>
                                                           <?php
						                                        }
					                                          }
					                                          
					                                          ?>
                                                           </select>
														</div>

														
                                                        
                                                       <br clear="all"   />       
                                                        <div class="clearfix form-actions center">
																	
                                     
                                            <button type="submit" class="btn btn-info btn-sm" name="Search"><span class="fa fa-search  ace-icon"></span>&nbsp;Search</button>
                                         
                                        
										<a class="btn btn-sm" type="reset"  href="<?php echo site_url('admin/list-specifications');?>"><i class="ace-icon fa fa-refresh"></i>Reset	</a>
                                        
										
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
											  <th>Product Name</th>
											  <th>Sleeve Styling</th>
											  <th>Multipack Set</th>
											   <th>Occasion</th>
											  <th>Main Trend</th>  
											  <th>Print or Pattern Type</th>  
											  <th>Neck</th> 
											   <th>Pattern</th>
											   <th>Sleeve Length</th>
											   <th>Wash Care</th>
											   <th>Fit</th>
											   <th>Length</th>
											   <th>Fabric</th>
		                                      <th>Action</th>

												</tr>
											</thead>

											<tbody>
                                            
                                            <?php
										
										if(!empty($results))
										{
										
										  foreach($results as $row)
											  {
											  	$arr_fields = $this->Product_model->get_row('product','*',array('id'=>$row->prod_id1));
											?>
												<tr>
                                                   <td><?php echo  $arr_fields->name; ?></td>
												    <td><?php echo $row->sleeve_styling; ?></td>
													<td><?php echo $row->multipack_set; ?></td>
													<td><?php echo $row->occasion; ?></td>
													<td><?php echo $row->main_trend; ?></td>
													<td><?php echo $row->print_pattern_type; ?></td>
													<td><?php echo $row->neck; ?></td>
													<td><?php echo $row->pattern; ?></td>
													<td><?php echo $row->sleeve_length; ?></td>
													<td><?php echo $row->wash_care; ?></td>
													<td><?php echo $row->fit; ?></td>
													<td><?php echo $row->length; ?></td>
													<td><?php echo $row->fabric; ?></td>

                                                 	
													<td>
												
                                                                                      
                                                  <a href="<?php echo site_url('admin/add-specifications/edit/'.$row->id);?>"  role="button" class="btn btn-xs btn-info" ><i class="ace-icon fa fa-pencil bigger-120"></i></a>
												  <?php
												  if($row->image!="")
												  {
												  ?>
                                                  <a href="<?php echo site_url('admin/list-specifications/delete/'.$row->id."/".$row->image);?>" role="button" onClick="return confirm('Do you want to delete this Specifications?')" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
												  <?php
												  }
												  else
												  {
												  ?>
												    <a href="<?php echo site_url('admin/specifications/list_specifications/delete/'.$row->id);?>" role="button" onClick="return confirm('Do you want to delete this Specifications ?')" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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
		</div><!-- /.main-container -->
       

		<!-- page specific plugin scripts -->


	
		
	</body>
</html>
