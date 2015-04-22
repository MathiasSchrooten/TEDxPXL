<!----start-footer---->
<div class="footer">
	<div class="container">
		<div class="footer-left">
			<a href="#"><img src="<?php echo base_url();?>assets/images/TEDxPXL.jpg" width="200" height="60" title="TEDxPXL" /></a>
		</div>
		<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
		<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
</div>
<!----//End-footer---->