<?php

$menu1  =  "";
$menu2  =  "";
$menu3  =  "";
$menu4  =  "";
$menu5  =  "";
$menu6  =  "";
$menu9  =  "";
$menu11 =  "";
$menu12 =  "";
$menu13 =  "";
$menu14 =  "";
$menu15 =  "";
$menu16 =  "";
$menu17 =  "";
$menu18 =  "";
$menu19 =  "";
$menu120 =  "";




if($this->uri->uri_string() == 'admin/home' || $this->uri->uri_string() == 'admin')
  $menu1 = "active highlight";
  
  
if($this->uri->uri_string(1) == 'admin/list-pages')
  $menu2 = "active highlight";
  if($this->uri->uri_string(2) == 'admin/add-pages/add')
  $menu2 = "active highlight";
    if($this->uri->segment(3) == 'editpage')
  $menu2 = "active highlight";
  if($this->uri->segment(3) == 'search')
  $menu2 = "active highlight";
  
  
  if($this->uri->uri_string(1) == 'admin/list-product')
  $menu15 = "active highlight";
  if($this->uri->uri_string(2) == 'admin/add-product/add')
  $menu15 = "active highlight";
    if($this->uri->segment(3) == 'editproduct')
  $menu15 = "active highlight";
  if($this->uri->segment(3) == 'search')
  $menu15 = "active highlight";
  
  
 if($this->uri->uri_string() == 'admin/list-brand') {
  $menu6 = "active highlight open";
  $submenu6_1 = "active highlight open"; 
}
if($this->uri->uri_string() == 'admin/list-attribute') {
  $menu6 = "active highlight open";
  $submenu6_2 = "active highlight open"; 
}

if($this->uri->uri_string() == 'admin/list-attribute-values') {
  $menu6 = "active highlight open";
  $submenu6_3 = "active highlight open"; 
}

if($this->uri->uri_string() == 'admin/list-specifications') {
  $menu6 = "active highlight open";
  $submenu6_4 = "active highlight open"; 
}


if($this->uri->uri_string() == 'admin/list-category1') {
  $menu9 = "active highlight open";
  $submenu9_1 = "active highlight open"; 
}
if($this->uri->uri_string() == 'admin/list-category2') {
  $menu9 = "active highlight open";
  $submenu9_2 = "active highlight open"; 
}



  
  
  if($this->uri->uri_string(1) == 'admin/list-reg')
  $menu11 = "active highlight";
  if($this->uri->uri_string(2) == 'admin/add-reg/add')
  $menu11 = "active highlight";
    //if($this->uri->segment(3) == 'e')
 // $menu11 = "active highlight";
  if($this->uri->segment(3) == 'search')
  $menu11 = "active highlight";
  
  
if($this->uri->uri_string(1) == 'admin/list-coupon')
  $menu12 = "active highlight";
  if($this->uri->uri_string(2) == 'admin/add-coupon/add')
  $menu12 = "active highlight";
    if($this->uri->segment(3) == 'editcoupon')
  $menu12 = "active highlight";
  if($this->uri->segment(3) == 'search')
  $menu12 = "active highlight";
  
  
  if($this->uri->uri_string(1) == 'admin/list-web')
  $menu16 = "active highlight";
  if($this->uri->uri_string(2) == 'admin/add-web/add')
  $menu16 = "active highlight";
    //if($this->uri->segment(3) == 'e')
 // $menu11 = "active highlight";
  if($this->uri->segment(3) == 'search')
  $menu16 = "active highlight";
  
  if($this->uri->uri_string(1) == 'admin/list-agreement')
  $menu17 = "active highlight";
  if($this->uri->uri_string(2) == 'admin/add-agreement/add')
  $menu17 = "active highlight";
    //if($this->uri->segment(3) == 'e')
 // $menu11 = "active highlight";
  if($this->uri->segment(3) == 'search')
  $menu17 = "active highlight";
  
  if($this->uri->uri_string(1) == 'admin/list-banner')
  $menu18 = "active highlight";
  if($this->uri->uri_string(2) == 'admin/add-banner/add')
  $menu18 = "active highlight";
    if($this->uri->segment(3) == 'editbanner')
  $menu18 = "active highlight";
  if($this->uri->segment(3) == 'search')
  $menu18 = "active highlight";
  
  if($this->uri->uri_string(1) == 'admin/list-website')
  $menu19 = "active highlight";
  if($this->uri->uri_string(2) == 'admin/add-website/add')
  $menu19 = "active highlight";
    if($this->uri->segment(3) == 'editwebsite')
  $menu19 = "active highlight";
  if($this->uri->segment(3) == 'search')
  $menu19 = "active highlight";
  
  
  if($this->uri->uri_string(1) == 'admin/list-ads')
  $menu20 = "active highlight";
  if($this->uri->uri_string(2) == 'admin/add-ads/add')
  $menu20 = "active highlight";
    //if($this->uri->segment(3) == 'e')
 // $menu11 = "active highlight";
  if($this->uri->segment(3) == 'search')
  $menu17 = "active highlight";
  
  
  
  if($this->uri->uri_string() == 'admin/admin-users')
  $menu3 = "active highlight";
  if($this->uri->segment(3) == 'update')
  $menu3 = "active highlight";
  if($this->uri->segment(3) == 'searchs')
  $menu3 = "active highlight";

  
  
