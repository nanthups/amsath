<?php $this->load->view('user/includes/dashboard-header');?>
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title">Sell New Item</h3>
                    <p>Sell your photos, documents and other files </p>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" <?php echo(validation_errors()?'':'hidden') ?>>
           <strong><?php echo validation_errors(); ?></strong>
       </div>
       <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
           <strong><?php echo($this->session->flashdata('alert')); ?></strong>
       </div>
       <div class="card">
        <div class="card-header"> <h4 class="mb0">About Listing</h4></div>
        <div class="">
            <?php echo form_open_multipart('sell-files'); ?>
            <!-- Form Name -->
            <div class="venue-form-info card-body">
               <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2">
                    <div class="form-group">
                        <label class="control-label" for="title">JPG</label>

                        <input id="title" <?php echo(isset($file_type)?($file_type == 'JPG')?'checked':'':'') ?> name="file_type" value="JPG" type="radio" placeholder="Title" >
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2">
                    <div class="form-group">
                        <label class="control-label" for="title">AI</label>

                        <input id="title" <?php echo(isset($file_type)?($file_type == 'AI')?'checked':'':'') ?> name="file_type" value="AI" type="radio" placeholder="Title" >
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2">
                    <div class="form-group">
                        <label class="control-label" for="title">CDR</label>

                        <input id="title" <?php echo(isset($file_type)?($file_type == 'CDR')?'checked':'':'') ?> name="file_type" value="CDR" type="radio" placeholder="Title" >
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2">
                    <div class="form-group">
                        <label class="control-label" for="title">PSD</label>

                        <input id="title" <?php echo(isset($file_type)?($file_type == 'PSD')?'checked':'':'') ?> name="file_type" value="PSD" type="radio" placeholder="Title" >
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2">
                    <div class="form-group">
                        <label class="control-label" for="title">DOC</label>

                        <input id="title" <?php echo(isset($file_type)?($file_type == 'DOC')?'checked':'':'') ?> name="file_type" value="DOC" type="radio" placeholder="Title" >
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2">
                    <div class="form-group">
                        <label class="control-label" for="title">PDF</label>

                        <input id="title" <?php echo(isset($file_type)?($file_type == 'PDF')?'checked':'':'') ?> name="file_type" value="PDF" type="radio" placeholder="Title" >
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2">
                    <div class="form-group">
                        <label class="control-label" for="title">ACAD</label>
                        <input id="title" <?php echo(isset($file_type)?($file_type == 'ACAD')?'checked':'':'') ?> name="file_type" value="ACAD" type="radio" placeholder="Title" >
                    </div>
                </div>
            </div>
            <div class="row">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" <?php echo(isset($old_file)?'':'hidden'); ?>>
                <div class="form-group">
                    <label class="control-label" for="title">Current File</label>
                    <img class="form-control" style="width: 25%;" src="<?php echo base_url('uploads/small/'.$old_file); ?>">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="title">Select Source File JPG</label>
                    <input id="title" name="file_name" type="file" placeholder="Title" class="form-control ">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="title">Select Source File AI (Illustrator File)</label>
                    <input id="title" name="illustrator_file" type="file" placeholder="Title" class="form-control ">
                </div>
            </div>
            <!-- Text input-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="control-label" for="title">Title</label>
                    <input id="title" name="file_title" value="<?php echo(isset($file_title)?$file_title:''); ?>" type="text" placeholder="Title" class="form-control ">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!-- Select Basic -->
                <div class="form-group">
                    <label class="control-label" for="Category">Category</label>
                    <select class="wide" name="category" id="Category" multiple="multiple">
                        <?php foreach ($files_category as $value) { $selected = '';
                        if($value['id'] == $category) { $selected = 'selected'; } ?>
                        <option  <?php echo $selected; ?> value="<?php echo($value['id']); ?>"><?php echo($value['category']); ?></option>
                    <?php } ?>
                </select>

            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
                <label class="control-label" for="price">Price <small>(Start From)</small></label>
                <input id="price" name="file_price" value="<?php echo(isset($file_price)?$file_price:''); ?>" type="text" placeholder="Price" class="form-control ">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
                <label class="control-label" for="price">Website Charge </label>
                <input id="web-charge" name="web_charge" value="<?php echo(isset($web_charge)?$web_charge:''); ?>" type="text" placeholder="Price" class="form-control" readonly="readonly">
                <span id="errmsg"></span>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
                <label class="control-label" for="price">Showing Price </label>
                <input id="show-price" name="show_price" value="<?php echo(isset($show_price)?$show_price:''); ?>" type="text" placeholder="Price" class="form-control ">
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label class="control-label" for="address">Keywords </label>
                <textarea name="keyword" class="form-control"><?php echo(isset($keyword)?$keyword:''); ?></textarea>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <input type="hidden" value="<?php echo(isset($file_id)?$file_id:''); ?>" name="file_id">
            <input type="hidden" value="<?php echo(isset($old_file)?$old_file:''); ?>" name="old_file">
            <input type="hidden" value="<?php echo(isset($illustrator_file)?$illustrator_file:''); ?>" name="old_zip">
            <div class="form-group">
                <?php if ($file_id) { ?>
                   <button type="submit" name="submit" value="update" class="btn btn-default">Update</button>
               <?php } else { ?>
                   <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
               <?php } ?>
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