<?php defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
    <!-- /.page-header -->
    <!-- vendor-section -->
    <p><br><br>
    </p>
    <div class="container">
        <div class="cart-container">
            <div class="row">
                <div class="col-md-9">
                    <div class="addressList-base-title">Select Delivery Address</div>
                    <div class="addressBlocks-base-block addressBlocks-base-serviceable">
                        <span class="icon-radio_active addressBlocks-base-radioIcon"></span>
                        <div>
                            <div class="addressDetails-base-name">Ashkar (Default)</div>
                            <div class="addressDetails-base-address">
                                <div class="addressDetails-base-addressField">Founding Minds Softwares Pvt Ltd Ground Floor, Athulya,Infopark Kakkanad</div>
                                <div>Kakkanad</div><span>Ernakulam- </span><span>682030</span>
                                <div>Kerala</div>
                                <div class="addressDetails-base-mobile"><span>Mobile: </span><span>932154786</span></div>
                            </div>
                        </div>
                        <div class=""></div>
                        <div class="addressBlocks-base-btns">
                            <button class="addressBlocks-base-remove" data-action="remove">Remove</button>
                            <button class="addressBlocks-base-edit" data-action="showModal">Edit</button>
                        </div>
                        <div class="addressServiceability-base-container">
                            <div><span class="addressServiceability-base-bullet">•</span><span>Try and Buy unavailable</span></div>
                            <div><span class="addressServiceability-base-bullet">•</span><span>Cash/Card on Delivery available</span></div>
                        </div>
                    </div>
                    <div class="addressBlocks-base-block">
                      <span class="icon-radio_inactive addressBlocks-base-radioIcon"></span>
                        <div>
                            <div class="addressDetails-base-name">Ashkar Sharief</div>
                            <div class="addressDetails-base-address">
                                <div class="addressDetails-base-addressField">28/118A, Parapilly Lane Panampilly Nagar Cochin
                                </div>
                                <div>Panampilly Nagar</div><span>Ernakulam- </span><span>682036</span>
                                <div>Kerala</div>
                                <div class="addressDetails-base-mobile"><span>Mobile: </span><span>932154786</span></div>
                            </div>
                        </div>
                        <div class=""></div>
                        <div class="addressBlocks-base-btns">
                            <button class="addressBlocks-base-remove" data-action="remove">Remove</button>
                            <button class="addressBlocks-base-edit" data-action="showModal">Edit</button>
                        </div>
                    </div>
                    <div class="addressList-base-title">Add New Address</div>
                     <?php echo form_open_multipart('checkout'); ?>
                    <div class="addNewAddress">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" id="name"  name="name" value="<?php echo(isset($name)?$name:''); ?>" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="phone"  name="phone" value="<?php echo(isset($phone)?$phone:''); ?>" class="form-control" placeholder="10-digit mobile number">
                                </div>
								
								
                            </div>
							
						
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="email" id="email"  name="email" value="<?php echo(isset($email)?$email:''); ?>" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                            <input type="text" id="locality"  name="locality" value="<?php echo(isset($locality)?$locality:''); ?>"  class="form-control" placeholder="Locality">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="address" class="form-control"  placeholder="Address"><?php echo(isset($address)?$address :''); ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                
                                <div class="col-md-6">
                         <input type="text" id="district"  name="district" value="<?php echo(isset($district)?$district:''); ?>" class="form-control" placeholder="District">
                                </div>

                                <div class="col-md-6">
                            <input type="text" id="state"  name="state" value="<?php echo(isset($state)?$state:''); ?>" class="form-control" placeholder="City">
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                            <div class="row">
                                
                                <div class="col-md-6">
                                     <input type="text" id="pincode"  name="pincode" value="<?php echo(isset($pincode)?$pincode:''); ?>" class="form-control" placeholder="Pincode">
                                </div>
								
								
                            </div>
                        </div>
						
						
                        <div class="form-group">
                            <label>Address Type</label>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">

                                  <input id="title" <?php echo(isset($address_type)?($address_type == 'home')?'checked':'':'') ?> name="address_type" value="home" type="radio" placeholder="Title" >

                                  <label class="" for="home">Home</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input id="title" <?php echo(isset($address_type)?($address_type == 'office')?'checked':'':'') ?> name="address_type" value="office" type="radio" placeholder="Title" >

                                  <label class="" for="office">Office</label>
                                </div>
                            </div>
                        </div>
                        <a href="<?=base_url()?>Product/payment" type="submit" name="submit" value="submit" class="placeOrder-base-button">Save and Deliver Here</a>
                    </div>
                      <?php echo form_close(); ?>
                </div>
                <div class="col-md-3">
                    <div class="serviceability-base-container">
                        <div class="serviceability-base-title">ESTIMATED DELIVERY DATE</div>
                        <div class="serviceability-base-list">
                            <div class="serviceability-base-deliveryContainer"><img src="https://assets.myntassets.com/h_64,q_100,w_48/v1/assets/images/7228316/2019/1/30/4d826b89-0119-4c89-8861-4a8cea8ed0691548844555754-DILLINGER-Men-Navy-Blue-Colourblocked-Round-Neck-T-shirt-161-1.jpg" class="serviceability-base-imgStyle">
                                <div class="serviceability-base-deliveryInfo">
                                    <div><span class="serviceability-base-estimatedDate">14 Mar 2019</span></div>
                                    <div class="serviceability-base-tryNBuyInfo">Eligible for Try and Buy</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-2">
                        <div class="priceBlock-base-priceHeader">PRICE DETAILS</div>
                        <div class="priceBreakUp-base-orderSummary" id="priceBlock">
                            <div class="priceDetail-base-row">
                                <span>Total MRP</span><span class="priceDetail-base-value "><span></span><span>&#8377;<?php echo($this->cart->total()); ?></span></span>
                            </div>
                            <div class="priceDetail-base-row">
                                <span>Bag discount</span><span class="priceDetail-base-value priceDetail-base-discount"><span></span>&#8377; <span>149</span></span>
                            </div>
                            <div class="priceDetail-base-row">
                                <span>Estimated Tax</span>
                                <span class="priceDetail-base-value"><span>&#8377; <?php echo($items['estimated_tax']) ?></span></span>
                            </div>
                            <div class="priceDetail-base-row">
                                <span>Delivery Charges</span><span class="priceDetail-base-value "><span></span>
                                <span>&#8377; <?php echo($items['delivery_charge']) ?></span></span>
                            </div>
                            <div class="priceDetail-base-total">
                                <span>Total</span>
                                <span class="priceDetail-base-value "><span></span><span>&#8377; <?php echo($this->cart->total()); ?></span></span>
                            </div>
                        </div>
                    </div>
                    
                     <a href="<?=base_url()?>Product/payment" class="placeOrder-base-button">Continue</a>
                </div>
            </div>
        </div>
    </div>


