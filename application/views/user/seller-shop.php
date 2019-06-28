<?php $this->load->view('user/includes/dashboard-header');?>
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title">My Shop Listing</h3>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">
                <a href="<?php echo base_url('user-sell-files');?>" class="btn btn-default btn-sm">sell new item</a>
            </div>
        </div>
        <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
           <strong><?php echo($this->session->flashdata('alert')); ?></strong>
       </div>
       <div class="dashboard-vendor-list">
        <ul class="list-unstyled">
            <?php foreach ($files as $value) { ?>
                <li>
                    <div class="dashboard-list-block">
                        <div class="row">
                            <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12 col-12">
                                <div class="dashboard-list-img">
                                    <a href="#">
                                        <img src="uploads/small/<?php echo($value['file_name']); ?>" alt="" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-5 col-md-6 col-sm-12 col-12 ">
                                <div class="dashboard-list-content">
                                    <h3 class="mb0"><a href="#" class="title"><?php echo($value['file_title']); ?></a></h3>
                                    <p>PRICE - Rs. <?php echo($value['file_price'].' | '. $value['category'].' , '.$value['keyword']); ?></p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                <div class="dashboard-list-btn"><a href="<?php echo base_url('edit-file/'.$value['file_id']);?>" class="btn btn-outline-violate btn-xs mr10">edit</a><a onclick="return confirm('Are you sure you want to delete this file?');" href="<?php echo('delete-file/'.$value['file_id']); ?>" class="btn btn-outline-pink btn-xs ">delete</a></div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } if (empty($value)) { ?>
                <h2 align="center">No Files</h2>
            <?php } ?>
        </ul>
    </div>
</div>
</div>
<?php $this->load->view('user/includes/dashboard-footer');?>