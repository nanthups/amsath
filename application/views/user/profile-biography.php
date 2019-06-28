<?php $this->load->view('user/includes/dashboard-header');?>       
<div class="dashboard-content">
  <div class="container">
   <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
     <strong><?php echo($this->session->flashdata('alert')); ?></strong>
   </div>
   <div class="card">
    <div class="card-header"> <h4 class="mb0">About</h4></div>
    <!-- Form Name -->
    <div class="venue-form-info card-body">
     <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <a href="<?php echo(base_url('user-biography')); ?>">Add Biography
          <span class="fas fa-plus float-right"></span>
        </a>
      </div>
    </div>
    <?php foreach ($biography as $value) { ?>
      <div class="biography-edit"><hr>
        <div class="float-right">
         <a title="edit" href="<?php echo base_url('user-biography/'.$value['bio_id']); ?>">
          <span class="fas fa-edit"></span></a>
          <a title="delete" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('delete-biography/'.$value['bio_id']); ?>">
           <span class="fas fa-trash"></span></a>
         </div>
         <h3><?php echo($value['bio_title']); ?></h3>
         <h5><?php echo(date('F-Y',strtotime($value['bio_from']))); echo(isset($value['bio_to'])?' - '.date('F-Y',strtotime($value['bio_to'])):' - Present'); ?></h5>
         <h5><?php echo($value['institution']); ?></h5>
         <h5><?php echo($value['place']); ?></h5>
         <p><?php echo($value['description']); ?></p>
       </div>
     <?php } ?>
   </div>
 </div>
</div>
</div>
<?php $this->load->view('user/includes/dashboard-footer.php');?>