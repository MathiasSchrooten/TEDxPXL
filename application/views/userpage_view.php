    <?php
		$this->load->view('header_view');
	?>
		<div id="fea" class="features">
			<div class="container text-center">
				<div class="head text-center">
					<h3><span> </span> Userpage</h3>

					<p>Here you can see the details of a certain user</p>
				</div>
				</br>
				<?php foreach ($results as $r):?>
				<div class="col-md 6 contact-left">
					<form onSubmit="">
							<p><strong> <?=$r->Username?>: </strong></p>
							<img id="profPic" src="<?php echo base_url();?>assets/users/<?=$r->Picture?>" />
						</br>
							<p><strong> E-mail: </strong></p>
							<p> <?=$r->Email?> </p>
							<p><strong>First name: </strong></p>
							<p> <?=$r->Firstname?> </p>
							<p><strong>Last name: </strong></p>
							<p> <?=$r->Lastname?> </p>
							<p><strong>About yourself: </strong></p>
							<p> TBA </p>
					</form>
				</div>
				<?php endforeach;?>
			</div>
		</div>
    </body>
</html>