<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<main class="product-detail-container" style="margin-top: 8%">
  <div class="pdp-details clearfix">
    <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
     <strong><?php echo($this->session->flashdata('alert')); ?></strong>
   </div>
   <div class="alert alert-danger" <?php echo($this->session->flashdata('error')?'':'hidden') ?>>
     <strong><?php echo($this->session->flashdata('error')); ?></strong>
   </div>
   <div class="image-container">
    <img src="<?php echo base_url('uploads/watermark/'.$files->file_name);?>">
  </div>
  <div class="pdp-description-container">
    <div class="pdp-price-info">
      <h1 class="pdp-title"><?php echo($files->file_title); ?></h1>
      <p class="pdp-discount-container">
        <strong class="pdp-price">Rs. <?php echo($files->show_price); ?></strong>
        <s class="pdp-mrp">Rs. <?php echo($files->file_price); ?></s>
        <span class="pdp-discount">(<?php echo(100-round($files->show_price*100/$files->file_price, 0)) ?>% OFF)</span></p>
        <p class="pdp-selling-price">
          <span class="pdp-vatInfo">Additional tax may apply; charged at checkout</span>
        </p>
      </div>
      <div class="row">
        <div class="col-md-12 itemContainer-base-sizeAndQty clearfix mb-2">
          
       </div>
     </div>
     <div class="pdp-action-container">
      <?php if ($this->session->userdata('userid')) : $this->session->unset_userdata('fileid');?>
        <a id="carthref" onclick="return confirm('Do you want to add this in cart?');" href="<?php echo base_url('image-cart/'.$files->file_id); ?>" class="btn btn-yellow btn-lg">Add to Cart</a>
        <?php else : $this->session->set_userdata('fileid',$files->file_id); ?>
          <a href="<?php echo base_url('user-login'); ?>" class="btn btn-yellow btn-lg">Add to Cart</a>
        <?php endif; ?>
    </div>
  </div>
</div>
</main>
