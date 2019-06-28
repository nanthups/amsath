<?php $this->load->view('user/includes/dashboard-header');?>
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title ">My Profile</h3>
                    <p>Change your profile image and information edit and save.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Password Change</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Email Notifications</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Delete Account</a>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
                      <strong><?php echo($this->session->flashdata('alert')); ?></strong>
                  </div>
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="card">
                        <div class="card-header">Profile</div>
                        <div class="card-body">
                            <?php echo form_open_multipart('User/profile_update/'.$users->id.'/'.$users->image); ?>
                            <!-- Form Name -->
                            <div class="profile-upload-img">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                        <div id="image-preview">
                                            <img src="uploads/users/<?php echo(isset($users->image)?$users->image:''); ?>">
                                        </div>
                                        <input type="file" name="image" id="image-upload" class="upload-profile-input">
                                    </div>
                                </div>
                            </div>
                            <div class="personal-form-info">
                                <div class="row">
                                    <!-- Text input-->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="vendorname">First Name</label>
                                            <input id="vendorname" value="<?php echo(isset($users->fname)?$users->fname:''); ?>" name="fname" type="text" placeholder="" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="vendorname">Sur Name</label>
                                            <input id="vendorname" value="<?php echo(isset($users->sname)?$users->sname:''); ?>" name="sname" type="text" placeholder="" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="email">Email</label>
                                            <input id="email" value="<?php echo(isset($users->email)?$users->email:''); ?>" name="email" type="email" placeholder="" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="phone">Phone</label>
                                            <input id="phone" value="<?php echo(isset($users->phone)?$users->phone:''); ?>" name="phone" type="text" placeholder="" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="place">Place</label>
                                            <input id="place" value="<?php echo(isset($users->place)?$users->place:''); ?>" name="place" type="text" placeholder="" class="form-control ">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="social-form-info mb-0">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h3>Social Media </h3>
                                        <div class="dashboard-section-line">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="facebook">Facebook</label>
                                            <input id="facebook" value="<?php echo(isset($users->facebook_id)?$users->facebook_id:''); ?>" name="facebook_id" type="url" placeholder="https://www.facebook.com" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="twitter">Twitter</label>
                                            <input id="twitter" value="<?php echo(isset($users->twitter_id)?$users->twitter_id:''); ?>" name="twitter_id" type="url" placeholder="https://www.twitter.com" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="instagram">Instagram</label>
                                            <input id="instagram" value="<?php echo(isset($users->instagram_id)?$users->instagram_id:''); ?>" name="instagram_id" type="url" placeholder="https://www.instagram.com" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="youtube">Youtube</label>
                                            <input id="youtube" value="<?php echo(isset($users->youtube_ch)?$users->youtube_ch:''); ?>" name="youtube_ch" type="url" placeholder="https://www.youtube.com" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <button class="btn btn-default" type="submit">Update profile</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="card">
                        <div class="card-header">Password Change</div>
                        <div class="card-body">
                            <?php echo form_open('User/chngpwd_exe','class="row"'); ?>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label" for="currentpassword">Current Password</label>
                                    <input id="currentpassword" name="password" value="<?php echo(isset($password)?$password:'')?>" type="password" placeholder="" class="form-control ">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label" for="newpassword">New Password</label>
                                    <input id="newpassword" name="newpassword" value="<?php echo(isset($newpassword)?$newpassword:'')?>" type="password" placeholder="" class="form-control ">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label" for="retypepassword">Retype Password</label>
                                    <input id="retypepassword" name="retypepassword" value="<?php echo(isset($retypepassword)?$retypepassword:'')?>" type="password" placeholder="" class="form-control ">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button class="btn btn-default" type="submit">Save Changes</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="card">
                        <div class="card-header">Email Notifications</div>
                        <div class="">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">Follows email notifications
                                    <?php echo form_open('user-notification'); ?>
                                      <div class="switch-notification">
                                       <label class="switch">
                                        <input type="checkbox" <?php echo ($users->email_noti == 'Y')?'checked':''?> name="notification" value="Y" onchange="this.form.submit()">
                                        <span class="slider"></span>
                                       </label>
                                      </div>
                                    <?php echo form_close(); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="card">
                        <div class="card-header">Account Delete</div>
                         <div class="card-body">
                           <p>In the fields below, enter your new password.</p>
                            <?php echo form_open('user-profile-delete'); ?>
                            <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" id="customCheck1" name="inputDelete" value="deleteFull">
                            <label class="custom-control-label" for="customCheck1">Delete my account and data listing also.</label>
                         </div>
                         <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" id="customCheck2" name="inputDelete" value="deleteAccount">
                            <label class="custom-control-label" for="customCheck2">Delete my account only.</label>
                        </div>
                        <button onclick="return confirm('Are you sure to Delete your account?')" class="btn btn-primary mt30" type="submit">Delete My Account</button>
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
<script type="text/javascript">
  window.onload = function () {
    var fileUpload = document.getElementById("image-upload");
    fileUpload.onchange = function () {
      if (typeof (FileReader) != "undefined") {
        var imagePreview = document.getElementById("image-preview");
        imagePreview.innerHTML = "";
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        for (var i = 0; i < fileUpload.files.length; i++) {
          var file = fileUpload.files[i];
          if (regex.test(file.name.toLowerCase())) {
            var reader = new FileReader();
            reader.onload = function (e) {
              var img = document.createElement("IMG");
              img.height = "120";
              img.width = "100";
              img.src = e.target.result;
              imagePreview.appendChild(img);
          }
          reader.readAsDataURL(file);
      } else {
        alert(file.name + " is not a valid image file.");
        imagePreview.innerHTML = "";
        return false;
    }
}
} else {
    alert("This browser does not support HTML5 FileReader.");
}
}
};
</script>
<?php $this->load->view('user/includes/dashboard-footer.php');?>