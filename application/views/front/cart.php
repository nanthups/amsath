<?php defined('BASEPATH') OR exit('No direct script access allowed');
 $this->load->view('front/includes/header');
 ?>
    <!-- /.page-header -->
    <!-- vendor-section -->
    <p><br><br>
    </p>
    <div class="container">
        <div class="cart-container">
            <div class="row">
                <div class="col-md-9">
                    <div class="itemBlock-base-itemHeader">
                        <div>My Shopping Bag (1 Items)</div>
                        <div class="itemBlock-base-totalCartValue">Total: &#8377; 431</div>
                    </div>
                    
                    <?php
                                   
                    foreach ($products as $val) {
                        
                        $clr_arr    = explode(',',$val->color);
                        $size_arr   = explode(',',$val->size);
                    ?>
                    <div class="itemContainer-base-item ">
                        <div class="itemContainer-base-itemLeft">
                            <a href="product-details.php">
                                <picture class="image-base-imgResponsive" style="width: 100%;">
                                    <img src="products/1.jpg" class="image-responsive">
                                </picture>
                            </a>
                        </div>
                        <div class="itemContainer-base-itemRight">
                            <div class="itemContainer-base-details">
                                <div class="itemComponents-base-urgency">60 shoppers have bought this</div>
                                <div class="itemContainer-base-itemName"><a class="itemContainer-base-itemLink" href=""><?=$val->name?></a></div>
                                <div class="itemComponents-base-sellerData">sold By: Proleague</div>
                                <div class="itemContainer-base-sizeAndQty clearfix mb-2">
                                    <div class="itemComponents-base-size float-left mr-3">
                                        <div class="float-left mr-2">Size: </div>
                                        <select>
                                        <?php
                                        foreach($size_arr as $key => $val)
                                        {
                                            if($val) {
                                                $sze     = $this->front_model->get_attrName($val);
                                                ?>
                                            <option><?=ucfirst($sze->attr_val)?></option>
                                        <?php } else {?>Not available<?php } }?>                                          
                                        </select>
                                    </div>
                                    <div class="itemComponents-base-quantity float-left">
                                        <div class="float-left mr-2">Qty:</div> 
                                        <select>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="itemComponents-base-availabilityMessage">
                                    <div><span>Only 4 </span><span>unit(s)</span><span> in stock</span></div>
                                </div>
                                <div class="">
                                    <div class="itemComponents-base-price itemComponents-base-bold itemContainer-base-amount">
                                        <div>&#8377; 269</div>
                                    </div>
                                    <div class="itemContainer-base-discountStrikedAmount">
                                        <span class="itemComponents-base-strikedAmount">
                                            <span class="itemComponents-base-price itemComponents-base-strike itemContainer-base-strikedAmount">&#8377; 899
                                            </span>
                                        </span>
                                        <span class="itemComponents-base-itemDiscount itemContainer-base-tradeDiscount">70% OFF</span>
                                    </div>
                                </div>
                                <div></div>
                            </div>
                            <div class="inlinebutton-base-actions ">
                                <div class="inlinebutton-base-action itemContainer-base-itemActions">
                                    <button class="inlinebutton-base-actionButton itemContainer-base-inlineButton removeButton">Remove</button>
                                </div>
                                <div class="inlinebutton-base-action itemContainer-base-itemActions">
                                    <button class="inlinebutton-base-actionButton itemContainer-base-move itemContainer-base-inlineButton wishlistButton">Move to WishList</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    } 
                    ?>
                </div>
                <div class="col-md-3">
                    <div>
                        <div class="optionsBlock-base-optionsHeader">OPTIONS</div>
                        <div class="coupons-base-couponSection">
                            <div class="row">
                                <div class="col-sm-7"><input type="text" class="form-control" placeholder="Coupons"></div>
                                <div class="col-sm-5"><button class="coupons-base-applyCoupon">APPLY</button></div>
                            </div>
                            <div class="coupons-base-couponMessage"><a href="#" class="coupons-base-logIn">Log In</a><span> to use account-linked coupons</span></div>
                        </div>
                    </div>
                    
                    <div class="mb-2">
                        <div class="priceBlock-base-priceHeader">PRICE DETAILS</div>
                        <div class="priceBreakUp-base-orderSummary" id="priceBlock">
                            <div class="priceDetail-base-row">
                                <span>Total MRP</span><span class="priceDetail-base-value "><span></span><span>&#8377; 899</span></span>
                            </div>
                            <div class="priceDetail-base-row">
                                <span>Bag discount</span><span class="priceDetail-base-value priceDetail-base-discount"><span>-</span>&#8377; <span>630</span></span>
                            </div>
                            <div class="priceDetail-base-row">
                                <span>Estimated Tax</span>
                                <span class="priceDetail-base-value"><span>&#8377; 13</span></span>
                            </div>
                            <div class="priceDetail-base-row">
                                <span>Delivery Charges</span><span class="priceDetail-base-value "><span></span>
                                <span>&#8377; 149</span></span>
                            </div>
                            <div class="priceDetail-base-total">
                                <span>Total</span>
                                <span class="priceDetail-base-value "><span></span><span>&#8377; 431</span></span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="" class="placeOrder-base-button">Place Order</a>
                </div>
            </div>
        </div>
    </div>


<?php $this->load->view('front/includes/footer');?>