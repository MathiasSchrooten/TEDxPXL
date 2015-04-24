    <?php 
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $this->load->view('home_view', $data);
	   }
	   else
	   {
		 //If no session, redirect to login page
		 redirect('login', 'refresh');
	   }
		$this->load->view('header_view');
	?>
		<div id="fea" class="features">
			<div class="container text-center">
				<div class="head text-center">
					<h3><span> </span> Userpanel</h3>
					<p>Here you can change your details</p>
				</div>
				</br>
				<?php foreach ($results as $r):?>
					<form>
					<label for="email">E-mail:</label>
					<input type="email" size="40" id="email" name="email" value="<?=$r->Email?>"/>
					<br/>
					<label for="password">Password:</label>
					<input type="password" size="20" id="password" name="password" value="<?=$r->Password?>"/>
					<br/>
					<label for="firstname">Name:</label>
					<input type="text" size="20" id="firstname" name="firstname" value="<?=$r->Firstname?>"/>
					<input type="text" size="20" id="lastname" name="lastname" value="<?=$r->Lastname?>"/>
					<br/>
					<input type="submit" value="Save"/>
					</form>
				<?php endforeach;?>	
			</div>
		</div>
    </body>
</html>

