 <?php
		$this->load->model("Userpanel_model");
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
			function getValue()
			{
				document.getElementById('Image').value = document.getElementById('fileToUpload').value;
			}
			function back(){
				window.location='<?php echo site_url('adminpanel'); ?>';
			}
		</script>

		<div id="fea" class="features">
				<div class="container text-center">
					<div class="head text-center">
						<h3><span> </span> Edit event</h3>

						<p>Here you can change the details of a specific user</p>
					</div>
					</br>
					<div class="col-md 6 contact-left">
						<?php foreach( $results as $r): ?>
								<form onSubmit="<php ?>" method="post" action="<?= site_url(array('Adminpanel','editEvent'))?>" enctype="multipart/form-data">
								<p>Image: </p>
								<a href="" onclick="document.getElementById('fileToUpload').click(); return false">
									<img title="Click me to change" class="img-rounded img-circle" id="profPic" src="<?php echo base_url();?>assets/events/<?=$r->Image?>" />
								</a>

								<input style="visibility: hidden;" type="file" name="fileToUpload" id="fileToUpload">
							</br>
								<input class="textarea" type="hidden" size="40" name="EventId" id="EventId" value="<?=$r->EventId?>"/>
								<input class="textarea" type="hidden" size="40" name="Image" id="Image" value="<?=$r->Image?>"/>
							<br/>
								<p>Title: </p>
								<input class="textarea" maxlength="50" type="text" size="20" id="Title" name="Title" value="<?=$r->Title?>"/>
							<br/>
								<p>Description: </p>
								<textarea id="About" maxlength="250" name="Description"><?=$r->Description?></textarea>
								<p>Gemaakt door: </p>
								<select class="textarea" name="UserId" id="UserId">
									<?php foreach($users as $user): 
										if ($user->UserId===$r->UserId)
										{
									?>
										<option value="<?=$user->UserId?>" selected><?=$user->Username?></option>
									<?php
										}
										else
										{
									?>
										<option value="<?=$user->UserId?>"><?=$user->Username?></option>
									<?php	
										}
										endforeach; 
									?>
								</select>
							<br/>
								<p>Date: </p>
								<input class="date" type="date" maxlength="50" size="20" id="Date" name="Date" value="<?=$r->Date?>"/>
								<p>Time: </p>
								<input class="time" type="time" maxlength="50" size="20" id="Time" name="Time" value="<?=$r->Time?>"/>
							<br/>
								<input type="button" value="Back" onClick="back();"/>    
								<input type="submit" value="Save changes" name="action" onclick="if(document.getElementById('Image').value=!==''){getValue()}"/>                    
						</form>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
    </body>
</html>
