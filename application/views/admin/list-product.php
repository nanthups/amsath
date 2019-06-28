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
							<li class="active">List Product</li>
						</ul><!-- /.breadcrumb -->

					</div>
              	<div class="page-content">
						

						<div class="page-header">
							<h1>
								List Product
								
							</h1>
						</div><!-- /.page-header -->

				
                                  <div class="row">  
								  
                              <div class="col-sm-12" align="right">  
							  
                                <p>
                                <a class="btn btn-sm btn-success" href="<?php echo site_url('admin/add-product/add');?>" ><i class="ace-icon fa fa-save"></i>New</a>  
    						     <a class="btn btn-sm btn-danger" href="javascript:void(0)" onClick="click_button(2)"><i class=" ace-icon fa fa-search"></i>Search</a>  
								 <a class="btn btn-sm btn-yellow" href="<?php echo site_url('admin/list-product');?>"><i class="ace-icon fa fa-refresh"></i>Reset</a>    
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
											    $form_action = 'admin/list-product/search';
											 }
											 ?>
											
												<div class="row hide_div"  style="display:<?=$srdiv?>"  id="srdiv">					
										<form role="form" action="<?php echo site_url('admin/list-product/searchs');?>" method="post" enctype="multipart/form-data" >
									<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Search page</h4>

											</div>

												<div class="widget-body">
													<div class="widget-main">
														<div  class="col-md-4">
															<label>Product Code</label>
              	                                        <input type="text" class="form-control"  name="prod_code" value="<?=$prod_code?>"  />
														</div>

															<div  class="col-md-4 form-group">
													    <label>Product Name</label>
              	                                         <input type="text" class="form-control"  name="name"  value="<?=$name?>" />
                                                           </div>
														   

														     <div  class="col-md-4 form-group">
													    <label>Status</label>
														 <select class="form-control" name="status" id="status" >
														  <option value="" selected="selected" >Select</option>
														  <option <?php if($status == "active") echo "selected"; ?> value="active" >Active</option>
														  <option <?php if($status == "inactive") echo "selected"; ?>value="inactive" >Inactive</option>
														  </select>
                                                           </div>


														 <div  class="col-md-4 form-group">
													    <label>Stock</label>
													 <select class="form-control" name="in_stock" id="in_stock" >
													  <option value="" selected="selected" >Select</option>
													  <option <?php if($in_stock == "yes") echo "selected"; ?> value="yes">Yes</option>
													  <option <?php if($in_stock == "no") echo "selected"; ?>value="no" >No</option>
													  </select>
                                                           </div>
<!-- 
                                                            <div  class="col-md-4 form-group">
													    <label for="user_type">Category 1</label>
													 <select class="form-control selectpicker" onChange="catlist1(this.value)" name="cat_id1"   id="cat_id1"  data-live-search="true" />
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
					                                          }
					                                          ?>
                                                           </select>
                                                           </div>

                                                           	 <div  class="col-md-4 form-group">
													    <label for="user_type">Category 2</label>
														   <span id="subcatdiv1">
														 <select class="form-control selectpicker" name="cat_id2"   id="cat_id2" data-live-search="true"/>
                                                           <option value="" selected="selected" >-Select-</option>

														    
                                                           </select> 
														  </span>

                                                           </div>
 -->
														
                                                        
                                                       <br clear="all"   />       
                                                        <div class="clearfix form-actions center">
																	
                                     
                                            <button type="submit" class="btn btn-info btn-sm" name="Search"><span class="fa fa-search  ace-icon"></span>&nbsp;Search</button>
                                         
                                        
										<a class="btn btn-sm" type="reset"  href="<?php echo site_url('admin/list-product');?>"><i class="ace-icon fa fa-refresh"></i>Reset	</a>
                                        
										
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
												<th>Product Img</th>
												<th>Product Name</th>
												 <th>Product Code</th>
												 <th>Category</th>
												 <th>Price</th>
												 <th>Stock</th>
												 <!-- <th>View</th> -->
												 <th>Action</th>
												</tr>
											</thead>

											<tbody>
                                            
                                            <?php
										
										if(!empty($results))
										{
										
										  foreach($results as $row)
											  {
											  	$arr_fields = $this->Category1_model->get_row('category1','*',array('id'=>$row->cat_id1));

											  	$arr_fields1 = $this->Category1_model->get_row('category2','*',array('id'=>$row->cat_id2));
											?>
												<tr>
                                                <td><?php if($row->main_image!=""){?>
                                                <img src="<?php echo base_url();?>uploads/small/<?php echo $row->main_image;?>"><?php } else { "No Image"; } ?></td>
                                                <td><?php echo $row->name; ?></td>
                                                <td><?php echo $row->prod_code; ?></td>
                    							<td><?php echo  $arr_fields->category." &raquo; ".($arr_fields1->category2);?></td>
                    							
                                                
                                                <td>&#8377;<?php echo $row->price_inr; ?></td>
                                                <td><?php echo $row->in_stock; ?></td>

                                                 <!-- <td><a target="_blank" href="<?=$view_url?>/?view=<?=$row->id?>&page=<?=$page?>" role="button" class="btn btn-xs btn-info" ><span class="fa fa-eye"></span></a></td> -->

													<td>
														<a href="<?php echo site_url('admin/add-product/editproduct/'.$row->id);?>"  role="button" class="btn btn-xs btn-info" ><i class="ace-icon fa fa-pencil bigger-120"></i></a>
														  <?php
														  if($row->image!="")
														  {
														  ?>
                                                          <a href="<?php echo site_url('admin/list-product/delete/'.$row->id."/".$row->image);?>" role="button" onClick="return confirm('Do you want to delete this Page?')" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
														  <?php
														  }
														  else
														  {
														  ?>
														    <a href="<?php echo site_url('admin/Product/list_product/delete/'.$row->id);?>" role="button" onClick="return confirm('Do you want to delete this Product?')" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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
<script type="text/javascript">
			jQuery(function($) {
				
					/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
			});
	</script>

	

	<script>
function catlist1(m)
{
	//alert('m'); 
		
			 $.ajax({
				type: "GET",
				dataType: "html",
				url: "<?=base_url()?>admin/category2/search_category2_ajax",
				data: { m : m },
				success: function (result) {
				$('#subcatdiv1').html(result);	
			}
		});
				
}
</script>


		
	</body>
</html>
