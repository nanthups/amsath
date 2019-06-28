
<script src="<?=asset_url_admin()?>js/jquery-2.1.4.min.js"></script>
<!--[if IE]>
<script src="<?=asset_url_admin()?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
   if('ontouchstart' in document.documentElement) document.write("<script src='<?=asset_url_admin()?>js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?=asset_url_admin()?>js/bootstrap.min.js"></script>
<script src="<?=asset_url_admin()?>js/ace-elements.min.js"></script>
<script src="<?=asset_url_admin()?>js/ace.min.js"></script>
<script>
		function click_button(id)
		{
			//alert(id);
			if(id==1)
			{
				$('.hide_div').hide();
				$('#adddiv').show();
			}
			if(id==2)
			{
				$('.hide_div').hide();
				$('#srdiv').show();
			}
		}
</script>
	<!-- page specific plugin scripts -->
<script type="text/javascript">
			jQuery(function($) {
				
					/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
			});
	</script>