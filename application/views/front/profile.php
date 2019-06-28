<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- vendor-section -->
<div class="gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="profile-header">
                    <div class="prof-img">
                        <img style="width: 173px; height: 173px;" src="<?php echo(base_url('uploads/users/'.$users->image));  ?>">
                    </div>
                    <h3>
                        <span><?php echo($users->fname.' '.$users->sname); ?></span>
                        <span class="prof-ico"><img src="<?php echo base_url('assets/front/images/prof-icon1.png'); ?>"></span>
                        <span class="prof-ico"><img src="<?php echo base_url('assets/front/images/prof-icon2.png'); ?>"></span>
                        <span class="prof-ico"><img src="<?php echo base_url('assets/front/images/prof-icon3.png'); ?>"></span>
                    </h3>
                    <h4><span class="active"><?php echo($users->type); ?></h4>
                        <h4><?php echo($contact->address); ?></h4>
                        <div class="clearfix">
                            <fieldset class="rate float-left">

                                <input type="hidden" id="userid" value="<?php echo($users->id); ?>">

                                <input id="rate2-star5" type="radio" name="rate2" value="5" <?php echo($users->star_rate==5)?'checked':''; ?>/>
                                <label for="rate2-star5" title="Excellent">5</label>

                                <input id="rate2-star4" type="radio" name="rate2" value="4" <?php echo($users->star_rate==4)?'checked':''; ?>/>
                                <label for="rate2-star4" title="Very good">4</label>

                                <input id="rate2-star3" type="radio" name="rate2" value="3" <?php echo($users->star_rate==3)?'checked':''; ?>/>
                                <label for="rate2-star3" title="Satisfactory">3</label>

                                <input id="rate2-star2" type="radio" name="rate2" value="2" <?php echo($users->star_rate==2)?'checked':''; ?>/>
                                <label for="rate2-star2" title="Bad">2</label>

                                <input id="rate2-star1" type="radio" name="rate2" value="1" <?php echo($users->star_rate==1)?'checked':''; ?>/>
                                <label for="rate2-star1" title="Awful">1</label>

                            </fieldset>
                            <!-- <span class="rating float-left">3</span> -->
                        </div>
                        <ul class="list-unstyled prof-social-icons clearfix">
                            <li><a target="blank" href="<?php echo($users->facebook_id); ?>"><img src="<?php echo base_url('assets/front/images/fb-icon.jpg'); ?>"></a></li>
                            <li><a target="blank" href="<?php echo($users->twitter_id); ?>"><img src="<?php echo base_url('assets/front/images/twitter-icon.jpg'); ?>"></a></li>
                            <li><a target="blank" href="<?php echo($users->youtube_ch); ?>"><img src="<?php echo base_url('assets/front/images/youtube-icon.jpg'); ?>"></a></li>
                            <li><a target="blank" href="<?php echo($users->instagram_id); ?>"><img src="<?php echo base_url('assets/front/images/insta-icon.jpg'); ?>"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="follow col-md-6">
                        <p><?php echo($flowr); ?> followers &nbsp &nbsp &nbsp <?php echo($flowg); ?> following</p>
                        <?php if($this->session->userdata('userid')!=$users->id): ?>
                        <a href="<?php echo !is_null($this->session->userdata('userid'))?base_url('/'.$users->id.'/'.$this->session->userdata('userid')):base_url('user-login');?>" class="sell-btn btn-default btn-sm">Follow</a>
                        <?php endif; if($this->session->userdata('utype') == ('Photographers'||'Models'||'Photo Retoucher') && $this->session->userdata('userid')==$users->id): ?>
                        <a href="<?php echo base_url('user-sell-files'); ?>" class="sell-btn btn-primary btn-sm"> <i class="fa fa-upload" aria-hidden="true"></i> 
                        Sell Items</a>
                        <?php endif; ?>
                    </div>
                </div>
          <!--  <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>-->
          <!--    <strong><?php echo($this->session->flashdata('alert')); ?></strong>-->
          <!--</div>-->

          <div class="profile-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="bio-tab" data-toggle="tab" href="#bio" role="tab" aria-controls="bio" aria-selected="true">Biography</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="profile" aria-selected="false">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="appearance-tab" data-toggle="tab" href="#appearance" role="tab" aria-controls="appearance" aria-selected="false">Appearance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="work" aria-selected="false">My Work</a>
            </li>
            <?php if($this->session->userdata('userid')): ?>
            <li class="nav-item">
                <a class="nav-link" id="chat-tab" data-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="false">Chat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="group-tab" data-toggle="tab" href="#group" role="tab" aria-controls="group" aria-selected="false">Group</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="agreement-tab" data-toggle="tab" href="#agreement" role="tab" aria-controls="agreement" aria-selected="false">Agreement</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" id="follow-tab" data-toggle="tab" href="#follow" role="tab" aria-controls="agreement" aria-selected="false">Followers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="following-tab" data-toggle="tab" href="#following" role="tab" aria-controls="following" aria-selected="false">Following</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="application-tab" data-toggle="tab" href="#application" role="tab" aria-controls="application" aria-selected="false">Application</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="bio" role="tabpanel" aria-labelledby="bio-tab">
                <div class="timeline-centered">
                    <?php foreach ($biography as $value) { ?>
                        <article class="timeline-entry">
                         <div class="timeline-entry-inner">
                            <time class="timeline-time" datetime=""><span><?php echo(date('F-Y',strtotime($value['bio_from']))); echo(isset($value['bio_to'])?'- '.date('F-Y',strtotime($value['bio_to'])):''); ?></span></time>
                            <div class="timeline-icon">
                                <i class="entypo-feather"></i>
                            </div>
                            <div class="timeline-label">
                                <h2><?php echo($value['bio_title']); ?></h2>
                                <h3><?php echo($value['institution']); ?></h3>
                                <h3><?php echo($value['place']); ?></h3>
                                <p><?php echo($value['description']); ?></p>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
           <div class="row myprofile-contact">
              <div class="col-md-4">
                 <p><span class="icons"><img src="<?php echo base_url('assets/front/images/phone.png');?>"></span> +91 <?php echo($contact->mobile); ?></p>
             </div>
             <div class="col-md-8">
               <p><span class="icons"><img src="<?php echo base_url('assets/front/images/wtsap.png');?>"></span> +91 <?php echo($contact->whatsapp); ?></p>
           </div>
           <div class="col-md-4">
               <p><span class="icons"><img src="<?php echo base_url('assets/front/images/mail.png');?>"></span> <?php echo($contact->email); ?></p>
           </div>
           <div class="col-md-8">
               <p><span class="icons"><img src="<?php echo base_url('assets/front/images/skype.png');?>"></span> <?php echo($contact->skype); ?></p>
           </div>
           <div class="col-md-4">
               <p><span class="icons"><img src="<?php echo base_url('assets/front/images/loc.png');?>"></span><span class="adrs"><?php echo($contact->address); ?></span> </p>
           </div>
           <div class="col-md-8">
               <p><span class="icons"><img src="<?php echo base_url('assets/front/images/web.png');?>">
               </span><?php echo($contact->behance); ?></p>
           </div>

       </div>
   </div>
   <div class="tab-pane fade" id="appearance" role="tabpanel" aria-labelledby="appearance-tab">

       <div class="row">
        <div class="col-md-8">
           <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="vendor-feature-block feature-block <?php echo(($appearance->ua_gender == 'Male')?'active':''); ?>">
                    <div class="feature-icon">
                        <a href="#"><i class="fa fa-male" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="feature-content">
                        <h3 class="feature-title"><a href="#">Male</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="vendor-feature-block feature-block <?php echo(($appearance->ua_gender == 'Female')?'active':''); ?>">
                    <div class="feature-icon">
                        <a href="#">   <i class="fa fa-female" aria-hidden="true"></i></a>
                    </div>
                    <div class="feature-content">
                        <h3 class="feature-title"><a href="#">Female</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="vendor-feature-block feature-block <?php echo(($appearance->ua_gender == 'Transgender')?'active':''); ?>">
                    <div class="feature-icon">
                        <a href="#">  <i class="fa fa-transgender" aria-hidden="true"></i></a>
                    </div>
                    <div class="feature-content">
                        <h3 class="feature-title"><a href="#">Transgender</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
    </div>
</div><br>

<div class="row">
  <div class="col-md-12 col-xl-12 col-lg-12">
     <ul class="list-group">
        <li class="list-group-item">Height      :  <?php echo($appearance->ua_height); ?> CM</li>
        <li class="list-group-item">Waist       : <?php echo($appearance->ua_waist); ?> CM</li>
        <li class="list-group-item">Chest       : <?php echo($appearance->ua_chest); ?>  CM</li>
        <li class="list-group-item">Collar      : <?php echo($appearance->ua_collar); ?>  CM</li>
        <li class="list-group-item">Inseam      : <?php echo($appearance->ua_inseam); ?>  CM</li>
        <li class="list-group-item">Suit        : <?php echo($appearance->ua_suit); ?>  CM</li>
        <li class="list-group-item">Sleev       : <?php echo($appearance->ua_sleev); ?> CM</li>
        <li class="list-group-item">Shoe Size   : <?php echo($appearance->ua_shoe_size); ?> CM</li>
        <li class="list-group-item">Hair Colour : <?php echo($appearance->ua_hair_colour); ?></li>
        <li class="list-group-item">Eye Colour  : <?php echo($appearance->ua_eye_colour); ?></li>
    </ul>
</div>
</div>
</div>
<div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="work-tab">
   <div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Photos</a>
        </li>
        <li role="presentation">
            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Videos</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <?php foreach ($work_file as $value) { ?>
                <img class="col-xl-2" src="uploads/small/<?php echo($value['work_file']); ?>">
                <?php if(isset($users->id) == $this->session->userdata('userid')) { ?>
                    <a href="User/delete_work/<?php echo($value['uw_id']); ?>"><i class="fa fa-trash"></i></a>
                <?php } } ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
               <h4>Click on link to watch the video.</h4>
               <?php foreach ($work_link as $value) { ?>
                  <a class="col-xl-2" target="blank" href="<?php echo($value['work_link']);?>"><?php echo($value['work_title']);?></a>
                  <?php if(isset($users->id) == $this->session->userdata('userid')) { ?>
                    <a href="User/delete_work/<?php echo($value['uw_id']); ?>"><i class="fa fa-trash"></i></a>
                <?php } } ?>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab">
    <div class="row">
     <div class="col-md-3">
        <h4>Friends</h4>
        <?php if(!empty($friends)) { foreach($friends as $value): ?>
            <span class="group-list selectVendor" id="<?php echo($value['id']);?>" title="<?php echo($value['fname'].' '.$value['sname']);?>">
                <span><img src="uploads/users/<?php echo($value['image']); ?>"></span>
                <span> 
                    <h2><?php echo($value['fname'].' '.$value['sname']);?></h2>
                    <p><?php echo($value['place']);?></p>
                </span>
                <u class="clearfix"></u>
            </span>
        <?php endforeach; } else { ?>
            <span><h2>No Friends Find...</h2></span>
        <?php } ?>
    </div>
    <div class="col-md-3">
        <h4>Groups</h4>
        <?php if(!empty($groups)) { foreach ($groups as  $value) { ?>
            <span class="group-list selectGroup" id="<?php echo($value['grp_id']);?>" title="<?php echo($value['grp_name']);?>">
                <span><i class="fa fa-users fa-3x"></i></span>
                <span> 
                    <h2><?php echo($value['grp_name']);?></h2>
                    <p><?php echo($value['grp_tag']);?></p>
                </span>
                <u class="clearfix"></u>
            </span>
        <?php } } else { ?>
            <span>No Groups</span>
        <?php } ?>
    </div>
    <div class="col-md-6" id="chatSection">
     <div class="box-header with-border">
      <h3 class="box-title" id="ReciverName_txt">Select Friend with Chat</h3>
  </div>
  <div class="chat-box">
    <div class="chat-area" id="content">
        <div  id="dumppy"></div>
    </div>
    <div class="chat-bottom">
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                 <input type="hidden" id="Sender_Name" value="<?php echo($users->fname);?>">
                 <input type="hidden" id="ReciverId_txt">
                 <input type="hidden" id="GroupId_txt">
                 <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
             </div>
         </div>
         <div class="col-md-2">
            <button type="button" class="btn btn-rounded btn-light btnSend" id="nav_down">Send</button>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="agreement" role="tabpanel" aria-labelledby="agreement-tab">
    <div class="request-list-table table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Agreement with</th>
                    <th>Work Type</th>
                    <th>No of photos</th>
                    <th>Started Date</th>
                    <th>Finishing Date</th>
                    <th>Finished Date</th>
                    <th>Delay</th>
                    <th>Staus</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($agreements)) { foreach ($agreements as  $value) { ?>
                    <tr>
                        <td><?php echo($value['agr_with']);?>s</td>
                        <td><?php echo($value['agr_title']);?></td>
                        <td><?php echo($value['no_images']);?></td>
                        <td><?php echo(date('F d, Y',strtotime($value['create_on']))); ?></td>
                        <td><?php echo(date('F d, Y',strtotime($value['agr_exp']))); ?></td>
                        <td><?php echo(date('F d, Y',strtotime($value['agr_comp']))); ?></td>
                        <td><?php echo($value['arg_delay']);?></td>
                        <td><?php echo($value['agr_status']);?></td>
                    </tr>
                <?php } } else { ?>
                 <tr><td colspan="8">No Agreements</td></tr>
             <?php } ?>
         </tbody>
     </table>
 </div>
