    <?php 
		$this->load->view('header_view');
	?>
		<!----start-feartures----->
		<div id="fea" class="features">
			<div class="container">
				<div class="head text-center">
					<h3><span> </span> Home</h3>
					<p>
						Welcome to the TEDxPXL website!
						</br>
						Check out the buttons below for more information
					</p>
				</div>
				<!---- start-features-grids---->
				<div class="features-grids text-center">
					<div class="col-md-3 features-grid">
						<a href="https://www.facebook.com/TEDxEvents" target="_blank"><span class="fea-icon1"> <i class="fa fa-facebook-square"> </i> </span>
						<h3>Facebook</a></h3>
						<p>Like our Facebook page!</p>
					</div>
					<div class="col-md-3 features-grid">
						<a href="https://twitter.com/tedx" target="_blank"><span class="fea-icon1"><i class="fa fa-twitter-square"> </i> </span>
						<h3>Twitter</a></h3>
						<p>Check out our Twitter page!</p>
					</div>
					<div class="col-md-3 features-grid">
						<a href="<?php echo site_url('register'); ?>"><span class="fea-icon1"><i class="fa fa-key"> </i> </span>
						<h3>Register</a></h3>
						<p>Register to get member access!</p>
					</div>
					<div class="col-md-3 features-grid">
						<a href="mailto:TEDxPXL@PXL.BE?subject=TEDxPXL Contact"><span class="fea-icon1"><i class="fa fa-envelope-o"> </i> </span>
						<h3>Contact us</a></h3>
						<p>Feel free to send us an e-mail!</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!---- //End-features-grids---->
			</div>
		</div>
		<!----//End-feartures----->
    </body>
</html>

