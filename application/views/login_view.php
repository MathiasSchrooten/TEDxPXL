    <?php
		$this->load->view('header_view');
	?>
  <!----start-feartures----->
		<div id="fea" class="features">
			<div class="container text-center">
				<div class="head text-center">
					<h3><span> </span> Login</h3>
					<p>Please login to access member features</p>
				</div>
				</br>
			    <?php echo form_open('verifylogin'); ?>
				<div class="col-md 6 contact-left">
				  <form class="col-md 6 contact-left">
							Username:
					<br/>
							<input type="text" size="20" id="username" name="username" value="<?php echo set_value('username') ?>"/>
							<br/>
							Password:
					<br/>
							<input type="password" size="20" id="password" name="password"/>
							<br/>
							<input type="submit" value="Login"/>
					  </form>
				</div>
				
				<?php echo validation_errors("<div class='alert alert-danger'>",'</div>'); ?>
				
			</div>
		</div>
		<!----//End-feartures----->
    </body>
</html>
