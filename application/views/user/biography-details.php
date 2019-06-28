<?php $this->load->view('user/includes/dashboard-header');?>        
<div class="dashboard-content">
    <div class="container">
       <div class="alert alert-danger" <?php echo(validation_errors()?'':'hidden') ?>>
         <strong><?php echo validation_errors(); ?></strong>
     </div>
     <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
         <strong><?php echo($this->session->flashdata('alert')); ?></strong>
     </div>
     <div class="card">
        <div class="card-header"> <h4 class="mb0">Add Bio</h4></div>
        <div class="">
            <?php echo form_open('manage-biography'); ?>
            <!-- Form Name -->
            <div class="venue-form-info card-body">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <a href="<?php echo(base_url('user-bio')); ?>">
                        <span class="fas fa-arrow-left float-right"> Back</span>
                    </a>
                </div>
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">From</label>
                        <input id="datepicker-1" name="bio_from" value="<?php echo(isset($biography->bio_from)?$biography->bio_from:$bio_from); ?>" type="text" placeholder="From" class="form-control">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">To</label>
                        <input id="datepicker-2" name="bio_to" value="<?php echo(isset($biography->bio_to)?$biography->bio_to:$bio_to); ?>" type="text" placeholder="To" class="form-control ">
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Title</label>
                        <input id="title" name="bio_title" value="<?php echo(isset($biography->bio_title)?$biography->bio_title:$bio_title); ?>" type="text" placeholder="Title" class="form-control ">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Company</label>
                        <input id="title" name="institution" value="<?php echo(isset($biography->institution)?$biography->institution:$institution); ?>" type="institution" placeholder="Company" class="form-control">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Location</label>
                        <input id="title" name="place" value="<?php echo(isset($biography->place)?$biography->place:''); ?>" type="text" placeholder="Location" class="form-control ">
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Description</label>
                        <textarea name="description" rows="5" placeholder="Description" class="form-control"><?php echo(isset($biography->description)?$biography->description:$description); ?></textarea>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <?php if ($biography->bio_id) { ?>
                        <div class="form-group">
                            <input type="hidden" name="bio_id" value="<?php echo($biography->bio_id); ?>">
                            <button type="submit" name="button" value="update" class="btn btn-default">Update</button>
                        </div>
                    <?php } else { ?>
                        <div class="form-group">
                            <button type="submit" name="button" value="submit" class="btn btn-default">Submit</button>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
</div>
</div>
<?php $this->load->view('user/includes/dashboard-footer.php');?>        