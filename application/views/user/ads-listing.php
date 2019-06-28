 <?php $this->load->view('user/includes/dashboard-header');?>
 <div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title">Ads Listing</h3>
                    <p>Lists present multiple line items vertically as a single continuous element.</p>
                </div>
            </div>
        </div>
        <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
           <strong><?php echo($this->session->flashdata('alert')); ?></strong>
       </div>
       <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">
            <a href="<?php echo(base_url('user-add-ads')); ?>" class="btn btn-default btn-sm">Create New Ad</a>
        </div>
    </div>
    <div class="dashboard-vendor-list">
        <ul class="list-unstyled">
            <?php if(!empty($ads)) { foreach($ads as $i=> $value): ?>
                <li>
                    <div class="dashboard-list-block">
                        <div class="row">
                            <div class="col-xl-1 col-lg-2 col-md-12 col-sm-12 col-12">
                                <div class="dashboard-numbers">
                                    <span class="badge badge-default badge-pill"><?php echo($i+1); ?></span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 ">
                                <div class="dashboard-list-content">
                                    <h3 class="mb0"><a href="#" class="title"><?php echo($value['ads_title']); ?></a></h3>
                                    <p><?php echo($value['ads_description']); ?></p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 ">
                                <div class="dashboard-list-content">
                                    <h4 class="mb0"><a href="#" class="title">Price : $<?php echo($value['ads_cost']); ?></a></h4>
                                    <p>Number of needs : <?php echo($value['ads_person']); ?><br>
                                        Category : <?php echo($value['jobs_category']); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                <div class="dashboard-list-btn">
                                    <a href="<?php echo(base_url('user-ad-return/'.$value['ads_id'])); ?>" class="btn btn-outline-violate btn-xs mr10">edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this?');" href="<?php echo(base_url('user-ad-delete/'.$value['ads_id'])); ?>" class="btn btn-outline-pink btn-xs ">delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; } else { ?>
                <span><h2>No Ads...</h2></span>
            <?php } ?>
        </ul>
    </div>
</div>
</div>
<?php $this->load->view('user/includes/dashboard-footer');?>