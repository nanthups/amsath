<?php $this->load->view('user/includes/dashboard-header');?>        
<div class="dashboard-content">
    <div class="container">
     <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
         <strong><?php echo($this->session->flashdata('alert')); ?></strong>
     </div>
     <div class="card">
        <div class="card-header"> <h4 class="mb0">Contact </h4></div>
        <div class="">
            <?php echo form_open('manage-contact'); ?>
            <!-- Form Name -->
            <div class="venue-form-info card-body">
              <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Mobile</label>
                        <input id="title" name="mobile" value="<?php echo(isset($contact->mobile)?$contact->mobile:''); ?>" type="text" placeholder="Mobile" class="form-control " required>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Whatsapp</label>
                        <input id="title" name="whatsapp" value="<?php echo(isset($contact->whatsapp)?$contact->whatsapp:''); ?>" type="text" placeholder="Whatsapp" class="form-control ">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Skype</label>
                        <input id="title" name="skype" value="<?php echo(isset($contact->skype)?$contact->skype:''); ?>" type="text" placeholder="Skype ID" class="form-control ">
                    </div>
                </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Email ID</label>
                        <input id="title" value="<?php echo($this->session->userdata('email')); ?>" type="email" disabled class="form-control" >
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Address</label>
                        <textarea name="address" class="form-control"><?php echo(isset($contact->address)?$contact->address:''); ?></textarea>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Behance Link</label>
                        <input id="title" name="behance" value="<?php echo(isset($contact->behance)?$contact->behance:''); ?>" type="text" placeholder="Behance" class="form-control ">
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