<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 <!--  -->
   <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
   <script
    src="https://www.paypal.com/sdk/js?client-id=AeE2lhIT_h7rMjPrcZHhVvpRmvv4KMpm8F51yqD9KPjD1AeZtoclntDXmQ_OWnY6i6-2fOn-TSBaU8Fx">
  </script>
    <style type="text/css">
	.clear_one{
		padding-bottom:60px !important;
	}
	.payment_container{
		margin-top:120px;
		text-align: center;
		height: auto;
		padding-bottom: 40px;
		background: white;
		border: 1px solid #f5f5f5;
		-webkit-box-shadow: 0px 0px 5px 2px rgba(247,247,247,1);
		-moz-box-shadow: 0px 0px 5px 2px rgba(247,247,247,1);
		box-shadow: 0px 0px 5px 2px rgba(247,247,247,1);
	}
	.amount_hold{
		margin-top: 10px;
		padding-bottom: 40px;
	}
	.amount_text_style{
		font-size: 30px;
		color: #b5afaf;
	}
	.amount_hold_dollar{
		margin-top: 40px;
	}
	.amount_text_style_amount{
		font-size: 60px;
		color:black;
	}
	.button_holder{
		margin-top: 120px;
	}
	</style>
	<!--  -->
	<script type="text/javascript">
	
	var total_payable_cash = 0;
	
	$( document ).ready(function() {
		   total_payable_cash = $('.the_actual_amount').attr("data-id");
		  	
		});
	
	paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: total_payable_cash
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        //alert('Transaction completed by ' + details.payer.name.given_name);
        // Call your server to save the transaction
        //console.log(details);
		
        /*return fetch('/paypal-transaction-complete', {
          method: 'post',
          headers: {
            'content-type': 'application/json'
          },
          body: JSON.stringify({
            orderID: data.orderID 640963870M4349155
          })

			create_time: "2019-06-20T13:23:04Z"
			id: "640963870M4349155"
			intent: "CAPTURE"
			links: [{…}]
			payer: {payer_id: "5FPENKZHRXGZS", address: {…}, name: {…}}
			purchase_units: [{…}]
			status: "COMPLETED"
			update_time: "2019-06-20T13:23:04Z"
			__proto__: Object

        });*/
      });
    }
  }).render('#paypal-button-container');
  
		
	</script>
	  <div class="row clear_one">
	    <div class="col-4"></div>
		<div class="col-4 payment_container">
			<div class="col-12 amount_hold">
				<span class="amount_text_style">Amount Payable</span>
			</div>
			<div class="col-12 amount_hold_dollar">
				<span class="amount_text_style_amount the_actual_amount" data-id=""><?php echo($this->cart->total());?></span>
			</div>
			<div class="col-12 button_holder">
				<div id="paypal-button-container"></div>
			</div>
		</div>
		<div class="col-4"></div>
	  </div>
    <!--  -->