<script src="<?php echo base_url('assets/front/js/jquery.min.js'); ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/front/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/front/js/bootstrap.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/front/js/menumaker.min.js'); ?>"></script>
<!-- owl-carousel js -->
<script src="<?php echo base_url('assets/front/js/owl.carousel.min.js'); ?>"></script>
<!-- nice-select js -->
<script src="<?php echo base_url('assets/front/js/jquery.nice-select.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/front/js/fastclick.js'); ?>"></script>
<script src="<?php echo base_url('assets/front/js/custom-script.js'); ?>"></script>
<script src="<?php echo base_url('assets/front/js/return-to-top.js'); ?>"></script>
<script src="<?php echo base_url('assets/chat/custom.js'); ?>"></script>
<script src="<?php echo base_url('assets/chat/chat.js'); ?>"></script>
	
	
	<script>
    //jQuery to collapse the navbar on scroll
    $(window).scroll(function() {
        
        if ($(".header-transparent").offset().top > 200) {
            $(".fixed-top").addClass("top-nav-collapse");
        } else {
            $(".fixed-top").removeClass("top-nav-collapse");    
        }
    });

    </script>



     <script type="text/javascript">
    
        function add_wish(prod_id)
        {

            $.ajax({

                type: "GET",
                dataType: "html",
                url: "<?=base_url()?>product/add_to_wishlist",
                data: {prod_id:prod_id},
                success: function (result) { 
               
            }
            });

        }
    
    </script>


