<!-- /.real-wedding-section -->
<!-- social-media-section -->
<div class="social-media-block">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12">
                <h3 class="text-white mb0 mt10">Would you like to connect with us</h3>
            </div>
            
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12 text-right">
                <div class="social-icons">
                    <a target="blank" href="<?= $footer[0]->facebook_id ?>" class="icon-square"><i class="fab fa-facebook-f"></i></a>
                    <a target="blank" href="<?= $footer[0]->twitter_id ?>" class="icon-square"><i class="fab fa-twitter"></i> </a>
                    <a target="blank" href="<?= $footer[0]->google_id ?>" class="icon-square"><i class="fab fa-google-plus-g"></i></a>
                    <a target="blank" href="<?= $footer[0]->insta_id ?>" class="icon-square"><i class="fab fa-instagram"></i></a>
                    <a target="blank" href="<?= $footer[0]->youtub_id ?>" class="icon-square"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            
        </div>
    </div>
</div>
<!-- /.social-media-section -->
<!-- footer-section -->

<!-- footer-section -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <!-- footer-widget -->
                <div class="footer-widget">
                    <a href="#"><img src="<?php echo base_url('assets/front/images/footer-logo.png');?>" alt="" class="mb20"></a>
                    <p class="mb10"><?= $footer[0]->meta_titile ?></p>
                    <p class="socila-media">
                    </p>
                </div>
            </div>
            <!-- /.footer-widget -->
            <!-- footer-widget -->
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="footer-widget">
                    <h3 class="widget-title">
                        Contact 
                    </h3>
                    <p class="d-flex">
                       <i class="fas fa-fw fa-phone-volume text-default pr-3 pt-1"></i><?= $footer[0]->land_number ?></p>
                       <p class="mb0 d-flex"><i class="fa fa-mobile text-default pr-3 pt-1" aria-hidden="true"></i><?= $footer[0]->mobile_number ?></p>
                       <p class="mb0 d-flex"><i class="fas fa-fw fa-envelope text-default pr-3 pt-1 "></i><?= $footer[0]->email ?></p>
                   </div>
               </div>
               <!-- /.footer-widget -->
               <!-- footer-widget -->
               <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                <div class="footer-widget">
                    <h3 class="widget-title">
                        Usefull Links
                    </h3>
                    <ul class="listnone">
                        <li><a href="<?=base_url()?>Site_visitor/about_us">About us</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="<?=base_url()?>Site_visitor/terms_condition">Website Terms of Use</a></li>
                        <li><a href="#">License Agreement</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.footer-widget -->
            <!-- /.footer-widget -->
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-6 col-12">
                <div class="footer-widget newsletter-block">
                    <h3 class="widget-title">
                     Subscribe to newsletter
                 </h3>
                 <form>
                    <div class="form-group">
                        <label for="email" class="sr-only"></label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter Email Address">
                    </div>
                </form>
                <a href="#" class="btn btn-default btn-yellow">Subscribe</a>
            </div>
        </div>
        <!-- /.footer-widget -->
    </div>
</div>
</div>
<!-- tiny-footer-section -->
<div class="tiny-footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right">
                <p>© 2019 Amsath. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- /.tiny-footer-section -->
<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
  $('#addgroup').click(function(){
    $('#grouplist').hide();
    $('#groupadd').show();
});
  $('#cancel').click(function(){
     $('#groupadd').hide();
     $('#grouplist').show();
 });
</script>

    <script type="text/javascript">
        
        function search(p_name)
        {
            $.ajax({

                type: "GET",
                dataType: "html",
                url: "<?=base_url()?>product/getdata",
                data: {p_name:p_name},
                success: function (result) {
                    if (response.redirect !== undefined && response.redirect) {
                        window.location.href = response.redirect_url;
                    }
                }
            });

        }
        
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

                    $('#wish_lst').html(result);
               
            }
            });

        }
    
    </script>
	


<script type="text/javascript">
    $('input[name="rate2"]').on('change', function() {
       var userid = $('#userid').val();
       var rate = $(this).val()
       alert(rate+userid);
     //   $.ajax({
     //     url:"<?php echo base_url();?>product_filter/fetch_data"+page,
     //     method:"post",
     //     dataType:"JSON",
     //     data:{userid:userid,rate:rate},
     //     success:function(data){
     //         $('.filter_data').html(list-view-product);
     //     }
     // });
   });
</script>

</body>

</html>