 <?php $this->load->view('user/includes/dashboard-header');?> 
 <style type="text/css">
   .add-button{
    color: #fff;
    background-color: #f8971d;
    border-color: #f8971d;
    margin-left: 520px;
    margin-top: -100px;
}
</style>
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title">Create New Agreement</h3>
                    <p>You can Create New Agreement here </p>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" <?php echo(validation_errors()?'':'hidden') ?>>
         <strong><?php echo validation_errors(); ?></strong>
     </div>
     <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">
            <a href="<?php echo(base_url('user-agreement-list')); ?>" class="btn btn-default btn-sm">Back to list</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><h4 class="mb0"> New Agreement</h4></div>
        <div class="">
         <?php echo form_open_multipart('user-agreement'); ?>
         <!-- Form Name -->
         <div class="venue-form-info card-body">
            <div class="row">
             <!-- Text input-->
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="title">Title</label>
                    <input id="agr_title" name="agr_title" value="<?php echo($agr_title?$agr_title:'') ?>" type="text" placeholder="Title" class="form-control ">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!-- Select Basic -->
                <!--<div class="form-group">-->
                <!--    <label class="control-label" for="Category">Agreement with</label>-->
                <!--    <input id="agr_with" name="agr_with" value="<?php echo($agr_with?$agr_with:'') ?>" type="text" placeholder="Name" class="form-control ">-->
                <!--</div>-->
                <div class="form-group">
                    <label class="control-label" for="Category">Agreement with</label>
                    <select class="form-control wide" name="agr_with" id="agr_with">
                        <?php foreach ($followers as $value) { $selected = '';
                        if($value['fname'] == $agr_with) { $selected = 'selected'; } ?>
                        <option  <?php echo $selected; ?> value="<?php echo($value['fname']); ?>"><?php echo($value['fname']); ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
             <div class="form-group">
                <label class="control-label" for="agr_amt">Total Amount</label>
                <input id="agr_amt" name="agr_amt" type="number" value="<?php echo($agr_amt?$agr_amt:'') ?>" placeholder="Price" class="form-control ">
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label class="control-label" for="agr_desc">Job Description</label>
                <textarea class="form-control" name="agr_desc" value="<?php echo($agr_desc?$agr_desc:'') ?>" id="agr_desc" rows="3"></textarea>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
                <label class="control-label" for="agr_exp">Expire Date</label>
                <input id="datepicker-3" name="agr_exp" type="text" value="<?php echo($agr_exp?$agr_exp:'') ?>" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
                <label class="control-label" for="no_images">Number of Images</label>
                <input id="no_images" name="no_images" type="number" value="<?php echo($no_images?$no_images:'') ?>" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
                <label class="control-label" for="postcode">Upload Images</label>
                <div class="custom-file mb-3">
                    <input type="file" name="file_name[]" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile" placeholder="choose file">Upload Images
                    </label>
                </div>
                <div class="add-button btn btn-default btn-sm enroll-btnm" current="0">
                    <i class="fa fa-plus"></i>
                </div>
                <input type="hidden" name="nexttr" id="nexttr" value="1">
                <div class="clone-append"></div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <button type="submit" class="btn btn-rounded btn-dark">Send</button>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>
<?php $this->load->view('user/includes/dashboard-footer.php');?> 