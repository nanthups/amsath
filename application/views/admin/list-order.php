
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $titles; ?> | <?=WEBSITE_NAME?></title>
 <?php $this->load->view('admin/includes/header-script'); ?> 
<link href="<?php echo base_url();?>assets/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
<style>
.btn-light, .btn-light.focus, .btn-light:focus {
     background-color: #fff!important; 
     border: 1px solid #D5D5D5;
}
.btn-group+.btn, .btn-group>.btn {
    margin: 0 1px 0 0;
     border-width: 1px; 
}
</style>
</head>
<body class="skin-2">	
<?php $this->load->view('admin/includes/header'); ?> 
<div class="main-container ace-save-state" id="main-container">
  <?php $this->load->view('admin/includes/left-menu'); ?> 
  <div class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="#">Home</a> </li>
          <li class="active">Add Orders
            
          </li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Add Orders
           
          </h1>
        </div>
        <!-- /.page-header -->
        
        <div class="row">
          <div class="col-sm-12" align="right">  
							  
                                <p>
                             
    						     <a class="btn btn-sm btn-danger" href="javascript:void(0)" onClick="click_button(2)"><i class=" ace-icon fa fa-search"></i>Search</a>  
								 <a class="btn btn-sm btn-yellow" href="<?php echo site_url('admin/list-order');?>"><i class="ace-icon fa fa-refresh"></i>Reset</a>    
							      </p>
								  
								</div>
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
											    $form_action = 'admin/list-order/search';
											 }
											 ?>
											 
											 <div class="row hide_div"  style="display:<?=$srdiv?>"  id="srdiv">	
                  <form role="form" action="<?php echo site_url('admin/list-order/searchs');?>" method="post" enctype="multipart/form-data">
              <div class="widget-box" id="p" style="display:<?=$display?>">
                <div class="widget-header">
                  <h4 class="widget-title">Search page
                   
                   </h4>
                </div>
                <div class="form-group widget-body">
                  <div class="form-group widget-main">
                    <div class="col-xs-12 col-sm-12">
                      <div  class="form-group col-md-4">
                        <label for="category">User</label>
                        <select class="form-control selectpicker" name="un" id="un" value="<?=$un?>"  data-live-search="true">
                          <option value="" selected="selected" >Select</option>
                          <?php
						 if($pro_count>0)
							{
								 foreach($pro_arr as $key=>$val)
								 {
				  			?>
                          <option value="<?=$val['id']?>" <?php if($un==$val['id']) { ?> selected="selected" <?php } ?> >
                          <?=$objgen->check_tag($val['name'])?>
                          </option>
                          <?php
								}
						}
							?>
                        </select>
						          
                      </div>
                   
                      <div  class="form-group  col-md-4">
                        <label for="category">Status</label>
                        <span id="catdiv">
                        <select class="form-control selectpicker" name="st" id="st" value=""  data-live-search="true">
                          <option value="" selected="selected" >Select</option>
                          <option value="Before Payment" <?php if($st=='Not Paid') { ?> selected="selected" <?php } ?>>Not Paid</option>
                          <option value="Paid" <?php if($st=='Paid') { ?> selected="selected" <?php } ?> >Paid</option>
                          <option value="Booking Cancelled" <?php if($st=='Failed') { ?> selected="selected" <?php } ?> >Failed</option>
                        </select>
                        </span> </div>
						 <div  class="form-group col-md-4">
                        <label for="username">Start Date</label>
                        <?php
                        if($sd=="")
                        {
                        	$sd = "";
                        }
                        else
                        {	
                        	$sd = date("d-m-Y",strtotime($sd));
                        }
                        ?>
                        <input type="text" class="form-control  datepicker" value="<?=$sd?>" name="sd" id="sd"  />
                    </div>
                      <div  class="form-group col-md-4">
                        <label for="username">End Date</label>
                        <?php
                        if($ed=="")
                        {
                        	$ed = "";
                        }
                        else
                        {	
                        	$ed = date("d-m-Y",strtotime($ed));
                        }
                        ?>
                        <input type="text" class="form-control  datepicker" value="<?=$ed?>" name="ed" id="ed"  />
                      </div>
					  <div  class="form-group  col-md-4">
                        <label for="category">Order</label>
                        <span id="catdiv">
                        <select class="form-control selectpicker" name="od" id="od"  data-live-search="true">
                          <option value="" selected="selected" >Select</option>
                          <option value="Yes" <?php if($od=='Yes') { ?> selected="selected" <?php } ?>>Yes</option>
                          <option value="No" <?php if($od=='No') { ?> selected="selected" <?php } ?> >No</option>
                        </select>
                        </span> </div>
                   
                    </div>
                    <div align="center">
                    	<button type="submit" class="btn btn-sm btn-info" name="Search"><span class="fa fa-search"></span>&nbsp;Search</button>
                    	<a class="btn btn-sm" type="reset"  href="<?php echo site_url('admin/list-order');?>"><i class="ace-icon fa fa-refresh"></i>Reset	</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- </form> -->
  <br>

            <!-- Page -->
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
			 <div class="table-responsive"> <br>
              <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Billing Address</th>
                    <th>Shipping Address</th>
                    <th>Email & Phone</th>
                    <th>Order Date</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php
				if($row_count>0)
				{
					foreach($res_arr as $key=>$val)
					{ 
						
					?>
                <tr>
                  <td colspan="12" align="center" style="background:#69AA46;color:#FFFFFF" ><strong>ORDER ID : </strong><?php echo $objgen->check_tag($val['id']); ?> </td>
                </tr>
                <tr <?php if($val['status']=="Failed" ||  $val['status']=="NotPaid") {?> style="background:#FFCC99" <?php } ?>>
                  <td><?php echo $objgen->check_tag($result['name']); ?><br />
                    <?php echo $objgen->check_tag($result1['address1']); ?>, <?php echo $objgen->check_tag($result1['address2']); ?>, <?php echo $objgen->check_tag($result1['city']); ?>,<br />
                    <?php echo $objgen->check_tag($sr_arr['name']); ?>, <?php echo $objgen->check_tag($con_arr['name']); ?> - <?php echo $objgen->check_tag($result1['pincode']); ?><br />
                    <strong>Land Mark : </strong><?php echo $objgen->check_tag($result1['landmark']); ?> <br>
					  <strong>GSTIN : </strong> <?php echo $objgen->check_tag($result1['gst_no']); ?></td>
					
                  <td>
				  <?php
						   /*if($val['ship_id']!=0)
						   {
							   $ship   		      = $objgen->get_Onerow("user_ship_address","AND id=".$val['ship_id']);
							   $con_arr2   		  = $objgen->get_Onerow("countries","AND id=".$ship['ship_country']);
							   $sr_arr2   		  = $objgen->get_Onerow("states","AND id=".$ship['ship_state']);*/
						   ?>
                    <?php echo $objgen->check_tag($result['name']); ?><br />
                    <?php echo $objgen->check_tag($result1['address1']); ?> <?php echo $objgen->check_tag($result1['address2']); ?>, <br />
                    <?php echo $objgen->check_tag($result1['city']); ?>, <?php echo $objgen->check_tag($sr_arr['name']); ?>, <br />
                    <?php echo $objgen->check_tag($con_arr['name']); ?> - <?php echo $objgen->check_tag($result['pincode']); ?> <br />
                    <strong>Land Mark : </strong> <?php echo $objgen->check_tag($result1['landmark']); ?><br />
                    <strong>GSTIN : </strong> <?php echo $objgen->check_tag($result1['gst_no']); ?>
                    <?php
							 // }
							  ?>
                  </td>
                  <td><?php echo $objgen->check_tag($result['email']); ?><br ?>
                  <?php echo $objgen->check_tag($result['phone']); ?></td>
                  <td><?php echo date("d-M-Y",strtotime($val['created_date'])); ?></td>
                  <td><?php
								if($val['discount_price']!="" && $val['discount_price']!=0)
								{
								?>
                    <strong>Coupon : </strong>
                    <?=$val['coupon_used']?>
                    <br />
                    <strong>Discount Amount : </strong>Rs.
                    <?=$val['discount_price']?>
                    <br />
                    <?php
								}
								?>
					
                    <!--<strong>Tax :</strong> Rs.
                    <?=$val['tax_paid']?>
                    <br />-->
                    <strong>Shipping :</strong> Rs.
                    <?=$val['shipping_charge']?>
                    <br />
                    <strong>Total : </strong>Rs.
                    <?=$val['tot_price']?>
                  </td>
                 <td><?php echo $objgen->check_tag($val['status']); ?> <br><br>
                 <span class="btn btn-sm btn-success btn btn-primary btn-xs" href="#modal-chgst<?=$key?>" role="button"data-toggle="modal">Change Status</span></td>
                 
                  <a href="<?php echo site_url('admin/Coupon/list_order/delete/'.$row->id);?>" role="button" onClick="return confirm('Do you want to delete this Coupon ?')" class="btn btn-xs btn-danger" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
                      <br>
                    </td>
                </tr>
                <tr >
                  <td colspan="12" ><div class="table-detail">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12">
                          <div class="space visible-xs"></div>
                          <table id="simple-table" class="table  table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Product Code</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Change Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
								
										?>
                              <tr <?php if($val2['status']=="Failed" ||  $val2['status']=="Not Paid") {?> style="background:#FFCC99" <?php } ?> >
                                <td><?php echo $objgen->check_tag($result2['prod_code']); ?></td>
                                <td><a href="<?=URL?>product/?id=<?=$result2['id']?>&txt=<?php echo $objgen->seoUrl($result2['name']) ?>"  target="_blank"  ><?php echo $objgen->check_tag($result2['name']); ?></a>
                                  <ul style="list-style:none;text-align:left;padding:5px;">
                                    <?php
				
									   if($val2['sel_color']!="")
									   {
									   ?>
                                    <li style="text-align:left;"><strong>Color:</strong> <?php echo $val2['sel_color'];?></li>
                                    <?php
									  	}
										if($val2['sel_size']!="")
									    {
									  ?>
                                    <li style="text-align:left;"><strong>Size: </strong><?php echo $val2['sel_size'];?></li>
                                    <?php
										}
										?>
                                  </ul></td>
                                <td><?=$val2['quantity']?></td>
                                <td>Rs.
                                  <?=$val2['price']?></td>
                                <td>
								<!--<strong>Tax :</strong> Rs.
                                  <?=$val2['tax_paid']?>
                                  <br />-->
                                  <strong>Shipping :</strong> Rs.
                                  <?=$val2['shipping_charge']?>
                                  <br />
                                  <strong>Total : </strong>Rs.
                                  <?=$val2['price']?>
                                </td>
                                <td><?=$val2['status']?>
                                  <?php
									if($val2['status']=='Order Denied')
									{
										echo '<br /><b>Reason:</b> '.$objgen->check_tag($val2['cancel_reason']);
									}
									if($val2['status']=='Order Accepted')
									{
									
									}
									if($val2['status']=='Order Shipped')
									{
									
									}
									if($val2['status']=='Order Delivered')
									{
									 	
									}
									?>
                                  <?php
									if($val2['status']=='Order Delivered' || $val2['status']=='Order Shipped')
									{
									?>
                                  <br />
                                  <a class="btn btn-primary btn-xs"  href="<?=URL?>track-order/?id=<?=$val2['id']?>" target="_blank"><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;Track Order</a>
                                  <?php
									}
										?>
                                </td>
                                <td><span class="btn btn-sm btn-success btn btn-primary btn-xs" href="#modal-usg<?=$key.$key2?>" role="button"data-toggle="modal">Change</span></td>
                              </tr>
                            <div id="modal-usg<?=$key.$key2?>" class="modal fade" tabindex="-1">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header no-padding">
                                    <div class="table-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <span class="white">&times;</span> </button>
                                      Update Status - <strong>ORDER ID : </strong><?php echo $objgen->check_tag($val['id']); ?> </div>
                                  </div>
                                  <div class="modal-body no-padding">
                                    <form role="form" action="" method="post" enctype="multipart/form-data" >
                                      <div class="col-xs-12 col-sm-12">
                                        <div class="widget-box">
                                          <div class="widget-header">
                                            <h4 class="widget-title">Update - <?php echo $objgen->check_tag($result2['prod_code']); ?> : <?php echo $objgen->check_tag($result2['name']); ?></h4>
                                          </div>
                                          <div class="widget-body">
                                            <div class="widget-main">
                                              <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" class="form-control" onChange="showdiv(this.value,'<?=$key.$key2?>')">
                                                  <option value="">Select</option>
                                                  <option value="Order Accepted" <?php if($val2['status']=='Order Accepted') { ?> selected="selected" <?php } ?> >Order Accepted</option>
                                                  <option value="Order Shipped" <?php if($val2['status']=='Order Shipped') { ?> selected="selected" <?php } ?> >Order Shipped</option>
                                                  <option value="Order Delivered" <?php if($val2['status']=='Order Delivered') { ?> selected="selected" <?php } ?> >Order Delivered</option>
                                                  <option value="Order Denied" <?php if($val2['status']=='Order Denied') { ?> selected="selected" <?php } ?> >Order Denied</option>
                                                </select>
                                              </div>
                                            
                                              <div id="courier<?=$key.$key2?>" style="display:<?=$disp2?>" class="clshid">
                                                <div class="form-group">
                                                <label>Cancel Reason</label>
                                                <textarea name="cancel_reason" class="form-control" ><?=$val2['cancel_reason']?></textarea>
                                                </div>
                                              </div>
                                              <div id="ship<?=$key.$key2?>" style="display:<?=$disp1?>" class="clshid">
                                                <?php
												 $where = "";	
												 $cr_count = $objgen->get_AllRowscnt("courier",$where);
												 if($cr_count>0)
												 { 
												 	$cr_arr = $objgen->get_AllRows("courier",0,$cr_count,"name asc",$where);
												 }
												 ?>
                                                <div class="form-group">
                                                  <label>Courier</label>
                                                  <select name="courier" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php
													if($cr_count>0)
													{
													    foreach($cr_arr as $key2=>$val3)
													    {
													?>
                                                    <option value="<?php echo $objgen->check_tag($val3['id']); ?>"<?php if($val3['id']==$val2['courier']) { ?> selected="selected" <?php } ?>><?php echo $objgen->check_tag($val3['name']); ?></option>
                                                    <?php
													     }
													 }
													?>
                                                  </select>
                                                </div>
                                               
                                                <div class="form-group">
                                               <label>Track Link</label>
                                <textarea name="track_ink" class="form-control" ><?=$val2['track_ink']?></textarea>
                                                </div>
                                                </div>
                                              <div class="clearfix form-actions">
                                              <div class="col-md-offset-3 col-md-9">
                                              <input name="id" type="hidden" value="<?=$val2['id']?>">
                                              <button type="submit" class="btn btn-info" name="Update"><span class="fa fa-search"></span>&nbsp;Update</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer no-margin-top">
                                  <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"> <i class="ace-icon fa fa-times"></i> Close </button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <?php
										 }
									  }
									  ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div></td>
                </tr>
                <!-- MODAL FOR CHANGE STATUS -->
                <div id="modal-chgst<?=$key?>" class="modal fade" tabindex="-1">
                	<div class="modal-dialog">
                		<div class="modal-content">
                			<div class="modal-header no-padding">
                				<div class="table-header">
                					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <span class="white">&times;</span> </button>
                					Update Status - <strong>ORDER ID : </strong><?php echo $objgen->check_tag($val['id']); ?> </div>
                				</div>
                				<div class="modal-body no-padding">
                					<form role="form" action="" method="post" enctype="multipart/form-data" >
                						<div class="col-xs-12 col-sm-12">
                							<div class="widget-box">
                								<div class="widget-header">
                									<h4 class="widget-title">Update - <?php echo $objgen->check_tag($result2['prod_code']); ?> : <?php echo $objgen->check_tag($result2['name']); ?></h4>
                								</div>
                								<div class="widget-body">
                									<div class="widget-main">
                										<div class="form-group">
                											<label>Status</label>
                											<select name="pay_status" id="pay_status" class="form-control">
                												<option value="">Select</option>
                												<option value="Paid"  <?php if($val['status']=='Paid') { ?> selected="selected" <?php } ?> >Paid</option>
                												<option value="NotPaid"  <?php if($val['status']=='NotPaid') { ?> selected="selected" <?php } ?> >Not Paid</option				                                                                ><option value="Failed"  <?php if($val['status']=='Failed') { ?> selected="selected" <?php } ?> >Failed</option>
                											</select>
                										    </div>
                										<div class="clearfix form-actions">
                											<div class="col-md-offset-3 col-md-9">
                												<input name="stat_id" type="hidden" value="<?=$val['id']?>">
                												<button type="submit" class="btn btn-info" name="Update_st"><span class="fa fa-refresh"></span>&nbsp;Update</button>
                											</div>
                										</div>
                									</div>
                								</div>
                							</div>
                						</div>
                					</form>
                				</div>
                				<div class="modal-footer no-margin-top">
                					<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"> <i class="ace-icon fa fa-times"></i> Close </button>
                				</div>
                			</div>
                			<!-- /.modal-content -->
                		</div>
                		<!-- /.modal-dialog -->
                	</div>
                	<!-- CHANGE STATUS MODEL END -->
                	<?php
                }
            }
            ?>
        </tbody>
                
                </table>
				<script>
                function showdiv(a,k)
                {
					$('.clshid').hide();
					if(a=='Order Shipped')
					{
						$('#ship'+k).show();
					}
					else if(a=='Order Denied')
					{
						$('#courier'+k).show();
					}
					else if(a=='Order Accepted')
					{
						$('#accepted'+k).show();
					}
					else if(a=='Order Delivered')
					{
						$('#delivered'+k).show();
					}
				}
				</script>
            </div>
            <div class="clearfix">
              <?php
				if($row_count > $pagesize) 
				{
					?>
              <div class="pull-right"> <?php echo $pages; ?> </div>
              <?php
				}
				?>
            </div>
          </div>
        </div>
        <div class="vspace-12-sm"></div>
      </div>
    </div>
  </div>
  <div id="modal-table" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header no-padding">
          <div class="table-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <span class="white">&times;</span> </button>
            Search </div>
        </div>
        <div class="modal-body no-padding">
          <form role="form" action="" method="post" enctype="multipart/form-data" >
            <div class="col-xs-12 col-sm-12">
              <div class="widget-box">
                <div class="widget-header">
                  <h4 class="widget-title">Search
                    <?=$pagehead?>
                  </h4>
                </div>
                <div class="widget-body">
                  <div class="widget-main">
                    <div>
                      <label for="username">Order ID</label>
                      <input type="text" class="form-control" value="<?=$ut?>" name="ut" id="ut"  />
                    </div>
                    <div class="clearfix form-actions">
                      <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-info" name="Search"><span class="fa fa-search"></span>&nbsp;Search</button>
                        <button class="btn" type="reset" name="Reset" ><i class="ace-icon fa fa-erase bigger-110"></i>Reset </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer no-margin-top">
          <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"> <i class="ace-icon fa fa-times"></i> Close </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- Modal for assign order -->
  <?php
	if($row_count>0)
	{
	     foreach($res_arr as $key=>$val)
		 {
	?>
  <div id="assign_model<?=$key?>" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header no-padding">
          <div class="table-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <span class="white">&times;</span> </button>
            Assign Orders </div>
        </div>
        <div class="modal-body no-padding">
          <form role="form" action="" method="post" enctype="multipart/form-data" >
            <div class="col-xs-12 col-sm-12">
              <div class="widget-box">
                <div class="widget-header">
                  <h4 class="widget-title">Assign Order</h4>
                </div>
                <div class="widget-body">
                  <div class="widget-main">
                    <div>
                      <?php
						$ordr_id 	= $objgen->check_tag($val['id']);
						?>
                      <input type="hidden" name="ordr_id" id="ordr_id" value="<?=$ordr_id?>">
                      <label for="username">Assign to :</label>
                      <select class="form-control selectpicker" name="assign_id" id="assign_id" required >
                        <option value="">Select</option>
                        <?php
						$assign_count 	= $objgen->get_AllRowscnt("executives",$where);
						if($assign_count>0)
						{
							$assign_arr = $objgen->get_AllRows("executives",0,$assign_count," id desc",$where);
							foreach($assign_arr as $assign=>$assi)
							{
						?>
                        <option value="<?=$assi['id'] ?>" <?php if($assign_id==$assi['id']) { ?> selected="selected" <?php } ?> >
                        <?= $assi['exe_name']?>
                        </option>
                        <?php
							}
						}
						?>
                      </select>
                      <?php
                      $cdate 	= date('Y-m-d');
                      ?>
                      <input type="hidden" id="cdate" name="cdate" value="<?=$cdate?>">
                    </div>
                    <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-success" name="Assign"> Assign </button>
                    <button class="btn" type="reset" name="Reset" ><i class="ace-icon fa fa-erase bigger-110"></i>Reset </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer no-margin-top">
          <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"> <i class="ace-icon fa fa-times"></i> Close </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php
			}
		}
		?>
  <!-- End of Assign model -->
  <?php $this->load->view('admin/includes/footer'); ?> 
</div>
<!-- /.main-container -->
 <?php $this->load->view('admin/includes/footer-script'); ?> 
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.js"></script>
<link href="<?php echo base_url();?>assets/css/bootstrap-select.css" rel="stylesheet" />
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
<script type="text/javascript">
   $('.datepicker').datepicker(
   {
	    autoclose: true,
            todayHighlight: true,
			format: 'dd-mm-yyyy'
   }
   );
   
</script>
</body>
</html>
