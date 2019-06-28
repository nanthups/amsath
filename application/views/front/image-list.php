<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="innerpage-search">
    <div class="container">
        <?php echo form_open('image-search'); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="control-label sr-only" for="name"></label>
                    <input id="name" type="text" value="<?= set_value('imagesearch') ?>" name="imagesearch" placeholder="Search Image" class="form-control" required="">
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-yellow btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
        <?php echo form_close(); ?>
        <div class="row">
            <div class="col-md-12">
                <h2>Browse images by category</h2>
            </div>
        </div>
        <div class="row category">

            <div class="col-md-3">
                <ul>
                    <li><a href="<?php echo base_url('image-search/1') ?>">Abstract</a></li>
                    <li><a href="<?php echo base_url('image-search/2') ?>">Animals/Wildlife</a></li>
                    <li><a href="<?php echo base_url('image-search/3') ?>">Art</a></li>
                    <li><a href="<?php echo base_url('image-search/4') ?>">Backgrounds/Textures</a></li>
                    <li><a href="<?php echo base_url('image-search/5') ?>">Beauty/Fashion</a></li>
                    <li><a href="<?php echo base_url('image-search/6') ?>">Buildings/Landmarks</a></li>
                    <li><a href="<?php echo base_url('image-search/7') ?>">Business/Finance</a></li>
                    <li><a href="<?php echo base_url('image-search/8') ?>">Celebrities</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li><a href="<?php echo base_url('image-search/9') ?>">Education</a></li>
                    <li><a href="<?php echo base_url('image-search/10') ?>">Food and Drink</a></li>
                    <li><a href="<?php echo base_url('image-search/11') ?>">Healthcare/Medical</a></li>
                    <li><a href="<?php echo base_url('image-search/12') ?>">Holidays</a></li>
                    <li><a href="<?php echo base_url('image-search/13') ?>">Illustrations/Clip-Art</a></li>
                    <li><a href="<?php echo base_url('image-search/14') ?>">Industrial</a></li>
                    <li><a href="<?php echo base_url('image-search/15') ?>">Interiors</a></li>
                    <li><a href="<?php echo base_url('image-search/16') ?>">Miscellaneous</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li><a href="<?php echo base_url('image-search/17') ?>">Nature</a></li>
                    <li><a href="<?php echo base_url('image-search/18') ?>">Objects</a></li>
                    <li><a href="<?php echo base_url('image-search/19') ?>">Outdoor</a></li>
                    <li><a href="<?php echo base_url('image-search/20') ?>">People</a></li>
                    <li><a href="<?php echo base_url('image-search/21') ?>">Religion</a></li>
                    <li><a href="<?php echo base_url('image-search/22') ?>">Science</a></li>
                    <li><a href="<?php echo base_url('image-search/23') ?>">Signs/Symbols</a></li>
                    <li><a href="<?php echo base_url('image-search/24') ?>">Sports</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li><a href="<?php echo base_url('image-search/25') ?>">Technology</a></li>
                    <li><a href="<?php echo base_url('image-search/26') ?>">Transportation</a></li>
                    <li><a href="<?php echo base_url('image-search/27') ?>">Vectors</a></li>
                    <li><a href="<?php echo base_url('image-search/28') ?>">Vintage</a></li>

                </ul>
            </div>
        </div>

    </div>
</div>
<!-- /.page-header -->
<!-- real-wedding-section -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h4><?php echo $heading?$heading:'All'; ?></h4>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
             <div id="columns">
                <?php if (!empty($files)): foreach ($files as $value): ?>
                  <figure>
                    <span class="list-title"><?php echo($value->file_title); ?>.</span>
                    <div class="img-bottom">
                        <span class="list-like"><i class="fa fa-heart" aria-hidden="true"></i></span>
                        <span class="list-save"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
                    </div>
                    <a href="<?php echo base_url('image-details/'.$value->file_id); ?>"> 
                        <img src="<?php echo base_url('uploads/orginal/'.$value->file_name);?>">
                    </a>
                </figure>
            <?php endforeach; else: ?>
            <span>No images to display</span>
        <?php endif; ?>
    </div>
</div>
<!-- pagination -->
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="pagination justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if (!empty($links)): foreach ($links as $link) :
                  echo '<li class="page-item active">'. $link."</li>";
              endforeach; endif; ?>
          </ul>
      </nav>
  </div>
</div>
<!-- /.pagination -->
</div>
</div>
</div>
