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
							<li class="active">List Category Level2</li>
						</ul><!-- /.breadcrumb -->

					</div>
              	<div class="page-content">
						

						<div class="page-header">
							<h1>
								List Category Level2
								
							</h1>
						</div><!-- /.page-header -->

				
                                  <div class="row">  
								  
                              <div class="col-sm-12" align="right">  
							  
                                <p>
                             <a class="btn btn-sm btn-success" href="<?php echo site_url('admin/add-category2/add');?>" ><i class="ace-icon fa fa-save"></i>New</a>  
    						     <a class="btn btn-sm btn-danger" href="javascript:void(0)" onClick="click_button(2)"><i class=" ace-icon fa fa-search"></i>Search</a>  
								 <a class="btn btn-sm btn-yellow" href="<?php echo site_url('admin/list-category2');?>"><i class="ace-icon fa fa-refresh"></i>Reset</a>    
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
											    $form_action = 'admin/list-category2/search';
											 }
											 ?>
											
												<div class="row hide_div"  style="display:<?=$srdiv?>"  id="srdiv">					
										<form role="form" action="<?php echo site_url('admin/list-category2/searchs');?>" method="post" enctype="multipart/form-data" >
									<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Search page</h4>

											</div>

												<div class="widget-body">
													<div class="widget-main">
														<!-- <div  class="col-md-6">
															<label for="username">Category Level1</label>
                  <select class="form-control selectpicker" name="cat_id1"   id="cat_id1"  data-live-search="true" >
                                                           <option value="" selected="selected" >-Select-</option>
                                                            <?php
				                                              if($cat1_cnt>0)
				                                              {
						                                       	foreach($cat1 as $key=>$val)
						                                        {
				                                              ?>
                                                                  <option value="<?=$val['id']?>"><?=$val['category']?></option>
                                                           <?php
						                                        }
					                                          }else{
						                                       	foreach($cat1 as $key=>$val)
						                                        {
				                                              ?>
                                                                  <option value="<?=$val['id']?>"><?=$val['category']?></option>
                                                           <?php
						                                        }
					                                          }
					                                          
					                                          ?>
                                                           </select>
														</div> -->

														<div  class="col-md-6">
															<label for="username">Category Level2</label>
                  <input type="text" class="form-control" value="<?php echo $category2;?>" placeholder="" name="category2" id="un" />
														</div>

														
                                                        
                                                       <br clear="all"   />       
                                                        <div class="clearfix form-actions center">
																	
                                     
                                            <button type="submit" class="btn btn-info btn-sm" name="Search"><span class="fa fa-search  ace-icon"></span>&nbsp;Search</button>
                                         
                                        
										<a class="btn btn-sm" type="reset"  href="<?php echo site_url('admin/list-category2');?>"><i class="ace-icon fa fa-refresh"></i>Reset	</a>
                                        
										
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
											  <th>Category Level1</th>
											  <th>Category Level2</th>
		                                      <th>Action</th>

												</tr>
											</thead>

											<tbody>
                                            
                                            <?php
										
										if(!empty($results))
										{
										
										  foreach($results as $row)
											  {
											  	$arr_fields = $this->Category2_model->get_row('category1','*',array('id'=>$row->cat_id1));
											?>
												<tr>
                                                   <td><?php echo  $arr_fields->category; ?></td>
												    <td><?php echo $row->category2; ?></td>

                                                 	
													<td>
											

														
                                                                                      
                                                  <a href="<?php echo site_url('admin/add-category2/edit/'.$row->id);?>"  role="button" class="btn btn-xs btn-info" ><i class="ace-icon fa fa-pencil bigger-120"></i></a>
												  <?php
												  if($row->image!="")
												  {
												  ?>
                                                  <a href="<?php echo site_url('admin/list-category2/delete/'.$row->id."/".$row->image);?>" role="button" onClick="return confirm('Do you want to delete this Category?')" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
												  <?php
												  }
												  else
												  {
												  ?>
												    <a href="<?php echo site_url('admin/category2/list_category2/delete/'.$row->id);?>" role="button" onClick="return confirm('Do you want to delete this Category ?')" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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
