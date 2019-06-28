<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>  Dashboard | <?=WEBSITE_NAME?></title>
        <?php $this->load->view('admin/includes/header-script'); ?> 
	<link rel="stylesheet" href="<?=asset_url_admin()?>css/ionicons.min.css" />
    </head>
	<style>
.footer .footer-inner .footer-content 
{
position: absolute;
left: 200px;
right: 10px;
bottom: 4px;
padding: 8px;
line-height: 36px;
border-top: 3px double #E5E5E5;
}

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
								<a href="<?=site_url('admin/home')?>">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

						
					</div>

<div class="page-content">
	<div class="row">
	<div class="col-lg-3 col-xs-6"></div>
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count($result);?></h3>
				<p>Admin Users</p>
             </div>
            <div class="icon">
              <i class="user"><img src="<?=asset_url_admin()?>images/avatars/personadd.png" alt="" width="30%"></i>
            </div>
            <a href="<?php echo site_url('admin/admin-users');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bh-gs">
            <div class="inner">
              <h3><?php echo count($results);?><sup style="font-size: 20px"></sup></h3>

              <p>Pages</p>
            </div>
            <div class="icon">
               <i class="user"><img src="<?=asset_url_admin()?>images/avatars/document.png" alt="" width="30%"></i>
            </div>
            <a href="<?php echo site_url('admin/list-pages');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		  <div class="col-lg-3 col-xs-6"></div>
        </div>
		</div>
		
	
	
		
												
		<div class="space-6"></div>
         </div>

									<div class="vspace-12-sm"></div>

									<!-- /.col -->
								</div><!-- /.row -->

								<!--<div class="hr hr32 hr-dotted"></div>-->
							
								<!-- PAGE CONTENT BEGINS -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div>
			<!-- /.main-content -->

	
 			<?php $this->load->view('admin/includes/footer'); ?> 
	
		</div><!-- /.main-container -->
        <?php $this->load->view('admin/includes/footer-script'); ?> 
	</body>
</html>		

