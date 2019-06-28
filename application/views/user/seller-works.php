<?php $this->load->view('user/includes/dashboard-header');?>
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title ">My Works</h3>
                    <p>Upload Photos and Videos.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Photos</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Video Links</a>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
                      <strong><?php echo($this->session->flashdata('alert')); ?></strong>
                  </div>
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="card">
                        <div class="card-header">Add Photos</div>
                        <div class="card-body">
                            <?php echo form_open_multipart('User/manage_works/photo'); ?>
                            <!-- Form Name -->
                            <div class="personal-form-info">
                                <div class="row">
                                    <!-- Text input-->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="title">Photos</label>
                                            <input id="title" type="file" name="work_file[]" multiple class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="title">Title</label>
                                            <input id="title" name="work_title" type="text" placeholder="Title" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <button class="btn btn-default" type="submit">Upload</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="card">
                        <div class="card-header">Add Youtube Links</div>
                        <div class="card-body">
                             <?php echo form_open_multipart('User/manage_works/link','class="row"'); ?>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label" for="title">Youtube Link</label>
                                    <input id="title" name="work_link" type="text" placeholder="Youtube link" class="form-control ">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label" for="title">Title</label>
                                    <input id="title" name="work_title" type="text" placeholder="Title" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button class="btn btn-default" type="submit">Save</button>
                            </div>
                            <?php echo form_close(); ?>
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