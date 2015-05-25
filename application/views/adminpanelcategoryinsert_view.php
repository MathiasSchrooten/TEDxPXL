 <?php
		$this->load->model("Userpanel_model");
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $data['role'] = $session_data['role'];
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
				window.location='<?php echo site_url('adminpanel'); ?>';
			}
		</script>

		<div id="fea" class="features">
				<div class="container text-center">
					<div class="head text-center">
						<h3><span> </span> Create category</h3>

						<p>Here you can create a new category for the forum</p>
					</div>
					</br>
					<div class="col-md 6 contact-left">
						<form onSubmit="<php ?>" method="post" action="<?= site_url(array('Adminpanel','createCategory'))?>" method="post" enctype="multipart/form-data">
							<p>Name: </p>
							<input class="textarea" maxlength="50" type="text" size="20" id="Name" name="Name" placeholder="Name..."/>
						<br/>
							<input type="button" value="Back" onClick="back();"/>    
							<input type="submit" value="Create category" name="action"/>                    
						</form>
					</div>
				</div>
			</div>
    </body>
</html>
