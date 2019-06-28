<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('assets/front/js/jquery.min.js');?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/front/js/popper.min.js');?>"></script>
<script src="<?php echo base_url('assets/front/js/owl.carousel.min.js');?>"></script>
<script src="<?php echo base_url('assets/front/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?php echo base_url('assets/front/js/menumaker.min.js');?>"></script>
<script src="<?php echo base_url('assets/front/js/custom-script.js');?>"></script>
<script src="<?php echo base_url('assets/front/js/jquery.nice-select.min.js');?>"></script>
<script src="<?php echo base_url('assets/front/js/fastclick.js');?>"></script>
<script src="<?php echo base_url('assets/front/js/custom-script.js');?>"></script>
<script src="<?php echo base_url('assets/front/js/return-to-top.js');?>"></script>
<script src="<?php echo base_url('assets/front/js/offcanvas.js');?>"></script>
<script src="<?php echo base_url('assets/front/js/summernote-bs4.js');?>"></script>
<script src="<?php echo base_url('assets/chat/agreement.js'); ?>"></script>
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- Javascript -->
<script>
	$(function() {
		$( "#datepicker-1" ).datepicker();
		$( "#datepicker-2" ).datepicker();
		$( "#datepicker-3" ).datepicker();
		$( "#datepicker-4" ).datepicker();
	});
	$(document).ready(function(){              
     $('#price').change(function (event) {
         event.preventDefault();
         var webchg = $('#price').val()*5/100;
         var shwpri = webchg + parseInt($('#price').val());
         $('#web-charge').val(webchg);
         $('#show-price').val(shwpri);
     });
    });
</script>
</body>
</html>