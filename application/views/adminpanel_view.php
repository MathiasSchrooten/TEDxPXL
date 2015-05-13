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
				<h3><span> </span> AdminPanel</h3>
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
							<th>Edit</th>
							<th>Delete</th>
						  </tr>
						</thead>
						
<tbody>

							
							<?php foreach ($users['users'] as $r):?>
								<tr class="contact-left">
									<td><p><?=$r->Username?></p></td>
									<td><p><?=$r->Email?></p></td>
									<td><p><?=$r->Firstname?></p></td>
									<td><p><?=$r->Lastname?></p></td>
									<td> <input type="button" value="Edit" onClick="window.location='<?php echo site_url('adminpanel'); ?>/edit/<?php echo $r->UserId?>'"/> </td>
									<td> <input type="button" value="Delete" Onclick="window.location='<?php echo site_url('adminpanel'); ?>/deleteUser/<?php echo $r->UserId?>'"/> </td>
								</tr>
							<?php endforeach;?>	
							</tbody>
							<table class="table table-hover">
						<thead>
						  <tr>
							<th>Events</th>
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
									<td><p><?=$r->Title?></p></td>
									<td><p><?=$r->Date?></p></td>
									<td><p><?=$r->Time?></p></td>
									<td><p><?=$r->Username?></p></td>
									<td> <input type="button" value="Edit" onClick="<?= site_url(array('AdminPanel','edit'))?>"/> </td>
									<td> <input type="button" value="Delete" Onclick="<?= site_url(array('Adminpanel', 'delete'))?>"/> </td>
								</tr>
							<?php endforeach;?>
						</tbody>
</body>
</html>
