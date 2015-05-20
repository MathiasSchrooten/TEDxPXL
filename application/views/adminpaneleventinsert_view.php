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
				document.getElementById('Image').value = document.getElementById('fileToUpload').value;
			}
			function back(){
				window.location='<?php echo site_url('adminpanel'); ?>';
			}
			function GenMap(){
				if (document.getElementById('Place').value !="")
				{
					document.getElementById("map").innerHTML = "<iframe width='600' height='450' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyBFYwVXpe3XZwBsx4-UxIe08FDddqZsUzY&q=" + document.getElementById('Place').value + "'></iframe>";

				}
				else
				{
					document.getElementById("map").innerHTML = "";
				}
			}
		</script>

		<div id="fea" class="features">
				<div class="container text-center">
					<div class="head text-center">
						<h3><span> </span> Create event</h3>

						<p>Here you can create a new event</p>
					</div>
					</br>
					<div class="col-md 6 contact-left">
								<form onSubmit="<php ?>" method="post" action="<?= site_url(array('Adminpanel','createEvent'))?>" enctype="multipart/form-data">
								<p>Image: </p>
								<a href="" onclick="document.getElementById('fileToUpload').click(); return false">
									<img title="Click me to change" class="img-rounded img-circle" id="profPic" src="" />
								</a>

								<input style="visibility: hidden;" type="file" name="fileToUpload" id="fileToUpload">
							</br>
								<input class="textarea" type="hidden" size="40" name="Image" id="Image" value=""/>
							<br/>
								<p>Title: </p>
								<input class="textarea" maxlength="50" type="text" size="20" id="Title" name="Title" value="" placeholder="Event title..." />
							<br/>
								<p>Description: </p>
								<textarea id="About" maxlength="250" name="Description" placeholder="Event description..."></textarea>
								<p>Created by: </p>
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
								<p>Location: </p>
								<input placeholder="Type a place, adress or name (just like as in Google Maps)" maxlength="100" type="text" size="20" id="Place" onKeyUp="GenMap()" name="Place" value=""/>
								<div id="map"> </div>
								<p>Date: </p>
								<input class="date" type="date" maxlength="50" size="20" id="Date" name="Date" value="<?php echo date('Y/m/d'); ?>"/>
								<p>Time: </p>
								<input class="time" type="time" maxlength="50" size="20" id="Time" name="Time" value="<?php echo time('H:i:s'); ?>"/>
							<br/>
								<input type="button" value="Back" onClick="back();"/>
								<input type="submit" value="Create event" name="action" onclick="if(document.getElementById('Image').value=!==''){getValue()}"/>
						</form>
					</div>
				</div>
			</div>
    </body>
</html>
