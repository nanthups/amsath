<?php defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
    <!-- /.page-header -->
    <!-- vendor-section -->
    <p><br><br>
    </p>
	<style>
.checked {
  color: orange;
}
</style>
    <div class="container">
        <div class="cart-container">
            <div class="row">
                <div class="col-md-9">
                    <div class="itemBlock-base-itemHeader">
                    <div>My Whishlist Bag</div>
                </div>
                    
                     <?php
                    foreach($products_wish as $key => $val)
                    {
					
					$deff   = $products[0]->actual_price_inr-$products[0]->price_inr;
                    $off    = floor($deff / $products[0]->actual_price_inr * 100);
                    ?>
                    
					<div class="itemContainer-base-item ">
                        <div class="itemContainer-base-itemLeft">
                            <a href="product-details.php">
                                <picture class="image-base-imgResponsive" style="width: 100%;">
                                    <img src="<?=base_url()?>uploads/large/<?=$val->main_image?>" class="image-responsive">
                                </picture>
                            </a>
                        </div>
                        <div class="itemContainer-base-itemRight">
                            <div class="itemContainer-base-details">
                                <div class="itemContainer-base-itemName"><strong><a class="itemContainer-base-itemLink" href=""><?= $val->name ?></strong></a></div>
								
								<div class="itemContainer-base-itemName"><a class="itemContainer-base-itemLink" href=""><?= $val->short_description ?></br></a></div>
                                 
                                <div class="itemComponents-base-availabilityMessage">
                                    <div><span>Only <?= $val->in_stock?> </span><span>unit(s)</span><span> in stock</span></div>
                                </div>
                                
                                <div class="itemComponents-base-availabilityMessage">
                                </div>
                                <div class="">
                                    <div class="itemComponents-base-price itemComponents-base-bold itemContainer-base-amount">
                                        <div>&#8377; <?= $val->price_inr ?></div>
                                    </div>
                                    <div class="itemContainer-base-discountStrikedAmount">
                                        <span class="itemComponents-base-strikedAmount">
                                            <span class="itemComponents-base-price itemComponents-base-strike itemContainer-base-strikedAmount">&#8377; <?= $val->actual_price_inr ?>
                                            </span>
                                        </span>
                                        <span class="itemComponents-base-itemDiscount itemContainer-base-tradeDiscount"><?=$off?>% OFF</span>
                                    </div>
                                </div>
                                <div></div>
                            </div>
                            <form action="<?=base_url()?>product/remove_wishlist" method="post">
                            <div class="inlinebutton-base-actions ">
                                <input type="hidden" name="id" value="<?= $val->id ?>">
                                <div class="inlinebutton-base-action itemContainer-base-itemActions">
                                    <button type="submit" class="inlinebutton-base-actionButton itemContainer-base-inlineButton removeButton">Remove</button>
                                </div>
                                
                            </div>
                            </form>
                        </div>
                    </div>
					
					<?php
                    }
                    ?>
                </div>
                
            </div>
        </div>
    </div>


