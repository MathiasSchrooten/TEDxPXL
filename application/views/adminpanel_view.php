<?php
	 if($this->session->userdata('logged_in'))
	 {
	 $session_data = $this->session->userdata('logged_in');
	 $data['username'] = $session_data['username'];
	 //$this->load->view('home_view', $data);
	 }
	 else
	 {
	  
	 //If no session, redirect to login page
	 redirect('login', 'refresh');
	 }
	$this->load->view('header_view');
?>

<div id="port" class="portfolio portfolio-box">
			<div class="head text-center">
				<h3><span> </span> Adminpanel</h3>
				<p>Welcome to the adminpanel of TEDxPXL</p>
				</br>
			</div>
				<!----start-portfolio---->
			<div id="port" class="portfolio-main">			
					<table class="table table-hover">
						<thead>
						  <tr>
							<th>Users</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>Edit</th>
							<th>Delete</th>
						  </tr>
						</thead>
						
						<tbody>
							<?php foreach ($users['users'] as $r):?>
								<tr class="contact-left">
									<td><img height="45" width="45" class="img-rounded img-circle" id="userPic" src="<?php echo base_url();?>assets/users/<?=$r->Picture?>" /></td>
									<td><p><?=$r->Username?></p></td>
									<td><p><?=$r->Email?></p></td>
									<td><p><?=$r->Firstname?></p></td>
									<td><p><?=$r->Lastname?></p></td>
									<td> <input type="button" value="Edit" onClick="window.location='<?php echo site_url(array('adminpanel','edit','user')); ?>/<?php echo $r->UserId?>'"/> </td>
									<td> <input type="button" value="Delete" Onclick="if(confirm('Do you want to delete this user?')===true){window.location='<?php echo site_url('adminpanel'); ?>/deleteUser/<?php echo $r->UserId?>'}"/> </td>
								</tr>
							<?php endforeach;?>	
							</tbody>
							<table class="table table-hover">
						<thead>
						  <tr>
							<th>Events</th>
							<th class="contact-left"><input type="button" value="Create" onClick="window.location='<?php echo site_url(array('adminpanel','insert')); ?>'"/></th>
							<th></th>
							<th></th>
							<th></th>
							<th>Edit</th>
							<th>Delete</th>
						  </tr>
						</thead>
							<tbody>
							<?php foreach ($events['events'] as $r):?>
								<tr class="contact-left">
									<td><img height="45" width="45" class="img-rounded img-circle" id="userPic" src="<?php echo base_url();?>assets/events/<?=$r->Image?>" /></td>
									<td><p><?=$r->Title?></p></td>
									<td><p><?=$r->Date?></p></td>
									<td><p><?=$r->Time?></p></td>
									<td><p><?=$r->Username?></p></td>
									<td> <input type="button" value="Edit" onClick="window.location='<?php echo site_url(array('adminpanel','edit','event')); ?>/<?php echo $r->EventId?>'"/> </td>
									<td> <input type="button" value="Delete" Onclick="if(confirm('Do you want to delete this event?')===true){window.location='<?php echo site_url('adminpanel'); ?>/deleteEvent/<?php echo $r->EventId?>'}"/> </td>
								</tr>
							<?php endforeach;?>
						</tbody>
</body>
</html>
