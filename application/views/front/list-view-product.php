<?php defined('BASEPATH') OR exit('No direct script access allowed');
$urlcheck = $this->uri->segment(2);

?>
<!-- /.page-header -->
<!-- vendor-section -->
<p><br><br>
</p>
<div class="content">
  <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
           <strong><?php echo($this->session->flashdata('alert')); ?></strong>
       </div>
       
       <div class="alert alert-danger" <?php echo($this->session->flashdata('error')?'':'hidden') ?>>
           <strong><?php echo($this->session->flashdata('error')); ?></strong>
       </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-5 col-sm-12 col-12">
                <div class="sidebar-venue" >
                    <div>
                        <div>
                            <div class="filter-form">
                             <form class="form-row" method="post"  enctype="multipart/form-data">


                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h3 class="widget-title">filter</h3>
                                </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                   <select class="wide" name="price" id="pricerng">
                                    <option value="">Price</option>
                                    <option value="100,500">$100 to $500</option>
                                    <option value="500,2000">$500 to $2000</option>
                                    <option value="2000,3500">$2000 to $3500</option>
                                    <option value="3500,4500">$3500 to $4500</option>
                                    <option value="4500,5500">$4500 to $5500</option>
                                   </select>
                                   </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <select class="wide" name="gender" id="gndrslct">
                                  <option value="">Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb20">
                                    <!-- aminites -->
                                    <div class="aminities">
                                        <h3 class="widget-title"> Brand</h3>
                                        <!-- checkbox -->
                                        <?php
                                        if(count($brands))
                                        {
                                            foreach($brands as $key=>$val)
                                            {
                                                ?>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input chk_filter" id="customCheck<?=$key?>" value="<?= $val->id ?>">
                                                    <label class="custom-control-label" for="customCheck<?=$key?>" value="$val->id"> <?= $val->brand_name ?></label>
                                
                                                  </div>


                                                <?php
                                            }
                                        }
                                        ?>
                                       

                                    </div>
                                    <!-- /.aminites -->

                                </div>

                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-xl-10 col-lg-9 col-md-7 col-sm-12 col-12">
            <div class="row col-md-12">
              <?php
              foreach($prod as $key => $val)
              {  
                  ?>
                <div class="col-md-4">
                <a href="<?=base_url()?>product-details/<?=$urlcheck?>/<?=$val->id?>" class="prodcut-list">
                 <figure><img style="min-width: 210px; min-height: 280px;" src="<?=base_url()?>uploads/large/<?=$val->main_image?>" width="150"/></figure>
                 <span class="details">
                   <h3><?= $val->name ?></h3>
                   <h4><?= $val->short_description ?></h4>
                   <h5> Rs.<?= $val->price_inr ?> &nbsp; <s>Rs. <?= $val->actual_price_inr ?></s></h5>
                 </span>   
               </a>
                 <a href="<?=base_url()?>product-details/<?=$urlcheck?>/<?=$val->id?>" class="view-cart2 add_cart"> <i class="fa fa-cart-plus"></i> Buy Now</a>
                 <?php
                 if($user_id != "")
                 {
                  ?>
                  <a href="javascript:void(0);" class="view-cart2" onClick="add_wish(<?=$val->id?>)" >
                    <i class="fa fa-heart"></i> Add to Wishlist</a>
                    <?php
                  }
                  else
                  {
                    ?>
                    <a href="<?=base_url()?>site_visitor/userlogin" class="view-cart2">
                      <i class="fa fa-heart"></i> Add to Wishlist</a>
                   
                    <?php
                  }
                  ?>
                </div>

              <?php
          }
          ?>
      </div>
  </div>
  <!-- pagination -->
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="pagination justify-content-center">
        <nav aria-label="Page navigation example">
		
            <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>
        </nav>
    </div>
</div>
<!-- /.pagination -->


</div>
</div>

</div>


<!-- /. real-wedding-section -->

<!-- social-media-section -->
<script src="<?php echo base_url('assets/front/js/jquery.min.js'); ?>"></script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#pricerng').change(function(){
      var pricerng = $('#pricerng').val();
      if(pricerng)
      {
         apply_filter(pricerng,'price');
      }
      else
      {
         unset_filter('price');
      }
    })

    $('#gndrslct').change(function(){
      var gndrslct = $('#gndrslct').val();
      if(gndrslct)
      {
         apply_filter(gndrslct,'gender');
      }
      else
      {
         unset_filter('gender');
      }

    })

    $('.chk_filter').click(function(){
      var bndnme  = $(this).val();
      var bndid   = $(this).attr("id");
      
      if($('#'+bndid).prop("checked") == true){
        
        apply_filter(bndnme,'brand');
      }
      else
      {
        unset_filter(bndnme);
      }
    })

  });

  function apply_filter(val,cat)
  {
    var p_cat = <?= $urlcheck ?>;

      $.ajax({

                type: "GET",
                dataType: "html",
                url: "<?=base_url()?>product/filter",
                data: {val:val, cat:cat, p_cat:p_cat},
                success: function (result) { 
                  $('#filter_list').html(result);
            }
            });

  }

  function unset_filter(cat)
  {
    var p_cat = <?= $urlcheck ?>;

      $.ajax({

                type: "GET",
                dataType: "html",
                url: "<?=base_url()?>product/filter_unset",
                data: {cat:cat, p_cat:p_cat},
                success: function (result) { 
                  $('#filter_list').html(result);
            }
            });

  }

</script>



