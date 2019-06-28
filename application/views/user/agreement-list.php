<?php $this->load->view('user/includes/dashboard-header');?> 
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title">Agreements </h3>
                    <p>Lists present multiple line items vertically as a single continuous element.</p>
                </div>
            </div>
        </div>
        <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
           <strong><?php echo($this->session->flashdata('alert')); ?></strong>
       </div>
       <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">
            <a href="<?php echo(base_url('user-agreement-add')); ?>" class="btn btn-default btn-sm">Create New Agreement</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb20">
            <div class="st-tab dashboard-agreement">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Ongoing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Recieved <span class="badge badge-pill badge-danger">3</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#rejected" role="tab" aria-controls="pills-contact" aria-selected="false">Rejected</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#createme" role="tab" aria-controls="pills-contact" aria-selected="false">Created by me</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                     <div class="row">
                       <?php if(!empty($agreements)) { foreach ($agreements as  $value) { ?>
                        <div class="col-md-4">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="post-block">
                                <div class="post-content">
                                  <h2 class="post-heading"><a href="#" class="post-title"><?php echo($value['agr_title']);?> </a></h2>
                                  <p class="meta">
                                    <span class="meta-date"><i class="fas fa-calendar-alt"></i> <?php echo(date('F d, Y',strtotime($value['create_on']))); ?></span>
                                </p>
                                <p class="meta">
                                    <span class="meta-posted-by"><i class="fas fa-user"></i> Agreement with <a href="#"><?php echo($value['agr_with']);?></a></span>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Number of Photos
                                            <span class="badge badge-default badge-pill"><?php echo($value['no_images']);?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Total Amount
                                           <span class="badge badge-default badge-pill">$<?php echo($value['agr_amt']);?></span>
                                       </li>
                                       <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Ending Date
                                        <span class="badge badge-default badge-pill"><?php echo(date('F d, Y',strtotime($value['agr_exp']))); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Delay
                                        <span class="badge badge-default badge-pill"><?php echo($value['arg_delay']);?> Days</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Completed Date
                                        <span class="badge badge-default badge-pill"><?php echo(date('F d, Y',strtotime($value['agr_comp']))); ?></span>
                                    </li>
                                </ul>
                            </p>
                            <a href="#" class="btn-default-link" data-toggle="modal" data-target="#agrement-description">Read More</a>
                                     <div class="modal fade" id="agrement-description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Job Description</h5>
                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Hello sir, Can you do a photo retouching work for me i send you all the photos with attachment</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        </div>
                    </div>
                </div>
            <?php } } else { ?>
                <span>No Agreements</span>
            <?php } ?>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="row">
            <div class="col-md-4">
                <div class="post-block">
                    <div class="post-content">
                      <h2 class="post-heading"><a href="#" class="post-title">Wedding Photo Retouching </a></h2>
                      <p class="meta">
                        <span class="meta-date"><i class="fas fa-calendar-alt"></i> 08 May, 2019</span>
                    </p>
                    <p class="meta">
                        <span class="meta-posted-by"><i class="fas fa-user"></i> Agreement with <a href="#">Arun Kumar</a></span>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Number of Photos
                                <span class="badge badge-default badge-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                               Total Amount
                               <span class="badge badge-default badge-pill">$500</span>
                           </li>
                           <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ending Date
                            <span class="badge badge-default badge-pill">15 May, 2018</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Delay
                            <span class="badge badge-default badge-pill">2 Days</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Completed Date
                            <span class="badge badge-default badge-pill">15 May, 2018</span>
                        </li>
                    </ul>
                </p>
                <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#agrement-description2">Read More</a>
                <div class="modal fade" id="agrement-description2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Job Description</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <div class="modal-body">
                                <p>Hello sir, Can you do a photo retouching work for me i send you all the photos with attachment</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-success btn-xs">Accept</a>
                <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#agrement-reject">Reject</a>
                <div class="modal fade" id="agrement-reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Reason</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <div class="modal-body">
                                <p>I am busy on other projects</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-danger" data-dismiss="modal">Conform Rejection</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="agrement-description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Job Description</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <div class="modal-body">
                                <p>Hello sir, Can you do a photo retouching work for me i send you all the photos with attachment</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
    <div class="row">
        <div class="col-md-4">
            <div class="post-block">
                <div class="post-content">
                    <p><span class="badge badge-pill badge-light"><span class="badge-dot badge-danger"></span> This Agreement Rejected by <span class="text-success">Arun Kumar</span></span></p>
                    <h2 class="post-heading"><a href="#" class="post-title">Wedding Photo Retouching </a></h2>
                    <p class="meta">
                        <span class="meta-date"><i class="fas fa-calendar-alt"></i> 08 May, 2019</span>
                    </p>
                    <p class="meta">
                        <span class="meta-posted-by"><i class="fas fa-user"></i> Agreement with <a href="#">Arun Kumar</a></span>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Number of Photos
                                <span class="badge badge-default badge-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                               Total Amount
                               <span class="badge badge-default badge-pill">$500</span>
                           </li>
                           <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ending Date
                            <span class="badge badge-default badge-pill">15 May, 2018</span>
                        </li>
                    </ul>
                </p>
                <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#agrement-description3">Read More</a>
                <div class="modal fade" id="agrement-description3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Job Description</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <div class="modal-body">
                                <p>Hello sir, Can you do a photo retouching work for me i send you all the photos with attachment</p>
                                <div class="alert alert-danger" role="alert">
                                    Reason for rejection : <br>
                                    Hello sir i am busy on other projects
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="post-block">
            <div class="post-content">
                <p><span class="badge badge-pill badge-light"><span class="badge-dot badge-danger"></span> This Agreement Rejected by <span class="text-success">Me</span></span></p>
                <h2 class="post-heading"><a href="#" class="post-title">Wedding Photo Retouching </a></h2>
                <p class="meta">
                    <span class="meta-date"><i class="fas fa-calendar-alt"></i> 08 May, 2019</span>
                </p>
                <p class="meta">
                    <span class="meta-posted-by"><i class="fas fa-user"></i> Agreement with <a href="#">Arun Kumar</a></span>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Number of Photos
                            <span class="badge badge-default badge-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Total Amount
                           <span class="badge badge-default badge-pill">$500</span>
                       </li>
                       <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ending Date
                        <span class="badge badge-default badge-pill">15 May, 2018</span>
                    </li>
                </ul>
            </p>
            <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#agrement-description3">Read More</a>
            <div class="modal fade" id="agrement-description3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Job Description</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <p>Hello sir, Can you do a photo retouching work for me i send you all the photos with attachment</p>
                            <div class="alert alert-danger" role="alert">
                                Reason for rejection : <br>
                                Hello sir i am busy on other projects
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="tab-pane fade" id="createme" role="tabpanel" aria-labelledby="rejected-tab">
 <div class="row">
    <div class="col-md-4">
        <div class="post-block">
            <div class="post-content">
              <h2 class="post-heading"><a href="#" class="post-title">Wedding Photo Retouching </a></h2>
              <p class="meta">
                <span class="meta-date"><i class="fas fa-calendar-alt"></i> 08 May, 2019</span>
            </p>
            <p class="meta">
                <span class="meta-posted-by"><i class="fas fa-user"></i> Agreement with <a href="#">Arun Kumar</a></span>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Number of Photos
                        <span class="badge badge-default badge-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                       Total Amount
                       <span class="badge badge-default badge-pill">$500</span>
                   </li>
                   <li class="list-group-item d-flex justify-content-between align-items-center">
                    Ending Date
                    <span class="badge badge-default badge-pill">15 May, 2018</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Delay
                    <span class="badge badge-default badge-pill">2 Days</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Completed Date
                    <span class="badge badge-default badge-pill">15 May, 2018</span>
                </li>
            </ul>
        </p>
        <a href="#" class="btn-default-link" data-toggle="modal" data-target="#agrement-description">Read More</a>
        <div class="modal fade" id="agrement-description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Job Description</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <p>Hello sir, Can you do a photo retouching work for me i send you all the photos with attachment</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view('user/includes/dashboard-footer.php');?>    