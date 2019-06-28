  <?php $this->load->view('user/includes/dashboard-header');?>
  <div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title"><?php echo($head); ?> New Ad</h3>
                    <p>You can manage ads here </p>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" <?php echo(validation_errors()?'':'hidden') ?>>
         <strong><?php echo validation_errors(); ?></strong>
     </div>
     <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
         <strong><?php echo($this->session->flashdata('alert')); ?></strong>
     </div>
     <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">
            <a href="<?php echo(base_url('user-ads-listing')); ?>" class="btn btn-default btn-sm">Back to list</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header"> <h4 class="mb0">New Ad</h4></div>
        <div class="">
          <?php echo form_open('user-manage-ads'); ?>
          <!-- Form Name -->
          <div class="venue-form-info card-body">
            <div class="row">
                <!-- Text input-->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="ads_ti">Title</label>
                        <input id="ads_title" name="ads_title" value="<?php echo isset($ads_title)?$ads_title:'' ?>" type="text" placeholder="Title" class="form-control ">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="control-label" for="Category">Category</label>
                        <select class="form-control wide" name="jobs_category" id="Category">
                            <option>---Select---</option>
                            <?php foreach ($jobs as $value) { $selected = '';
                            if($value['jobs_id'] == $jobs_category) { $selected = 'selected'; } ?>
                            <option <?php echo $selected; ?> value="<?php echo $value['jobs_id']?>"><?php echo $value['jobs_category']?></option>
                        <?php  } ?>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
             <div class="form-group">
                <label class="control-label" for="price">Budget Cost</label>
                <input id="price" name="ads_cost" value="<?php echo isset($ads_cost)?$ads_cost:'' ?>" type="text" placeholder="Price" class="form-control ">
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label class="control-label" for="address">Ad Description</label>
                <textarea name="ads_description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo isset($ads_description)?$ads_description:'' ?></textarea>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
                <label class="control-label" for="price">Number of person need</label>
                <input id="price" name="ads_person" type="text" value="<?php echo isset($ads_person)?$ads_person:'' ?>" placeholder="Number" class="form-control ">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
                <label class="control-label" for="postcode">Expire Date</label>
                <input id="datepicker-4" name="ads_expire" type="text" value="<?php echo isset($ads_expire)?$ads_expire:'' ?>" placeholder="Expire Date" class="form-control">
            </div>
        </div>
        <div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <input type="hidden" name="ads_id" value="<?php echo isset($ads_id)?$ads_id:'' ?>">
                <button name="button" value="<?php echo ($head=="Create")?'Create':'Update'; ?>" type="submit" class="btn btn-rounded btn-dark"><?php echo ($head=="Create")?'Create':'Update'; ?></button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>
<?php $this->load->view('user/includes/dashboard-footer');?>
