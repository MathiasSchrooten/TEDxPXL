 <?php
		$this->load->model("Userpanel_model");
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $data['id'] = $session_data['id'];
	   }
	   else
	   {
		 //If no session, redirect to login page
		 redirect('login', 'refresh');
	   }
		$this->load->view('header_view');
	?>
		<script>
			function getValue()
			{
				document.getElementById('Picture').value = document.getElementById('fileToUpload').value;
			}
			function back(){
				window.location='<?php echo site_url('adminpanel'); ?>';
			}
		</script>

			<div id="fea" class="features">
				<div class="container text-center">
					<div class="head text-center">
						<h3><span> </span> Edit user</h3>

						<p>Here you can change the details of a specific user</p>
					</div>
					</br>
					<div class="col-md 6 contact-left">
						<?php foreach( $results as $r): ?>
								<form onSubmit="<php ?>" method="post" action="<?= site_url(array('Adminpanel','editUser'))?>" enctype="multipart/form-data">
								<p>Profilepicture: </p>
								<a href="" onclick="document.getElementById('fileToUpload').click(); return false">
									<img title="Click me to change" class="img-rounded img-circle" id="profPic" src="<?php echo base_url();?>assets/users/<?=$r->Picture?>" />
								</a>

								<input style="visibility: hidden;" type="file" name="fileToUpload" id="fileToUpload">
							</br>
								<input class="textarea" type="hidden" size="40" name="UserId" id="UserId" value="<?=$r->UserId?>"/>
								<input class="textarea" type="hidden" size="40" name="Username" id="Username" value="<?=$r->Username?>"/>
								<input class="textarea" type="hidden" size="40" name="Role" id="Role" value="<?=$r->Role?>"/>
								<input class="textarea" type="hidden" size="40" name="Picture" id="Picture" value="<?=$r->Picture?>"/>
								<p> E-mail:</p>
								<input class="textarea" maxlength="150" type="text" size="40" id="Email" name="Email" value="<?=$r->Email?>"/>
							<br/>
								<p>Password: </p>
								<input class="password" maxlength="50" type="password" size="20" id="Password" name="Password" value="<?=$r->Password?>"/>
							<br/>
								<p>Confirm password: </p>
								<input class="password" maxlength="50" type="password" size="20" id="Password2" name="Password2" value="<?=$r->Password?>"/>
							<br/>
								<p>First name: </p>
								<input class="textarea" type="text" maxlength="50" size="20" id="Firstname" name="Firstname" value="<?=$r->Firstname?>"/>
								<p>Last name: </p>
								<input class=" textarea" type="text" maxlength="50" size="20" id="Lastname" name="Lastname" value="<?=$r->Lastname?>"/>
								<p>About yourself: </p>
								<textarea id="About" maxlength="250" name="About"><?=$r->About?></textarea>
								<p>Signature: </p>
								<textarea id="Signature" maxlength="250" name="Signature"><?=$r->Signature?></textarea>
							<br/>
								<input type="button" value="Back" onClick="back();"/>
								<input type="submit" value="Save changes" name="action" onclick="if(document.getElementById('Picture').value=!==''){getValue()}"/>
						</form>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
    </body>
</html>
