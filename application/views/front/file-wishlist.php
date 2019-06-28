<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('front/includes/header');
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
                    <div>My Whishlist Bag(0 Items)</div>
                    <div class="itemBlock-base-totalCartValue">Total: &#8377;</div>
                </div>

                   <div class="itemContainer-base-item ">
                    <div class="itemContainer-base-itemLeft">
                        <a href="product-details.php">
                            <picture class="image-base-imgResponsive" style="width: 100%;">
                                <img src="<?=base_url()?>uploads/large/" class="image-responsive">
                            </picture>
                        </a>
                    </div>
                    <div class="itemContainer-base-itemRight">
                        <div class="itemContainer-base-details">
                            <div class="itemContainer-base-itemName"><strong><a class="itemContainer-base-itemLink" href="">nam</strong></a></div>

                            <div class="itemContainer-base-itemName"><a class="itemContainer-base-itemLink" href="">des</br></a></div>


                            <div class="itemComponents-base-availabilityMessage">
                                <div><span>Only 4 </span><span>unit(s)</span><span> in stock</span></div>
                            </div>
                            <div class="">
                                <div class="itemComponents-base-price itemComponents-base-bold itemContainer-base-amount">
                                    <div>&#8377; pri</div>
                                </div>
                                <div class="itemContainer-base-discountStrikedAmount">
                                    <span class="itemComponents-base-strikedAmount">
                                        <span class="itemComponents-base-price itemComponents-base-strike itemContainer-base-strikedAmount">&#8377; actual_price_inr
                                    </span>
                                </span>
                                <span class="itemComponents-base-itemDiscount itemContainer-base-tradeDiscount">% OFF</span>
                            </div>
                        </div>
                        <div></div>
                    </div>
                    <form action="<?=base_url()?>product/remove_wishlist" method="post">
                        <div class="inlinebutton-base-actions ">
                            <input type="hidden" name="id" value="id ">
                            <div class="inlinebutton-base-action itemContainer-base-itemActions">
                                <button type="submit" class="inlinebutton-base-actionButton itemContainer-base-inlineButton removeButton">Remove</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

    </div>

</div>
</div>
</div>


<?php $this->load->view('front/includes/footer');?>