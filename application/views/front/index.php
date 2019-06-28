<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- hero-section -->
<div class="hero-section-third">
  <div class="container">
    <div class="row">
      <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 col-md-12 col-sm-12 col-12">
        <!-- search-block -->
        <div class="search-section">
          <div class="search-head">
            <h1 class="search-head-title text-white">Find the Best Photos, Talented Artists and Products</h1>

          </div>
          <!-- /.search-block -->
          <!-- search-form -->
          <div class="search-form">
            <?php echo form_open('best-search'); ?>
            <div class="form-group">
              <div class="row">
                <label class="control-label sr-only" for="name"></label>
                <div class="col-md-10 col-sm-8 col-xs-12">
                  <input id="search_name" type="text" name="search_name" placeholder="Search here" class="form-control hom-serch">
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12">
                  <button type="submit" class="btn btn-danger">Search</button>
                </div>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.search-form -->
          <p class="d-none d-xl-block d-lg-block d-sm-block text-white">eg: John Deo, Photographer, Winter Photos etc...</p>
        </div>
      </div>
    </div>
  </div>
  <div class="feature-section">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <div class="feature-left">
            <div class="feature-icon">
              <i class="fa fa-camera" aria-hidden="true"></i>
            </div>
            <div class="feature-content">
              <h3 class="text-white mb-1"><?php echo($itemCounts);?>+</h3>
              <p class="text-white">Stock Photos</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <div class="feature-left">
            <div class="feature-icon">
              <i class="fa fa-paint-brush" aria-hidden="true"></i>
            </div>
            <div class="feature-content">
              <h3 class="text-white mb-1"><?php echo($itemCounta); ?>+</h3>
              <p class="text-white">Artists</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <div class="feature-left">
            <div class="feature-icon">
              <i class="fa fa-bicycle" aria-hidden="true"></i>
            </div>
            <div class="feature-content">
              <h3 class="text-white mb-1"><?php echo($itemCountp); ?>+</h3>
              <p class="text-white">Products</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <div class="feature-left">
            <div class="feature-icon">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <div class="feature-content">
              <h3 class="text-white mb-1"><?php echo($itemCountu); ?>+</h3>
              <p class="text-white">Daily Users</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /.hero-section -->
<!-- venue-categoris-section-->
<div class="space-small bg-white">
  <div class="container">
    <div class="row">
      <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
        <div class="section-title text-center">
          <!-- section title start-->
          <h2 class="mb10">Browse artists and other experts</h2>
          <p>You can browse and find an expert for your work</p>
        </div>
        <!-- /.section title start-->
      </div>
    </div>
    <div class="row">
     <div>  
           <?php foreach($expert as $key => $val) { ?>
               		<div style="margin-bottom: 45px; float:left;">
               		 <a href="<?php echo(base_url('user-profile/'.$val->id)) ?>" class="expert">
               			<span class="images-xprt"><img src="<?=base_url()?>uploads/users/thumb/<?=$val->image?>"></span>
               		 <span class="star-xprt">
                <?php for($i = 0; $i < $value->star_rate; $i++){ ?>
                  <i class="fa fa-star" aria-hidden="true"></i>
                <?php } ?>
              </span>
               			<h1><?=$val->fname?>&nbsp;<?=$val->sname?></h1>
               			<p><i><?=$val->type?></i></p>
               		</a>
					</div>
					<?php } ?>
          </div>
  </div>
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mt20"><a href="<?php echo(base_url('experts-list')) ?>" class="btn btn-primary btn-lg">Browse all category</a></div>
  </div>
</div>
</div>


<div class="space-small bg-light">
  <div class="container">
    <div class="row">
      <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
        <div class="section-title text-center">

          <h2 class="mb10">Buy Photos </h2>
          <p>Find best photos in the world with your budget</p>
        </div>

      </div>
    </div>
    <div class="row">
      <?php foreach ($files as $value) { ?>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
          <div class="vendor-categories-block zoomimg">
            <div class="vendor-categories-img"> <a href="<?php echo('image-details/'.$value['file_id']); ?>">
              <img src="<?php echo base_url('uploads/orginal/'.$value['file_name']);?>" alt="" class="img-fluid"></a>
            </div>
            <div class="vendor-categories-overlay">
              <div class="vendor-categories-text">
                <h4 class="mb0"><a href="<?php echo('image-details/'.$value['file_id']); ?>" class="vendor-categories-title"><?php echo($value['file_title']); ?></a></h4>
                <p class="vendor-categories-numbers"><i class="fa fa-heart" aria-hidden="true"></i> 5</p>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mt20"><a href="<?php echo(base_url('image-list')); ?>" class="btn btn-primary btn-lg">Browse all category</a></div>
    </div>

  </div>
</div>


<div class="space-medium dark-gray">
 <div class="home-ads">
   <div class="container-fluid">
    <div class="row">
      <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
        <div class="section-title text-center">

          <h2 class="mb10">Publish your ads</h2>
          <p>
           <a href="" class="ad-btn1">Create an ad</a>

         </p>
       </div>

     </div>
   </div>
   <div class="venue-thumbnail-carousel">
    <div class="owl-carousel owl-theme owl-venue-thumb">
      <?php foreach ($ads as $value) { ?>
        <div class="item">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="vendor-thumbnail">
              <div class="vendor-content">
                <h2 class="vendor-title"><a href="#" class="title"><?php echo($value['ads_title']); ?></a></h2>
                <span><?php echo($value['jobs_category']); ?></span>
                <p class="vendor-address"><span class="vendor-address-icon"></span> Ad posted by : <i><?php echo($value['fname']); ?></i></p>
                <p class="vendor-address"><span class="vendor-address-icon"><i class="fa fa-map-marker-alt"></i> </span><?php echo($value['place']); ?></p>
              </div>
              <div class="vendor-meta">
                <div class="vendor-meta-item vendor-meta-item-bordered">
                  <span class="vendor-price">
                    $<?php echo($value['ads_cost']); ?>
                  </span>
                  <span class="vendor-text">Start From</span></div>
                  <div class="vendor-meta-item vendor-meta-item-bordered">
                    <span class="rating-star">
                      <i class="fa fa-star rated"></i>
                      <i class="fa fa-star rated"></i>
                      <i class="fa fa-star rated"></i>
                      <i class="fa fa-star rated"></i>
                      <i class="fa fa-star rate-mute"></i> 
                    </span>
                    <span class="rating-count vendor-text">(20)</span></div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="shop-bg">

                   <div class="container">
                    <div class="section-title text-center">


                      <h2 class="mb10">Buy Cloths</h2>

                    </div>
					 <div class="shop clearfix">
					<?php
					   foreach($product as $key =>$val){
						
						$deff   = $val->actual_price_inr-$val->price_inr;
						//echo $pdtimage;
						?>
                   
                     <a href="<?=base_url()?>product-details/<?=$val->cat_id1?>/<?=$val->id?>" class="hm-product">
                      <span class="prdct-pop red">- <?= $deff?></span>
                      <span class="prdct-img"><img style="width: 118px; height: 160px;" src="<?=base_url()?>uploads/medium/<?= $val->main_image?>" alt="" ></span>
                      <span class="prdct-title"><?=$val->name?></span>
                      <span class="prdct-price">Rs.<?= $val->price_inr ?> &nbsp; <s>Rs. <?= $val->actual_price_inr ?></s></b></span>

                    </a>
                   
                 
                  
				  <?php
				  }
				  ?>
				  </div>
                </div>

              </div>
              <!-- /.real-wedding-section -->
              <?php $this->load->view('front/includes/footer',$footer);?>