<?php defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!-- /.page-header -->
<!-- vendor-section -->
<p><br><br>
</p>

<main class="product-detail-container" >

    <?php
    $cat_name     = $this->Category1_model->get_row('category1','category',array('id'=>$prod[0]->cat_id1));
    $cat_sub_name = $this->Category1_model->get_row('category2','category2',array('id'=>$prod[0]->cat_id2));
    ?>
    <div class="breadcrumbs-base">
        <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
           <strong><?php echo($this->session->flashdata('alert')); ?></strong>
       </div>
       
       <div class="alert alert-danger" <?php echo($this->session->flashdata('error')?'':'hidden') ?>>
           <strong><?php echo($this->session->flashdata('error')); ?></strong>
       </div>
        <ul class="breadcrumbs-list list-unstyled">
            <li class="breadcrumbs-item"><a class="breadcrumbs-crumb" href="<?=base_url()?>"><span>Home</span></a></li>
            <li class="breadcrumbs-item"><a class="breadcrumbs-crumb" href="<?=base_url()?>list-product/<?=$prod[0]->cat_id1?>"><span><?=$cat_name->category?></span></a></li>
            <!-- <li class="breadcrumbs-item"><a class="breadcrumbs-crumb" href="#"><span>Men Clothing</span></a></li> -->
            <li class="breadcrumbs-item"><a class="breadcrumbs-crumb" href="<?=base_url()?>list-product/<?=$prod[0]->cat_id1?>"><span><?=$cat_sub_name->category2?></span></a></li>
            <li class="breadcrumbs-item"><span class="breadcrumbs-crumb" style="font-size: 14px; margin: 0px;"><?=$prod[0]->name?></span></li>
        </ul>
    </div>
    <div class="pdp-details clearfix">
	


     <div class="image-container">

        <div class="row">
           <div class="col-md-12">
             <img src="<?=base_url()?>uploads/large/<?= $prod[0]->main_image?>">
         </div>
     </div>
     <br clear="all">
     <div class="row">
        <?php
        foreach($prod_subimg as $key => $val)
        {  
          ?>
          <div class="col-md-4">
           <img src="<?=base_url()?>uploads/medium/<?=$val->image?>">
       </div>
   <?php } ?>
</div>

</div>
<!--OFF Percentage -->
<?php
$deff   = $prod[0]->actual_price_inr-$prod[0]->price_inr;
$off    = floor($deff / $prod[0]->actual_price_inr * 100);
?>