</div>
<div class="tab-pane fade followers" id="follow" role="tabpanel" aria-labelledby="follow-tab">
    <?php if(!empty($followers)) { foreach ($followers as  $value) { ?>
     <div class="profile-bx">
         <span><a href="#"><img src="<?php echo base_url('uploads/users/'.$value['image']); ?>" alt=""></a></span>
         <span>  <h2><a href="#"><?php echo($value['fname'].' '.$value['sname']) ?></a></h2>
            <p><?php echo($value['place']) ?></p>
            <?php if(false === array_search($value['id'], array_column($following, 'id'))){
              if(isset($users->id) == $this->session->userdata('userid')) { ?>
              <button style="cursor: pointer;" class="follow" onclick="follow(<?php echo($value['id']);?>)">Follow Back</button>
          <?php } } ?>
      </span>
  </div>
<?php } } else { ?>
    <h3>No Followers</h3>
<?php } ?>
<div class="clearfix"></div>
</div>
<div class="tab-pane fade followers" id="following" role="tabpanel" aria-labelledby="following-tab">
    <?php if(!empty($following)) { foreach ($following as  $value) { ?>
     <div class="profile-bx">
         <span><a href="#"><img src="<?php echo base_url('uploads/users/'.$value['image']); ?>" alt=""></a></span>
         <span>  <h2><a href="#"><?php echo($value['fname'].' '.$value['sname']) ?></a></h2>
            <p><?php echo($value['place']) ?></p>
            <button style="cursor: pointer;" class="follow" onclick="unfollow(<?php echo($value['id']);?>)">Unfollow</button>
        </span>
    </div>
<?php } } else { ?>
    <h3>No Followings</h3>
<?php } ?>
<div class="clearfix"></div>
</div>
<div class="tab-pane fade" id="group" role="tabpanel" aria-labelledby="group-tab">
    <div class="row">
        <div class="col-md-7">
            <h4><span id="groupname">Group Name</span></h4>
            <div class="clearfix"></div>
            <div id="groupmem"></div>
        </div>
        <div class="col-md-5 group-right" id="grouplist">
            <div align="right">
                <div class="row">
                    <div class="col-md-4" align="left">
                        <?php echo isset($groups)?count($groups):''; ?> group
                    </div>
                    <?php if(isset($users->id) == $this->session->userdata('userid')) { ?>
                        <div class="col-md-8">
                            <span id="addgroup" class="btn btn-outline-light btn-sm">+ Create new group</span>
                        </div>
                    <?php } ?>
                </div>
            </div><br>
           <?php if(!empty($groups)) { foreach ($groups as  $value) { ?>
                <span class="group-list userGroup" id="<?php echo($value['grp_id']) ?>" groname="<?php echo($value['grp_name']) ?>" gcount="<?php echo(count($groups)) ?>">
                    <span><i class="fa fa-users fa-3x"></i></span>
                    <span><h2><?php echo($value['grp_name']) ?></h2>
                        <p><?php echo($value['grp_tag']) ?></p>
                    </span>
                    <u class="clearfix"></u>
                </span>
            <?php } } else { ?>
                <span>No Groups</span>
            <?php } ?>
        </div>
        <div class="col-md-5 group-right" id="groupadd" style="display: none;">
            <div align="right">
                <div class="row">
                    <div class="col-md-4" align="left">New group</div>
                    <div class="col-md-8">
                        <span id="cancel" class="btn btn-outline-light btn-sm">Cancel</span>
                    </div>
                </div>
            </div><br>
            <form name="crtgroup" action="<?php echo(base_url('create-group')); ?>">
                <div class="venue-form-info card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <span class="form-control btn btn-danger" style="display: none;" id="malert">
                                Enter Group Name
                            </span>
                            <span class="form-control btn btn-success" style="display: none;" id="salert">
                                Successfully Created
                            </span>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="control-label" for="title">Group Name:</label>
                                <input name="grp_name" id="grpname" type="text" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="control-label" for="title">Group Tag:</label>
                                <input name="grp_tag" type="text" placeholder="Tag" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="control-label" for="title">Select members:</label>
                                <div class="col-xl-12">
                                    <?php if(!empty($friends)) { foreach($friends as $value): ?>
                                        <span class="group-list selectVendor" id="<?php echo($value['id']);?>" title="<?php echo($value['fname'].' '.$value['sname']);?>">
                                            <span><img src="uploads/users/<?php echo($value['image']); ?>"></span>
                                            <span> 
                                                <h2><?php echo($value['fname'].' '.$value['sname']);?></h2>
                                                <p><?php echo($value['place']);?></p>
                                            </span>
                                            <input name="group_mem[]" value="<?php echo($value['id']);?>" type="checkbox">
                                            <u class="clearfix"></u>
                                        </span>
                                    <?php endforeach; } else { ?>
                                        <span><h2>No Friends...</h2></span>
                                    <?php } ?>
                                    <input type="hidden" value="<?php echo($users->id); ?>" name="group_mem[]">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
    <div class="row"> 
        <?php if(!empty($usersadds)) { foreach ($usersadds as  $value) { ?>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-4 col-12 dashboard-pricing">
                <div class="pricing-box pricing-basic">
                    <!-- pricing box -->
                    <a href="#" class="dashboard-price-badge badge badge-success">Current Active</a>
                    <h4 class="pricing-name">Posted : <?php echo(date('F d, Y',strtotime($value['ads_post_date']))); ?></h4>
                    <h2><?php echo($value['ads_title']); ?></h2>
                    <div class="price-feature">
                        <ul class="listnone">
                            <li>No. <?php echo($value['ads_person']); ?></li>
                            <li><?php echo($value['ads_description']); ?>. </li>
                            <li>Expire : <?php echo(date('F d, Y',strtotime($value['ads_expire']))); ?></li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-primary">Apply</a>
                </div>
            </div>
        <?php } } else { ?>
            <h3>No Application</h3>
        <?php } ?>
    </div>
</div>
<div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
   <div class="alert alert-success" <?php echo($this->session->flashdata('msg_sent')?'':'hidden') ?>>
     <strong><?php echo($this->session->flashdata('msg_sent')); ?></strong>
   </div>
   <?php echo form_open('user-profile-message/'.$users->id); ?>
            <div class="form-group">
                <label class="control-label" for="title">Name</label>
                <input id="title" name="name" type="text" placeholder="Enter Your Name" class="form-control " required>
            </div>
            
            <div class="form-group">
                <label class="control-label" for="title">Email Id</label>
                <input id="title" name="email" type="email" placeholder="Enter Your Email" class="form-control " required>
            </div>
       
            <div class="form-group">
                <label class="control-label" for="title">Message</label>
				<textarea class="form-control" id="title" name="message" placeholder="Message" rows="3"></textarea>
            </div>
            <div>
            <button type="submit" name="singlebutton" class="btn btn-dark">Send</button>
        </div>
    <?php echo form_close(); ?>
</div>
</div>
</div>
</div>

<!-- /.real-wedding-section -->
