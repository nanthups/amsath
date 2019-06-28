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
						<li class="active">List Agreement Details</li>
					</ul><!-- /.breadcrumb -->

				</div>
				<div class="page-content">


					<div class="page-header">
						<h1>
							List Agreement Details

						</h1>
					</div><!-- /.page-header -->


					<div class="row">  

						<div class="col-sm-12" align="right">  

							<p>

								<a class="btn btn-sm btn-danger" href="javascript:void(0)" onClick="click_button(2)"><i class=" ace-icon fa fa-search"></i>Search</a>  
								<a class="btn btn-sm btn-yellow" href="<?php echo site_url('admin/list-agreement');?>"><i class="ace-icon fa fa-refresh"></i>Reset</a>    
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
									$form_action = 'admin/list-agreement/searchs';
								}
								?>

								<div class="row hide_div"  style="display:<?=$srdiv?>"  id="srdiv">					
									<form role="form" action="<?php echo site_url('admin/list-agreement/searchs');?>" method="post" enctype="multipart/form-data" >
										<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Search Web Links</h4>

												</div>

												<div class="widget-body">
													<div class="widget-main">

														<div  class="col-md-6">
															<label for="username">Agreement Title</label>
															<input type="text" class="form-control" value="<?php echo $agr_title;?>" placeholder="" name="agr_title" id="un" />
														</div>
														
														
														<div  class="col-md-6">
															<label for="username">User Name</label>
															<!-- <input type="text" class="form-control" value="<?php echo $user_id;?>" placeholder="" name="user_id" id="un" /> -->
															<select name="user_id" class="form-control">
																<option value="">Select</option>
																<?php
																if(!empty($users))
																{

																	foreach($users as $row)
																	{
																		?>	
																		<option value="<?=$row->id?>" <?php if($row->id==$us_id){ ?> selected="selected" <?php } ?> ><?=$row->fname?></option>
																		<?php
																	}
																}
																?>
															</select>
														</div>


														<br clear="all"   />       
														<div class="clearfix form-actions center">


															<button type="submit" class="btn btn-info btn-sm" name="Search"><span class="fa fa-search  ace-icon"></span>&nbsp;Search</button>


															<a class="btn btn-sm" type="reset"  href="<?php echo site_url('admin/list-agreement');?>"><i class="ace-icon fa fa-refresh"></i>Reset	</a>


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
														<th>User Name</th> 
														<th>Agreement Title</th>
														<th>Agreement With AS</th>
														<th>Agreement Amount</th>
														<th>Agreement Description</th>
														<th>Agreement Expire Date</th>
														<th>Agreement Delay</th>
														<th>Agreement Complte Date</th>
														<th>Agreement Status</th>
													</tr>
												</thead>

												<tbody>

													<?php

													if(!empty($results))
													{

														foreach($results as $row)
														{

															$arr_fields = $this->Reg_model->get_row('users','fname',array('id'=>$row->user_id));	
															?>
															<tr>
																<td><?php echo $arr_fields->fname; ?></td>
																<td><?php echo $row->agr_title; ?></td>
																<td><?php echo $row->agr_with; ?></td>
																<td><?php echo $row->agr_amt; ?></td>
																<td><?php echo $row->agr_desc; ?></td>
																<td><?php echo $row->agr_exp; ?></td>
																<td><?php echo $row->arg_delay; ?></td>
																<td><?php echo $row->agr_comp; ?></td>
																<td>
																	<?php
																	if($row->agr_status =='Ongoing')
																	{
																		?>
																		<a href="<?=site_url('admin/list-agreement/agr_status/'.$row->uagr_id."/".$val->agr_status);?>" role="button" >
																			<span class="label label-sm label-success">Ongoing</span>
																		</a>
																		<?php
																	}
																	else
																	{
																		?>
																		<a href="<?=site_url('admin/list-agreement/agr_status/'.$row->uagr_id."/".$val->agr_status);?>" role="button" >
																			<span class="label label-sm label-warning">Completed</span>
																		</a>
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
				<script src="<?php echo base_url();?>assets/admin/js/bootstrap-datepicker.min.js" type="text/javascript"></script>




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



</body>
</html>
