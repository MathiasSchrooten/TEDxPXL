<?php
	 if($this->session->userdata('logged_in'))
	 {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['role'] = $session_data['role'];
		$data['id'] = $session_data['id'];
		
		if($data['role']==="0")
		{
			redirect('home', 'refresh');
		}
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
				
			<div id="port" class="portfolio-main">		

				<!-- Users -->
				
				<table class="table table-hover">
					<thead>
					  <tr>
						<th>Users</th>
						<th>Username</th>
						<th>E-mail</th>
						<th>Name</th>
						<th>Lastname</th>
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
				</table>
				
				<!-- Events -->
				<hr>
				
				<table class="table table-hover">
					<thead>
					  <tr>
						<th class="contact-left" width="20%">Events <input type="button" value="Create event" onClick="window.location='<?php echo site_url(array('adminpanel','insert','event')); ?>'"/></th>
						<th>Title</th>
						<th>Date</th>
						<th>Time</th>
						<th>Created by</th>
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
				</table>
				
				<!-- Forum -->
				<hr>
				
				<table class="table table-hover">
					<thead>
					  <tr>
						<th class="contact-left" width="20%">Forum <input type="button" value="Create category" onClick="window.location='<?php echo site_url(array('adminpanel','insert','category')); ?>'"/></th>
						<th>Category name</th>
						<th>Edit</th>
						<th>Delete</th>
					  </tr>
					</thead>
					<tbody>
						<?php foreach ($categories['categories'] as $r):?>
							<tr class="contact-left">
								<td></td>
								<td><?=$r->Name?></td>
								<td> <input type="button" value="Edit" onClick="window.location='<?php echo site_url(array('adminpanel','edit','category')); ?>/<?php echo $r->CategorieId?>'"/> </td>
								<td> <input type="button" value="Delete" Onclick="if(confirm('Do you want to delete this category?')===true){window.location='<?php echo site_url('adminpanel'); ?>/deleteCategory/<?php echo $r->CategorieId?>'}"/> </td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
