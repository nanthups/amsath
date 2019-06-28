<?php $this->load->view('user/includes/dashboard-header');?>
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card card-summary">
                    <div class="card-body">
                        <div class="float-left">
                            <div class="summary-count"><?php echo($itemCount); ?></div>
                            <p>Total Listed Item</p>
                        </div>
                        <div class="summary-icon"><i class="icon-051-wedding-arch"></i></div>

                    </div>
                    <div class="card-footer text-center"><a href="<?php echo base_url('user-sell-shop');?>">View All</a></div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card card-summary">
                    <div class="card-body">
                        <div class="float-left">
                            <div class="summary-count">10</div>
                            <p>Total Sale</p>
                        </div>
                        <div class="summary-icon"><i class="icon-021-love-1"></i></div>
                    </div>
                    <div class="card-footer text-center"><a href="#">View All</a></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card card-summary">
                    <div class="card-body">
                        <div class="float-left">
                            <div class="summary-count">Rs. 2500</div>
                            <p>Total Amount Collected</p>

                        </div>
                        <div class="summary-icon"><i class="icon-004-chat"></i></div>
                    </div>
                    <div class="card-footer text-center"><a href="#">View All</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('user/includes/dashboard-footer');?>