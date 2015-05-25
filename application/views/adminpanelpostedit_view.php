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
				window.location='<?php foreach($results as $r): echo site_url('adminpanel/edit/category') . "/" . $r->CategorieId; endforeach; ?>';
			}
		</script>

		<div id="fea" class="features">
			<div class="container text-center">
				<div class="head text-center">
					<h3><span> </span> Edit post</h3>

					<p>Here you can change a post</p>
				</div>
				</br>
				<div class="col-md 6 contact-left">
					<?php foreach($results as $r): ?>
							<form onSubmit="<php ?>" method="post" action="<?= site_url(array('Adminpanel','editPost'))?>" enctype="multipart/form-data">
								<p>Title: </p>
								<input class="textarea" maxlength="50" placeholder="Title..." type="text" size="20" id="Title" name="Title" value="<?=$r->Title?>"/>
								<p>Description: </p>
								<textarea class="textarea" maxlength="250" type="text" size="20" id="Description" name="Description" placeholder="Description..."><?=$r->Description?></textarea>
								
								<input class="textarea" maxlength="50" type="hidden" size="20" id="CategorieId" name="CategorieId" value="<?=$r->CategorieId?>"/>
								<input class="textarea" maxlength="50" type="hidden" size="20" id="UserId" name="UserId" value="<?=$r->UserId?>"/>
								<input class="textarea" maxlength="50" type="hidden" size="20" id="PostId" name="PostId" value="<?=$r->PostId?>"/>
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
