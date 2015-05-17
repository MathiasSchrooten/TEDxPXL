    <?php
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
     $data['id'] = $session_data['id'];
		 //$this->load->view('home_view', $data);
	   }
	   else
	   {
		 //If no session, redirect to login page
		 redirect('login', 'refresh');
	   }
		$this->load->view('header_view');

	?>

		<script>
			function back(){
				window.location='<?php echo site_url('forum'); ?>/<?php echo $catId ?>';
			}
      function getValue()
  		{
  			document.getElementById('description').value = document.getElementById('desc').value;
  		}
		</script>
		<div id="port" class="portfolio portfolio-box">
			<div class="head text-center">
				<h3><span> </span> Create new post</h3>
				<p>Welcome to the forum of TEDxPXL</p>
				</br>

				<form class="col-md 6 contact-left text-center">
					<input type="button" value="Back" onClick="back();"/>
				</form>
			</div>
			<!----start-portfolio---->

			<div id="port" class="portfolio-main">
        <?php echo form_open('verifyforum'); ?>
        <div class="col-md 6 contact-left text-center">
				<form id="newPost" class="col-md 6 contact-left text-center" action="<?= site_url(array('forum','insert')) ?>" method="POST">
					Title:
					<br/>
					<input name="title" type="text" />
					<br/>
					Description:
					<br/>
					<textarea name="desc" id="desc" form="newPost"></textarea>
					<input name="description" id="description" type="hidden"/>
          <br/>
					<input name="postedBy" type="hidden" value="<?php echo $data['id']; ?>" />
					<br/>
					<input name="categorieId" type="hidden" value="<?php echo $catId; ?>" />
					<br/>
					<input type="submit" name="action" value="Create post" onclick="getValue();"/>
				</form>
      </div>
        <?php echo validation_errors("<div class='alert alert-danger'>",'</div>'); ?>

		</div>
    </body>
</html>