if($this->uri->uri_string() == 'admin/reset-password')
	$menu4 = "active highlight open";
	$submenu4_1 = "active highlight open";
if($this->uri->uri_string() == 'admin/reset-password/change')
	$menu4 = "active highlight open";
  
  
  
  
  
  ?>

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

								<li class="<?=$menu6?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-diamond"></i>
							<span class="menu-text">
								Manage Masters
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?=$submenu6_1?>">
								<a href="<?=site_url('admin/list-brand')?>" >
									<i class="menu-icon fa fa-caret-right"></i>

									Brands
									</a>
								</li>
								<!-- <b class="arrow"></b> -->

									<!-- <li class="">
										<a href="<?=site_url('admin/list-attribute')?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Attributes
										</a>

										<b class="arrow"></b>
									</li> -->

									<b class="arrow"></b>

									<li class="<?=$submenu6_3?>">
										<a href="<?=site_url('admin/list-attribute-values')?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Attributes Values
										</a>

										<b class="arrow"></b>
									</li>


                                       <b class="arrow"></b>

									<!-- <li class="<?=$submenu6_4?>">
										<a href="<?=site_url('admin/list-specifications')?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Specifications
										</a>

										<b class="arrow"></b>
									</li> -->

									

								</ul>
							</li>

							

							
							<li class="<?=$menu9?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-shopping-cart"></i>
							<span class="menu-text">
								Categories
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?=$submenu9_1?>">
								<a href="<?=site_url('admin/list-category1')?>" >
									<i class="menu-icon fa fa-caret-right"></i>

									Category Level1
									</a>

								<b class="arrow"></b>

									<li class="<?=$submenu9_2?>">
										<a href="<?=site_url('admin/list-category2')?>">
											<i class="menu-icon fa fa-caret-right"></i>
											Category Level2
										</a>

										<b class="arrow"></b>
									</li>

									

								</ul>
							</li>

							<li class="<?=$menu15?>">
					<a href="<?=site_url('admin/list-product')?>">
									<i class="menu-icon fa fa-product-hunt"></i>
									<span class="menu-text">Manage Product</span>
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?=$menu12?>">
					<a href="<?=site_url('admin/list-coupon')?>">
									<i class="menu-icon fa fa-ticket"></i>
									<span class="menu-text">Manage Coupons</span>
								</a>

								<b class="arrow"></b>
							</li>
							
							
							<li class="<?=$menu18?>">
					<a href="<?=site_url('admin/list-banner')?>">
									<i class="menu-icon fa fa-camera"></i>
									<span class="menu-text">Manage Banner</span>
								</a>

								<b class="arrow"></b>
							</li>

							


						  <li class="<?=$menu11?>">
					<a href="<?=site_url('admin/list-reg')?>">
									<i class="menu-icon fa fa-registered"></i>
									<span class="menu-text">Reg: Users</span>
								</a>

								<b class="arrow"></b>
							</li>
							
							
							<li class="<?=$menu16?>">
					<a href="<?=site_url('admin/list-web')?>">
									<i class="menu-icon fa fa-share"></i>
									<span class="menu-text">Manage Web Links</span>
								</a>

								<b class="arrow"></b>
							</li>
							
							
								<li class="<?=$menu17?>">
					<a href="<?=site_url('admin/list-agreement')?>">
									<i class="menu-icon fa fa-paperclip"></i>
									<span class="menu-text"> Agreement Details</span>
								</a>

								<b class="arrow"></b>
							</li>
							
							
							<li class="<?=$menu20?>">
					<a href="<?=site_url('admin/list-ads')?>">
									<i class="menu-icon fa fa-bookmark"></i>
									<span class="menu-text"> Manage Ads</span>
								</a>

								<b class="arrow"></b>
							</li>
							
							
							<li class="<?=$menu19?>">
					<a href="<?=site_url('admin/list-website')?>">
									<i class="menu-icon fa fa-link"></i>
									<span class="menu-text">Manage Website</span>
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
							<li class="<?=$submenu4_1?>">
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