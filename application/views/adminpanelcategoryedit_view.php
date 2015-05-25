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
					<?php foreach($results as $r): ?>
								<form onSubmit="<php ?>" method="post" action="<?= site_url(array('Adminpanel','editCategory'))?>" enctype="multipart/form-data">
								<p>Name: </p>
								<input class="textarea" maxlength="50" type="text" size="20" id="Name" name="Name" value="<?=$r->Name?>"/>
								<input class="textarea" maxlength="50" type="hidden" size="20" id="CategorieId" name="CategorieId" value="<?=$r->CategorieId?>"/>
							<br/>
								<input type="button" value="Back" onClick="back();"/>    
								<input type="submit" value="Save changes" name="action"/>                    
						</form>
					<?php endforeach; ?>
					
						</br>
						<hr>
						</br>
						
						<table class="table table-hover">
							<thead>
							  <tr>
								<th>Posts</th>
								<th>Description</th>
								<th>Posted by</th>
								<th>Edit</th>
								<th>Delete</th>
							  </tr>
							</thead>
							
							<tbody>
								<?php foreach ($posts as $r):?>
									<tr class="contact-left">
										<td><?=$r->Title?></td>
										<td><?=$r->Description?></td>
										<td><a href="<?php echo site_url('userpage'); ?>/<?=$r->UserId?>"><?=$r->Username?></a></td>
										<td> <input type="button" value="Edit" onClick="window.location='<?php echo site_url(array('adminpanel','edit','user')); ?>/<?php echo $r->UserId?>'"/> </td>
										<td> <input type="button" value="Delete" Onclick="if(confirm('Do you want to delete this user?')===true){window.location='<?php echo site_url('adminpanel'); ?>/deleteUser/<?php echo $r->UserId?>'}"/> </td>
									</tr>
								<?php endforeach;?>	
							</tbody>
						</table>
					</div>
				</div>
			</div>
    </body>
</html>
