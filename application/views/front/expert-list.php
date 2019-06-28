<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="page-header">
  <div class="container">
    <div class="row">
      <!-- page caption -->
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <div class="page-caption">
          <h1 class="page-title">Find artists and other experts</h1>
        </div>
      </div>
      <!-- /.page caption -->
    </div>
  </div>
  <!-- page caption -->
  <div class="page-breadcrumb">
    <div class="container">
      <div class="row">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo(base_url()); ?>" class="breadcrumb-link">Home</a></li>
            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Artists & Other Experts</a></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- page breadcrumb -->
</div>
<!-- /.page-header -->
<!-- vendor-section -->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="filter-form top-filter clearfix">
          <div class="col-md-12">
            <?php echo form_open('expert-search','class="form-row"'); ?>
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
              <div class="row">
                <div class="col-md-10 col-sm-8 col-xs-12"> <input id="search_name" type="text" name="searchexpert" value="<?= set_value('searchexpert') ?>" placeholder="Search Expert" class="form-control hom-serch" required></div>
                <div class="col-md-2 col-sm-4 col-xs-12"><button type="submit" class="btn btn-danger">Search</button></div>
              </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
              <h3 class="widget-title" align="right">filter</h3>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
              <select class="wide" name="userrating" onchange="this.form.submit()">
                <option value="">Rating</option>
                <option value="5">5*</option>
                <option value="4">4*</option>
                <option value="3">3*</option>
                <option value="2">2*</option>
                <option value="1">1*</option>
              </select>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div>
          <?php if (!empty($expert)): foreach ($expert as $value): ?>
            <a href="<?php echo(base_url('user-profile/'.$value->id)) ?>" class="expert">
              <span class="images-xprt"><img style="width: 154px; height: 132px;" src="<?php echo base_url('uploads/users/'.$value->image); ?>" alt=""></span>
              <span class="star-xprt">
                <?php for($i = 0; $i < $value->star_rate; $i++){ ?>
                  <i class="fa fa-star" aria-hidden="true"></i>
                <?php } ?>
              </span>
              <h1><?php echo $value->fname.'&nbsp;'.$value->sname; ?></h1>
              <p><i><?php echo $value->type; ?></i></p>
            </a>
          <?php endforeach; else: ?>
          <span>No Users Fount</span>
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
</div>
</div>
