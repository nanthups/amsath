
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $page_var['title']; ?> | <?=WEBSITE_NAME?></title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		
		  <?php echo $html_head; ?>

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?=asset_url_admin()?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

     	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?=asset_url_admin()?>assets/js/html5shiv.min.js"></script>
		<script src="<?=asset_url_admin()?>assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="skin-2">
	
	<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?=site_url('admin')?>" class="navbar-brand">
						<small>
							<i class="fa fa-home"></i>
							<?=WEBSITE_NAME?>
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?=asset_url_admin()?>images/avatars/avatar5.png" alt="<?=ucfirst($page_var['username'])?>" />
								<span class="user-info">
									<small>Welcome</small><?=ucfirst($page_var['username'])?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?=site_url('admin/reset-password')?>">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?=site_url('admin/logout')?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar  responsive  ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<a class="btn btn-danger" href="<?=site_url('admin')?>">
							<i class="ace-icon fa fa-cogs"></i>
						</a>
						
						<a class="btn btn-warning"  href="<?=site_url('admin/logout')?>">
							<i class="ace-icon fa fa-power-off"></i>
						</a>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="<?=$menu1?>">
						<a href="<?=site_url('admin/home')?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="<?=$menu2?>">
					<a href="<?=site_url('admin/list-pages')?>">
									<i class="menu-icon fa fa-list"></i>
									<span class="menu-text"> Manage Pages</span>
								</a>

								<b class="arrow"></b>
							</li>

					<li class="<?=$menu3?>">
								<a href="<?=site_url('admin/admin-users')?>">
									<i class="menu-icon fa fa-user"></i>
									<span class="menu-text"> Admin Users</span>
								</a>

								<b class="arrow"></b>
					</li>
					<li class="<?=$menu4?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								Settings
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?=site_url('admin/reset-password')?>" >
									<i class="menu-icon fa fa-caret-right"></i>

									Reset Password
									</a>

								<b class="arrow"></b>

									<li class="">
										<a href="<?=site_url('admin/logout')?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Logout
										</a>

										<b class="arrow"></b>
									</li>

								</ul>
							</li>
						  

				</ul><!-- /.nav-list -->

				
			</div>

			<?php echo $content; ?><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder"><?=WEBSITE_NAME?></span>
							Copyright &copy; <?=date('Y')?>
						</span>

						&nbsp; &nbsp;
						
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->
      
		<!--[if !IE]> -->
		<script src="<?=asset_url_admin()?>js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?=asset_url_admin()?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?=asset_url_admin()?>js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		  <?=$html_footer?>

		<!-- page specific plugin scripts -->

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
	</body>
</html>
