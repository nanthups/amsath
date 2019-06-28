<?php $this->load->view('user/includes/dashboard-header');?>        
<div class="dashboard-content">
    <div class="container">
     <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
         <strong><?php echo($this->session->flashdata('alert')); ?></strong>
     </div>
     <div class="card">
        <div class="card-header"> <h4 class="mb0">Appearance </h4></div>
        <div class="">
            <?php echo form_open('manage-appearance'); ?>
            <!-- Form Name -->
            <div class="venue-form-info card-body">
              <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-2 col-2">
                    <div class="form-group">
                        <label class="control-label" for="title">Male</label>

                        <input id="title"  name="ua_gender" value="Male" type="radio" placeholder="Title" <?php echo($appearance->ua_gender == 'Male'?'checked':'') ?>>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-2 col-2">
                    <div class="form-group">
                        <label class="control-label" for="title">Female</label>

                        <input id="title" name="ua_gender" value="Female" type="radio" placeholder="Title" <?php echo($appearance->ua_gender == 'Female'?'checked':'') ?>>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-2 col-2">
                    <div class="form-group">
                        <label class="control-label" for="title">Transgender</label>

                        <input id="title" name="ua_gender" value="Transgender" type="radio" placeholder="Title" <?php echo($appearance->ua_gender == 'Transgender'?'checked':'') ?>>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="form-group">
                        <label class="control-label" for="title">Height</label>
                        <input id="title" name="ua_height" value="<?php echo(isset($appearance->ua_height)?$appearance->ua_height:''); ?>" type="text" placeholder="In centimeter" class="form-control ">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="form-group">
                        <label class="control-label" for="title">Waist</label>
                        <input id="title" name="ua_waist" value="<?php echo(isset($appearance->ua_waist)?$appearance->ua_waist:''); ?>" type="text" placeholder="In centimeter" class="form-control ">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="form-group">
                        <label class="control-label" for="title">Chest</label>
                        <input id="title" name="ua_chest" value="<?php echo(isset($appearance->ua_chest)?$appearance->ua_chest:''); ?>" type="text" placeholder="In centimeter" class="form-control ">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="form-group">
                        <label class="control-label" for="title">Collar</label>
                        <input id="title" name="ua_collar" value="<?php echo(isset($appearance->ua_collar)?$appearance->ua_collar:''); ?>" type="number" placeholder="In centimeter" class="form-control">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="form-group">
                        <label class="control-label" for="title">Inseam</label>
                        <input id="title" name="ua_inseam" value="<?php echo(isset($appearance->ua_inseam)?$appearance->ua_inseam:''); ?>" type="text" placeholder="In centimeter" class="form-control ">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="form-group">
                        <label class="control-label" for="title">Suit</label>
                        <input id="title" name="ua_suit" value="<?php echo(isset($appearance->ua_suit)?$appearance->ua_suit:''); ?>" type="text" placeholder="In centimeter" class="form-control ">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="form-group">
                        <label class="control-label" for="title">Sleev</label>
                        <input id="title" name="ua_sleev" value="<?php echo(isset($appearance->ua_sleev)?$appearance->ua_sleev:''); ?>" type="text" placeholder="In centimeter" class="form-control ">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="form-group">
                        <label class="control-label" for="title">Shoe Size</label>
                        <input id="title" name="ua_shoe_size" value="<?php echo(isset($appearance->ua_shoe_size)?$appearance->ua_shoe_size:''); ?>" type="number" placeholder="In centimeter" class="form-control ">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Hair Colour</label>
                        <input id="title" name="ua_hair_colour" value="<?php echo(isset($appearance->ua_hair_colour)?$appearance->ua_hair_colour:''); ?>" type="text" placeholder="Hair Colour" class="form-control ">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Eye Colour</label>
                        <input id="title" name="ua_eye_colour" value="<?php echo(isset($appearance->ua_eye_colour)?$appearance->ua_eye_colour:''); ?>" type="text" placeholder="Eye Colour" class="form-control">
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                        <button type="submit" name="singlebutton" class="btn btn-default">Submit</button>
                    </div>
                </div>

            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
</div>
</div>
<?php $this->load->view('user/includes/dashboard-footer.php');?>        