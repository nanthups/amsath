
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title><?php echo $titles; ?> | <?=WEBSITE_NAME?></title>
	<?php $this->load->view('admin/includes/header-script'); ?> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/bootstrap-datepicker3.min.css"> 

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/plugins/multiselect/multiselect.css">

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
						<li class="active">Add Product</li>
					</ul><!-- /.breadcrumb -->

				</div>
				<div class="page-content">


					<div class="page-header">
						<?php
						
						if($btnaction=='add')
						{
							?>
							<h1>
								Add Product
								
							</h1>
							<?php
						}
						else
						{
							?>
							<h1>
								Edit Product
								
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
							<?php } if($error_msg) { ?>
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
									<strong><i class="fa fa-ban"></i> Oh Snap!</strong></button>
									<?php echo $error_msg; ?>
								</div>
							<?php } ?>
							<?php

							if($btnaction=='edit')
							{
								$form_action = 'admin/add-product/editproduct';
							}
							else if($btnaction=='add')
							{
								$form_action = 'admin/add-product/add';
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
														<div class="row">
															<div class="col-md-6">

																<input type="hidden" value="<?=$id?>" name="id"/>

																<div class="form-group">
																	<label for="productname">Product Name <span class="red">*</span> </label>
																	<input type="text" class="form-control" value="<?=$name?>" name="name" id="name" required />
																</div>

																<div class="form-group">
																	<label for="shdescription">Short Description <span class="red">*</span> </label>
																	<textarea name="short_description" id="short_description" class="form-control" required><?=$short_description?></textarea>
																</div>


																<div class="form-group">
																	<label for="price">Price<span class="red">*</span> </label>
																	<label for="inr">INR </label><input type="text" class="form-control" value="<?=$price_inr?>" name="price_inr" id="price_inr" required />
																</div>

																<div class="form-group">
																	<label for="price">Actual Price<span class="red">*</span> </label>
																	<label for="inr">INR </label> <input type="text" class="form-control" value="<?=$actual_price_inr?>" name="actual_price_inr" id="actual_price_inr" required />
																</div>
																<div class="form-group">
																	<label for="price">Stock<span class="red">*</span> </label>
																	<label for="inr">Units</label><input type="text" class="form-control" value="<?=$in_stock?>" name="in_stock" id="in_stock" required />
																</div>

																<div class="form-group">
																	<label for="available">Available<span class="red">*</span> </label>
																	<select  name="available" class="form-control" required/>
																	<option  selected="selected" value="" > Select </option>
																	<option <?php if($available == "india") echo "selected"; ?> value="india" > India </option>
																	<option  <?php if($available == "worldwide") echo "selected"; ?> value="worldwide" > World wide </option>
																</select>
															</div>

															<div class="form-group">
																<label for="status">Status</label><br />
																<label class="radio-inline"> <input type="radio" value="active" name="status" <?php if($status=='active') {?> checked="checked" <?php } ?> >Yes</label>
																<label class="radio-inline">  <input type="radio" value="inactive" name="status" <?php if($status=='inactive') {?> checked="checked" <?php } ?>  > No</label>
															</div>

															<!-- <div class="form-group">
																<label for="productname">Attribute</label>
																<select class="form-control selectpicker" name="attr_id"   id="attr_id"  data-live-search="true" required >
																	<option value="" selected="selected" >-Select-</option>
																	<?php
																	if($att_cnt>0)
																	{
																		foreach($att as $key=>$val)
																		{
																			?>
																			<option value="<?=$val['id']?>" <?php if($attr_id==$val['id']) { ?> selected="selected" <?php } ?>><?=$val['name']?></option>
																			<?php
																		}
																	}
																	?>
																</select>													
															</div> -->
														
														
														<div class="form-group">
															<label for="status">Gender</label><br />
															<label class="radio-inline"> <input type="radio" value="male" name="gender" <?php if($gender=='male') {?> checked="checked" <?php } ?> >Male</label>
															<label class="radio-inline">  <input type="radio" value="female" name="gender" <?php if($gender=='female') {?> checked="checked" <?php } ?>  > Female</label>
														</div>
														
														
														<div class="form-group">
															<label for="category1">Category Level1<span class="red">*</span> </label>
															<select class="form-control selectpicker" onChange="catlist2(this.value)" name="cat_id1"   id="cat_id1"  data-live-search="true" required />
															<option value="" selected="selected" >-Select-</option>
															<?php
															if($cat1_cnt>0)
															{
																foreach($cat1 as $key=>$val)
																{
																	?>
																	<option value="<?=$val['id']?>" <?php if($cat_id1==$val['id']) { ?> selected="selected" <?php } ?>><?=$val['category']?></option>
																	<?php
																}
															}
															?>
														</select>
													</div>
													

													<div class="form-group">

														<label for="category2"> Category Level2<span class="red">*</span> </label>
														<span id="subcatdiv2">

															<select class="form-control selectpicker" name="cat_id2"   id="cat_id2" data-live-search="true" required />
															<option value="" selected="selected" >-Select-</option>
															<?php
															if($cat_id2!=""){

																if($cat2_cnt>0)
																{
																	foreach($cat2 as $key=>$val1)
																	{
																		?>
																		<option value="<?=$val1['id']?>" <?php if($cat_id2==$val1['id']) { ?> selected="selected" <?php } ?>><?=$val1['category2']?></option>
																		<?php
																	}
																}
															}  
															?>

														</select> 
													</span>
												</div>



												<div class="form-group">
													<label for="productname">Brand</label>
													<select class="form-control selectpicker" name="brand"id="brand"  data-live-search="true" required />
													<option value="" selected="selected" >-Select-</option>
													<?php
													if($brand_cnt>0)
													{
														foreach($brand as $key=>$val)
														{
															?>
															<option value="<?=$val['id']?>" <?php if($brand_id==$val['id']) { ?> selected="selected" <?php } ?>><?=$val['brand_name']?></option>
															<?php
														}
													}
													?>
												</select>


											</div>

											<div class="form-group">
												<label for="productcode">Product Code<span class="red">*</span> </label>
												<input type="text" class="form-control" value="<?=$prod_code?>" name="prod_code" id="prod_code" required />
											</div>

											<div class="form-group" style="padding-bottom:13px;">
												<label for="url_from">URL From</label>
												<textarea  name="url_from" rows="2"  class="form-control"><?=$url_from?></textarea>
											</div>

											<div class="form-group" style="padding-bottom:13px;">
												<label for="url_from">Minimum Quality</label>
												<input type="text" class="form-control" value="<?=$min_qty?>" name="min_qty" id="min_qty">
											</div>

											<div class="form-group">
												<label for="quantity">Quantity Available<span class="red">*</span> </label>
												<input type="text" class="form-control" value="<?=$qty_aval?>" name="qty_aval" id="qty_aval" required />
											</div>

											<div class="form-group" style="padding-bottom:13px;">
												<label for="url_from">Colour</label>
															
												<select class="form-control" name="color[]" id="color" multiple="multiple" size="5">
													<?php
													if($color_cnt>0)
													{
														foreach($clr as $key=>$val)
														{
															?>
															<option value="<?=$val['id']?>" <?php if($color==$val['id']) { ?> selected="selected" <?php } ?>><?=$val['attr_val']?>
															</option>
															<?php
														}
													}
													?>
												</select>
											</div>


												<div class="col-md-6 form-group">
													<label for="productname">Sleeve Styling</label>
													<select class="form-control selectpicker" name="sleeve_styling"  id="sleeve_styling" data-live-search="true" >
														<option value="" selected="selected" >-Select-</option>
														<?php
														if(count($Sleeve_styling) > 0)
														{
															foreach($Sleeve_styling as $val)
															{
																?>
																<option value="<?=$val?>" <?php if($sleeve == $val) { ?> selected="selected" <?php } ?>><?=$val?>
																</option>
																<?php
															}
														}
														?>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="productname">Multipack Set</label>
													<select class="form-control selectpicker" name="multipack_set" id="multipack_set"  data-live-search="true" >
													<option value="" selected="selected" >-Select-</option>
													<?php
													if(count($Multipack_set) > 0)
													{
														foreach($Multipack_set as $val)
														{
															?>
															<option value="<?=$val?>" <?php if($pack==$val) { ?> selected="selected" <?php } ?>><?=$val?>
															</option>
															<?php
														}
													}
													?>

													</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="productname">Occasion</label>
													<select class="form-control selectpicker" name="occasion" id=" 	occasion"  data-live-search="true" >
													<option value="" selected="selected" >-Select-</option>
													<?php
													if(count($Occasion) > 0)
													{
														foreach($Occasion as $val)
														{
															?>
															<option value="<?=$val?>" <?php if($occ==$val) { ?> selected="selected" <?php } ?>><?=$val?></option>
															<?php
														}
													}
													?>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="productname">Main Trend</label>
													<select class="form-control selectpicker" name="main_trend" id="main_trend"  data-live-search="true" >
													<option value="" selected="selected" >-Select-</option>
													<?php
													if(count($Main_trend)>0)
													{
														foreach($Main_trend as $val)
														{
															?>
															<option value="<?=$val?>" <?php if($trend==$val) { ?> selected="selected" <?php } ?>><?=$val?>
															</option>
															<?php
														}
													}
													?>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="productname">Print Pattern Type</label>
													<select class="form-control selectpicker" name="print_pattern_type" id="print_pattern_type"  data-live-search="true" >
													<option value="" selected="selected" >-Select-</option>
													<?php
													if(count($Print_pattern_type) > 0)
													{
														foreach($Print_pattern_type as $val)
														{
															?>
															<option value="<?=$val?>" <?php if($print_pattern==$val) { ?> selected="selected" <?php } ?>><?=$val?></option>
															<?php
														}
													}
													?>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="productname">Neck</label>
													<select class="form-control selectpicker" name="neck" id="neck"  data-live-search="true" >
													<option value="" selected="selected" >-Select-</option>
													<?php
													if(count($Neck) > 0)
													{
														foreach($Neck as $val)
														{
															?>
															<option value="<?=$val?>" <?php if($nec==$val) { ?> selected="selected" <?php } ?>><?=$val?></option>
															<?php
														}
													}
													?>
													</select>
												</div>

												<div class="col-md-6 form-group">
													<label for="productname">Pattern</label>
													<select class="form-control selectpicker" name="pattern" id=" 	pattern"  data-live-search="true" >
													<option value="" selected="selected" >-Select-</option>
													<?php
													if(count($Pattern) > 0)
													{
														foreach($Pattern as $val)
														{
															?>
															<option value="<?=$val?>" <?php if($patt==$val) { ?> selected="selected" <?php } ?>><?=$val?></option>
															<?php
														}
													}
													?>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="productname">Sleeve Length</label>
													<select class="form-control selectpicker" name="sleeve_length" id="sleeve_length"  data-live-search="true" >
													<option value="" selected="selected" >-Select-</option>
													<?php
													if(count($Sleeve_length) > 0)
													{
														foreach($Sleeve_length as $val)
														{
															?>
															<option value="<?=$val?>" <?php if($slev_length==$val) { ?> selected="selected" <?php } ?>><?=$val?></option>
															<?php
														}
													}
													?>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="productname">Wash Care</label>
													<select class="form-control selectpicker" name="wash_care" id=" 	wash_care"  data-live-search="true" >
													<option value="" selected="selected" >-Select-</option>
													<?php
													if(count($Wash_care) > 0)
													{
														foreach($Wash_care as $val)
														{
															?>
															<option value="<?=$val?>" <?php if($wash_care==$val) { ?> selected="selected" <?php } ?>><?=$val?></option>
															<?php
														}
													}
													?>
													</select>
												</div>

												<div class="col-md-6 form-group">
													<label for="productname">Fit</label>
													<select class="form-control selectpicker" name="fit" id="fit"  data-live-search="true" >
													<option value="" selected="selected" >-Select-</option>
													<?php
													if(count($Fit) > 0)
													{
														foreach($Fit as $val)
														{
															?>
															<option value="<?=$val?>" <?php if($fitt == $val) { ?> selected="selected" <?php } ?>><?=$val?></option>
															<?php
														}
													}
													?>
													</select>
												</div>

												<div class="col-md-6 form-group">
													<label for="productname">Length</label>
													<select class="form-control selectpicker" name="length"id=" 	length"  data-live-search="true" >
													<option value="" selected="selected" >-Select-</option>
													<?php
													if(count($Length) > 0)
													{
														foreach($Length as $val)
														{
															?>
															<option value="<?=$val?>" <?php if($lenth==$val) { ?> selected="selected" <?php } ?>><?=$val?></option>
															<?php
														}
													}
													?>
													</select>
												</div>

												<div class="col-md-6 form-group">
													<label for="productname">Fabric</label>
													<select class="form-control selectpicker" name="fabric" id="fabric"  data-live-search="true" >
													<option value="" selected="selected" >-Select-</option>
													<?php
													if(count($Fabric) > 0)
													{
														foreach($Fabric as $val)
														{
															?>

															<option value="<?=$val?>" <?php if($fabrick==$val) { ?> selected="selected" <?php } ?>><?=$val?></option>
															
															<?php
														}
													}
													?>
													</select>
												</div>
											

										</div>


										<div class="col-md-6">




											<div class="form-group">
												<label for="offertext">Offer Text</label>
												<textarea  name="offer_text" rows="2"  class="form-control" ><?=$offer_text?></textarea>
											</div>


											<div class="widget-box">
												<div class="widget-main">
													<div class="form-group">
														<label for="username">Main Image</label>
														<input type="file" name="main_img" id="main_img">
														<div id="imagePreview"></div>

														<?php
														if($main_image!="")
														{
															?>
															<p class="help-block"><img src="<?php echo base_url();?>uploads/small/<?php echo $main_image;?>"/>&nbsp;&nbsp;<a href="<?=site_url('admin/list-product/deleteimgs/'.$val->id."/".$prod_id."/".$val->image);?>" role="button" onClick="return confirm('Do you want to delete this Image?')"><span class="fa fa-trash-o"></span></a></p>

															<input type="hidden" value="<?=$main_image?>" name="main_image"/>
															<?php
														}
														?>
													</div>
												</div>
											</div>	

											<div class="widget-box">
												<div class="widget-main">
													<?php
													if($subimg_cnt!="" && $subimg_cnt>0)
													{
														?>
														<b>Sub Images</b>
														<?php
														foreach($subimg as $row)
														{
																 	// print_r($row->image); exit();
															?>

															<div style="border:1px solid #009900; padding:10px;">
																<div class="form-group">
																	<p class="help-block"><img src="<?php echo base_url();?>uploads/small/<?php echo $row->image;?>" />&nbsp;&nbsp;<a href="<?=$add_url?>/?delimg=<?=$row->id?>&edit=<?=$id?>&page=<?=$page?>" role="button" onClick="return confirm('Do you want to delete this Image?')"><span class="fa fa-trash-o"></span></a></p>
																</div>
															</div>
															<br clear="all" />

															<?php
														}
													}
													?>

													<div id="imageadd">											   
														<div class="form-group">
															<label>Sub Images  (Ctrl to select multiple img)</label>
															<input type="file"  name="image[]" multiple   />
														</div>


													</div>
												</div>
											</div>

											<div class="form-group">
												<label for="cust choice">featured Product<span class="red">*</span> </label><br />
												<label class="radio-inline"> <input type="radio" value="yes" name="cust_choice" <?php if($cust_choice=='yes') {?> checked="checked" <?php } ?> >Yes</label>
												<label class="radio-inline">  <input type="radio" value="no" name="cust_choice" <?php if($cust_choice=='no') {?> checked="checked" <?php } ?>  > No</label>
											</div>

											<div class="form-group">
												<label for="bestsale">Best seller<span class="red">*</span> </label><br />
												<label class="radio-inline"> <input type="radio" value="yes" name="best_sale" <?php if($best_sale=='yes') {?> checked="checked" <?php } ?> >Yes</label>
												<label class="radio-inline">  <input type="radio" value="no" name="best_sale" <?php if($best_sale=='no') {?> checked="checked" <?php } ?>  > No</label>
											</div>

											<div class="form-group">
												<label for="cust choice">New Product<span class="red">*</span> </label><br />
												<label class="radio-inline"> <input type="radio" value="yes" name="show_home" <?php if($show_home=='yes') {?> checked="checked" <?php } ?> >Yes</label>
												<label class="radio-inline">  <input type="radio" value="no" name="show_home" <?php if($show_home=='no') {?> checked="checked" <?php } ?>  > No</label>
											</div>


											<div class="form-group">
												<label for="cust choice">Show New<span class="red">*</span> </label><br />
												<label class="radio-inline"> <input type="radio" value="yes" name="show_new" <?php if($show_new=='yes') {?> checked="checked" <?php } ?> >Yes</label>
												<label class="radio-inline">  <input type="radio" value="no" name="show_new" <?php if($show_new=='no') {?> checked="checked" <?php } ?>  > No</label>
											</div>

											<div class="form-group">
												<label for="cust choice">Deals<span class="red">*</span> </label><br />
												<label class="radio-inline"> <input type="radio" value="yes" name="deal" <?php if($deal=='yes') {?> checked="checked" <?php } ?> >Yes</label>
												<label class="radio-inline">  <input type="radio" value="no" name="deal" <?php if($deal=='no') {?> checked="checked" <?php } ?>  > No</label>
											</div>


											<div class="form-group" style="padding-bottom:13px;">
												<label for="url_from">Deals Text</label>
												<input type="text" class="form-control" value="<?=$deal_text?>" name="deal_text" id="deal_text" >
											</div>


											<div class="form-group" style="padding-bottom:13px;">
												<label for="url_from">Deals End Date</label>
												<input type="text" class="form-control datepicker"  value="<?=$deal_end?>" name="deal_end" id="deal_end" >
											</div>

											<div class="form-group">
												<label for="cust choice">Special Offer</label><br />
												<label class="radio-inline"> <input type="radio" value="yes" name="specail_offer" <?php if($specail_offer=='yes') {?> checked="checked" <?php } ?> >Yes</label>
												<label class="radio-inline">  <input type="radio" value="no" name="specail_offer" <?php if($specail_offer=='no') {?> checked="checked" <?php } ?>  > No</label>
											</div>


											<div class="form-group">
												<label for="cust choice">Special Deals </label><br />
												<label class="radio-inline"> <input type="radio" value="yes" name="special_deal" <?php if($special_deal=='yes') {?> checked="checked" <?php } ?> >Yes</label>
												<label class="radio-inline">  <input type="radio" value="no" name="special_deal" <?php if($special_deal=='no') {?> checked="checked" <?php } ?>  > No</label>
											</div>

											<div class="form-group" style="padding-bottom:13px;">
												<label for="url_from">Brand Text</label>
												<input type="text" class="form-control" value="<?=$brand_text?>" name="brand_text" id="brand_text" >
											</div>


											<div class="form-group" style="padding-bottom:13px;">
												<label for="url_from">Estimated Tax</label>
												<input type="text" class="form-control" value="<?=$estimated_tax?>" name="estimated_tax" id="estimated_tax" >
											</div>


											<div class="form-group" style="padding-bottom:13px;">
												<label for="url_from">Delivery Charge</label>
												<input type="text" class="form-control" value="<?=$delivery_charge?>" name="delivery_charge" id="delivery_charge" >
											</div>

											<div class="form-group" style="padding-bottom:13px;">
												<label for="url_from">Size</label>
												<select class="form-control" name="size[]" id="size" multiple="multiple" size="5">
													<?php
													if($size_cnt>0)
													{
														foreach($siz as $key=>$val)
														{
															?>
															<option value="<?=$val['id']?>" <?php if($size==$val['id']) { ?> selected="selected" <?php } ?>><?=$val['attr_val']?></option>
															<?php
														}
													}
													?>	
												</select>
											</div>



										</div>






										<div class="col-md-12">
											<div class="widget-main">
												<div class="form-group">
													<label for="editor1">Long Description<span class="red">*</span> </label>
													<textarea id="editor1" name="long_description" rows="2"  class="form-control" required><?=$long_description?></textarea>
												</div>
											</div>
										</div>


										<div class="col-md-12">
											<div class="widget-main">
												<div class="form-group">
													<label for="url_from">Specification Details</label>
													<input type="text" class="form-control" name="spec_details" id="spec_details" >
												</div>
											</div>
										</div>


										<div class="col-md-12">
											<div class="widget-main">
												<div class="form-group">
													<label for="specification">Specification<span class="red">*</span> </label>
													<textarea id="editor2" name="specifications" rows="2"  class="form-control" required><?=$specifications?></textarea>
												</div>
											</div>
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
											<a href="<?php echo site_url('admin/list-product');?>"><button class="btn" type="button" name="Cancel" ><i class="ace-icon fa fa-undo bigger-110"></i>Cancel</button></a>

										</div>
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
<script src="<?php echo base_url();?>assets/admin/js/bootstrap-datepicker.min.js" type="text/javascript"></script>





<script src="<?php echo base_url();?>assets/admin/plugins/ckeditor4/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/plugins/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
	$(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                var editor = CKEDITOR.replace('editor1');
                CKFinder.setupCKEditor( editor1, '<?php echo base_url();?>assets/admin/plugins/ckfinder' ) 
            });
        </script>

        <script type="text/javascript">
        	$(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                var editor = CKEDITOR.replace('editor2');
                CKFinder.setupCKEditor( editor2, '<?php echo base_url();?>assets/admin/plugins/ckfinder' ) 
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

        <script>
        	function catlist2(m)
        	{

        		$.ajax({
        			type: "GET",
        			dataType: "html",
        			url: "<?=base_url()?>admin/category2/list_category2_ajax",
        			data: { m : m },
        			success: function (result) {
        				$('#subcatdiv2').html(result);	
        			}
        		});

        	}
        </script>
        <script src="<?php echo base_url();?>assets/admin/plugins/multiselect/jquery.multi-select.js" type="text/javascript"></script>
        <script type="text/javascript">
        	$('#color').multiSelect();
        	var data="<?=$color?>";
        	var dataarray=data.split(",");
        	$("#color").val(dataarray);
        	$("#color").multiSelect("refresh");

        	$('#size').multiSelect();
        	var data="<?=$size?>";

        	var dataarray=data.split(",");

        	$("#size").val(dataarray);
        	$("#size").multiSelect("refresh");
        </script>	






    </body>
    </html>
