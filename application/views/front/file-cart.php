<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- vendor-section -->
<p><br><br>
</p>
<div class="container">
    <div class="cart-container">
        <div class="row">
            <div class="col-md-9">
                <div class="alert alert-success" <?php echo($this->session->flashdata('alert')?'':'hidden') ?>>
                   <strong><?php echo($this->session->flashdata('alert')); ?></strong>
               </div>
               <div class="alert alert-danger" <?php echo($this->session->flashdata('error')?'':'hidden') ?>>
                   <strong><?php echo($this->session->flashdata('error')); ?></strong>
               </div>
               <div class="itemBlock-base-itemHeader">
                <div>My Shopping Bag (<?php echo($this->cart->total_items()); ?> Items)</div>
                <div class="itemBlock-base-totalCartValue">Total: &#8377; <?php echo($this->cart->total()); ?></div>
            </div>
            <?php foreach ($this->cart->contents() as $items): ?>
                <div class="itemContainer-base-item ">
                    <div class="itemContainer-base-itemLeft">
                        <a href="<?php echo('image-details/'.$items['id']); ?>">
                            <picture class="image-base-imgResponsive" style="width: 100%;">
                                <img src="<?php echo base_url('uploads/orginal/'.$items['filename']);?>" class="image-responsive">
                            </picture>
                        </a>
                    </div>
                    <div class="itemContainer-base-itemRight">
                        <div class="itemContainer-base-details">
                         <div class="itemContainer-base-itemName"><a class="itemContainer-base-itemLink" href=""><?php echo($items['name']) ?></a></div>
                         <div class="itemComponents-base-sellerData">sold By: <?php echo($items['username']) ?></div>
                         <div class="itemContainer-base-sizeAndQty clearfix mb-2">
                           <div class="itemComponents-base-quantity float-left">
                            <div class="float-left mr-2">Qty:</div> 
                            <?php echo($items['qty']) ?>
                        </div>
                    </div>
                    <div class="">
                        <div class="itemComponents-base-price itemComponents-base-bold itemContainer-base-amount">
                            <div>&#8377; <?php echo($items['showprice']) ?></div>
                        </div>
                        <div class="itemContainer-base-discountStrikedAmount">
                            <span class="itemComponents-base-strikedAmount">
                                <span class="itemComponents-base-price itemComponents-base-strike itemContainer-base-strikedAmount">&#8377; <?php echo($items['fileprice']) ?>
                            </span>
                        </span>
                        <span class="itemComponents-base-itemDiscount itemContainer-base-tradeDiscount"><?php echo(100-round($items['showprice']*100/$items['fileprice'], 0)) ?>% OFF</span>
                    </div>
                </div>
                <div></div>
            </div>
            <div class="inlinebutton-base-actions ">
                <div class="inlinebutton-base-action itemContainer-base-itemActions">
                    <a href="<?php echo(base_url('delete-cart/'.$items['rowid'])); ?>" class="inlinebutton-base-actionButton itemContainer-base-inlineButton removeButton" onclick="return confirm('Do you want to Remove this from cart?');">Remove</a>
                </div>
                <div class="inlinebutton-base-action itemContainer-base-itemActions">
                 <a href="" class="inlinebutton-base-actionButton itemContainer-base-inlineButton removeButton">Move to WishList</a>
                 
                 
             </div>
         </div>
     </div>
 </div>
<?php endforeach; ?>
</div>
<div class="col-md-3">
    <div class="mb-2">
        <div class="priceBlock-base-priceHeader">PRICE DETAILS</div>
        <div class="priceBreakUp-base-orderSummary" id="priceBlock">
            
               
            <div class="priceDetail-base-row">
                <span>Total MRP</span><span class="priceDetail-base-value "><span></span><span>&#8377; <?php echo($this->cart->total()); ?></span></span>
            </div>
            
            
             <div class="priceDetail-base-row">
            <span>Bag Total</span><span class="priceDetail-base-value priceDetail-base-discount"><span></span>&#8377; <span>149</span></span>
            </div>
          
            <div class="priceDetail-base-row">
                <span>Estimated Tax</span>
                <span class="priceDetail-base-value"><span>&#8377;<?php echo($items['estimated_tax']) ?></span></span>
            </div>
            
            
            <div class="priceDetail-base-row">
                <span>Delivery Charge</span>
                <span class="priceDetail-base-value"><span>&#8377;<?php echo($items['delivery_charge']) ?></span></span>
            </div>
            
           
            
            <div class="priceDetail-base-total">
                <span>Total</span>
                <span class="priceDetail-base-value "><span></span><span>&#8377; <?php echo($this->cart->total()); ?></span></span>
            </div>
        </div>
    </div>

    <a href="<?=base_url()?>Product/address" class="placeOrder-base-button">Place Order</a>
</div>
</div>
</div>
</div>
