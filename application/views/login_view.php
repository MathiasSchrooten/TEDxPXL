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
				<?php echo validation_errors(); ?>
			    <?php echo form_open('verifylogin'); ?>
				<label for="username">Username:</label>
				<input type="text" size="20" id="username" name="username"/>
				<br/>
				<label for="password">Password:</label>
				<input type="password" size="20" id="password" name="password"/>
				<br/>
				<input type="submit" value="Login"/>
			    </form>
			</div>
		</div>
		<!----//End-feartures----->
    </body>
</html>

