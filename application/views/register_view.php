<?php
$this->load->view('header_view');
?>

<script>
	function back(){
		window.location='<?php echo site_url('login'); ?>';
	}
</script>

<div id="fea" class="features">
  <div class="container text-center">
    <div class="head text-center">
      <h3><span> </span> Register</h3>
      <p>
		Please register to access member features
		</br>
		This includes viewing event details, access to all the forum's functions and your own userpanel!
	  </p>
    </div>
    </br>
      <?php echo form_open('verifyregister'); ?>
    <div class="col-md 6 contact-left">
      <form class="col-md 6 contact-left">
        Email:
        <br/>
        <input type="text" size="50" id="email" name="email"/>
        <br/>
          Username:
      <br/>
          <input type="text" size="20" id="username" name="username" value="<?php echo set_value('username') ?>"/>
          <br/>
          Password:
      <br/>
          <input type="password" size="20" id="password" name="password"/>
          <br/>
          <!--<input type="password" size="20" id="password2" name="password1"/>-->
          <br/>
		  <input type="button" value="Back" onClick="back();"/>
          <input type="submit" value="Register"/>
        </form>
    </div>

    <?php echo validation_errors("<div class='alert alert-danger'>",'</div>'); ?>

  </div>
</div>
<!----//End-feartures----->
</body>
</html>
