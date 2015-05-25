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
						<h3><span> </span> Edit category</h3>

						<p>Here you can change the name of a category</p>
					</div>
					</br>
					<div class="col-md 6 contact-left">
						<?php foreach( $results as $r): ?>
								<form onSubmit="<php ?>" method="post" action="<?= site_url(array('Adminpanel','editCategory'))?>" enctype="multipart/form-data">
								<p>Name: </p>
								<input class="textarea" maxlength="50" type="text" size="20" id="Name" name="Name" value="<?=$r->Name?>"/>
								<input class="textarea" maxlength="50" type="hidden" size="20" id="CategorieId" name="CategorieId" value="<?=$r->CategorieId?>"/>
							<br/>
								<input type="button" value="Back" onClick="back();"/>    
								<input type="submit" value="Save changes" name="action"/>                    
						</form>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
    </body>
</html>
