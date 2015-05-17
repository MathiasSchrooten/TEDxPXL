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
				window.location='<?php echo site_url('posts'); ?>/<?php echo $postId ?>';
			}
		</script>
		<div id="port" class="portfolio portfolio-box">
			<div class="head text-center">
				<h3><span> </span> Create new comment</h3>
				<p>Welcome to the forum of TEDxPXL</p>
				</br>

				<form class="col-md 6 contact-left text-center">
					<input type="button" value="Back" onClick="back();"/>
				</form>
			</div>
			<!----start-portfolio---->

		<div id="port" class="portfolio-main">
			<div class="col-md 6 contact-left text-center">
				<form id="newComment" class="col-md 6 contact-left text-center" action="<?= site_url(array('posts','insert')) ?>" method="POST">
					<strong><p>New comment:</p></strong>
					<br/>
					<textarea name="text" maxlength="250" form="newComment"></textarea>
					<br/>
					<input name="postedBy" type="hidden" value="<?php echo $data['id'] ?>" />
					<br/>
					<input name="postId" type="hidden" value="<?php echo $postId ?>" />
					<br/>
					<input type="submit" name="action" value="Create Comment"/>
				</form>
			</div>
		</div>
    </body>
</html>