<div class="pdp-description-container">
    <div class="pdp-price-info">
        <h1 class="pdp-title"><?= $prod[0]->name ?></h1>
        <h1 class="pdp-name pdp-bb1"><?= $prod[0]->short_description ?></h1>

        <p class="pdp-discount-container">
            <?php if($prod[0]->actual_price_inr != $prod[0]->price_inr) {  ?>
                <strong class="pdp-price">Rs. <?=$prod[0]->price_inr ?></strong>
                <s class="pdp-mrp">Rs. <?=$prod[0]->actual_price_inr ?></s>
                <span class="pdp-discount">(<?=$off?>% OFF)</span>
            <?php } else { ?>
                <strong class="pdp-price">Rs. <?=$prod[0]->price_inr ?></strong>
            <?php } ?>
        </p>
        <p class="pdp-selling-price">
            <span class="pdp-vatInfo">Additional tax may apply; charged at checkout</span>
        </p>
    </div>

    <?php 
    $clr_arr    = explode(',',$prod[0]->color);
    $size_arr   = explode(',',$prod[0]->size);
                // print_r(count($size_arr)); exit(); 
    ?> 
   <div class="size-buttons-size-container" id="sizeButtonsContainer">
        <div class="size-buttons-size-header">
            <h4 class="size-buttons-select-size">Select Size</h4>
            <span class="size-buttons-size-chart">
                <button class="size-buttons-show-size-chart">Size Chart</button>
                <span class="size-buttons-arrow"></span>
            </span>
        </div>
        <div class="row">
		<div class="col-md-12 itemContainer-base-sizeAndQty clearfix mb-2">
		<div class="itemComponents-base-quantity">
		 <div class="float-left mr-2">Size:</div> 
             <select name="prod-quantity">
             <option value="1">S</option>
             <option value="2">L</option>
             <option value="3">XL</option>
             <option value="4">XXl</option>
            
           </select>
        </div>
		
		</div>
		
		</div>
        </div>
      <div class="size-buttons-size-container" id="sizeButtonsContainer">
            <div class="size-buttons-size-header">
                <h4 class="size-buttons-select-size">Select Color</h4>
                <span class="size-buttons-size-chart">
                    <button class="size-buttons-show-size-chart">Color Chart</button>
                    <span class="size-buttons-arrow"></span>
                </span>
            </div>
			
			
            <div class="row">
		<div class="col-md-12 itemContainer-base-sizeAndQty clearfix mb-2">
		<div class="itemComponents-base-quantity">
		 <div class="float-left mr-2">Color:</div> 
             <select name="prod-quantity">
             <option value="1">Red</option>
             <option value="2">Yellow</option>
             <option value="3">Orange</option>
            
           </select>
        </div>
		
		</div>
		
		</div>
        </div>
        <br>


           <div class="size-buttons-size-header">
            <h4 class="size-buttons-select-size">Select Qty</h4>
            <span class="size-buttons-size-chart">
                <button class="size-buttons-show-size-chart">Qty Chart</button>
                <span class="size-buttons-arrow"></span>
            </span>
        </div>
     <div class="row">
		<div class="col-md-12 itemContainer-base-sizeAndQty clearfix mb-2">
		<div class="itemComponents-base-quantity">
		 <div class="float-left mr-2">Qty:</div> 
             <select name="prod-quantity">
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
             <option value="6">6</option>
           </select>
        </div>
		
		</div>
		
		</div>
		
	

        <div class="pdp-action-container">
            <?php if ($this->session->userdata('userid')) : $this->session->unset_userdata('prid');?>
             <a onclick="return confirm('Do you want to add this in cart?');" href="<?php echo(base_url('item-cart/'.$prod[0]->id)); ?>" class="btn btn-yellow btn-lg">Add to Cart</a>
             <?php else : $this->session->set_userdata('prid',$prod[0]->id); ?>
             <a href="<?php echo base_url('user-login'); ?>" class="btn btn-yellow btn-lg">Add to Cart</a>
            <?php endif; ?>
        </div>
	

        <div class="pdp-productDescriptorsContainer">
            <div>
                <h4 class="pdp-product-description-title">Product Details</h4>
                <!-- <p class="pdp-product-description-content"><a href="" class="seolink">Navy Blue</a> and <a href="" class="seolink">green</a> colourblocked T-shirt, has a round neck, <a href="" class="seolink">short</a> sleeves</p> -->
                <p class="pdp-product-description-content"><?=$prod[0]->short_description ?></p>
            </div>
                    <!-- <div class="pdp-sizeFitDesc">
                        <h4 class="pdp-sizeFitDescTitle pdp-product-description-title">Material &amp; Care</h4>
                        <p class="pdp-sizeFitDescContent pdp-product-description-content">Cotton
                            <br>Machine-wash
                        </p>
                    </div> -->
                    <div class="index-sizeFitDesc">
                        <h4 class="index-sizeFitDescTitle index-product-description-title">Specifications</h4>
                        <?php
                        foreach($specification as $key => $val)
                        {  
                            ?>

                            <div class="index-tableContainer">

                                <?php
                                if($val->sleeve_styling != "")
                                {
                                    ?>
                                    <div class="index-row">
                                        <div class="index-rowKey">Sleeve Styling</div>
                                        <div class="index-rowValue"><?=$val->sleeve_styling?></div>
                                    </div>
                                    <?php
                                }
                                if($val->multipack_set != "")
                                {
                                   ?>
                                   <div class="index-row">
                                    <div class="index-rowKey">Multipack Set</div>
                                    <div class="index-rowValue"><?=$val->multipack_set?></div>
                                </div>
                                <?php
                            }

                            if($val->occasion != "")
                            {
                                ?>
                                <div class="index-row">
                                    <div class="index-rowKey">Occasion</div>
                                    <div class="index-rowValue"><?=$val->occasion?></div>
                                </div>
                                <?php
                            }
                            if($val->main_trend != "")
                            {
                                ?>
                                <div class="index-row">
                                    <div class="index-rowKey">Main Trend</div>
                                    <div class="index-rowValue"><?=$val->main_trend?></div>
                                </div>
                                <?php
                            }
                            if($val->print_pattern_type != "")
                            {
                                ?>
                                <div class="index-row">
                                    <div class="index-rowKey">Print or Pattern Type</div>
                                    <div class="index-rowValue"><?=$val->print_pattern_type?></div>
                                </div>
                                <?php
                            }
                            if($val->neck != "")
                            {
                                ?>
                                <div class="index-row">
                                    <div class="index-rowKey">Neck</div>
                                    <div class="index-rowValue"><?=$val->neck?></div>
                                </div>
                                <?php
                            }
                            if($val->pattern != "")
                            {
                                ?>
                                <div class="index-row">
                                    <div class="index-rowKey">Pattern</div>
                                    <div class="index-rowValue"><?=$val->pattern?></div>
                                </div>
                                <?php
                            }
                            if($val->sleeve_length != "")
                            {
                                ?>
                                <div class="index-row">
                                    <div class="index-rowKey">Sleeve Length</div>
                                    <div class="index-rowValue"><?=$val->sleeve_length?></div>
                                </div>
                                <?php
                            }

                            if($val->wash_care != "")
                            {
                                ?>


                                <div class="index-row">
                                    <div class="index-rowKey">Wash Care</div>
                                    <div class="index-rowValue"><?=$val->wash_care?></div>
                                </div>
                                <?php
                            }
                            if($val->fit != "")
                            {
                                ?>
                                <div class="index-row">
                                    <div class="index-rowKey">Fit</div>
                                    <div class="index-rowValue"><?=$val->fit?></div>
                                </div>
                                <?php
                            }
                            if($val->length != "")
                            {
                                ?>
                                <div class="index-row">
                                    <div class="index-rowKey">Length</div>
                                    <div class="index-rowValue"><?=$val->length?></div>
                                </div>
                                <?php
                            }
                            if($val->fabric != "")
                            {
                                ?>
                                <div class="index-row">
                                    <div class="index-rowKey">Fabric</div>
                                    <div class="index-rowValue"><?=$val->fabric?></div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>


                        <?php
                    }
                    ?>
                    <div class="index-sizeFitDesc">
                        <h4 class="index-sizeFitDescTitle index-product-description-title">Complete The Look</h4>
                        <p class="index-sizeFitDescContent index-product-description-content"><?=$prod[0]->long_description ?></p>
                    </div>
                            <!-- <div class="index-sizeFitDesc">
                                <h4 class="index-sizeFitDescTitle index-product-description-title">Size &amp; Fit</h4>
                                <p class="index-sizeFitDescContent index-product-description-content">The model (height 6') is wearing a size M</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


