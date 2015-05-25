    <?php
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $data['id'] = $session_data['id'];
		 $this->load->view('header_view');
	   }
	   else
	   {
		 //If no session, redirect to login page
		 redirect('login', 'refresh');
	   }
	?>
		<script>
			function back(){
				window.location='<?php echo site_url('forum'); ?>/<?php if(isset($data["CatId"])){
          echo $CatId;
        }
        else{
        foreach ($posts["posts"] as $r): ?><?=$r->CategorieId?><?php break; endforeach; }?>';
			}
      function getValue()
			{
				document.getElementById('comment').value = document.getElementById('commenttext').value;
			}
      function edit(){
				window.location='<?php echo base_url() . "index.php/adminpanel/edit/post/". $this->uri->segment(2); ?>';
			}
		</script>

		<div id="fea" class="features">
			<div class="container text-center">
				<div class="head text-center">
					<h3><span> </span> <?php foreach ($posts["posts"] as $r): ?><?=$r->Title?><?php break; endforeach; ?></h3>

				<form class="col-md 6 contact-left text-center">
          <?php
          if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['role'] === "1"):
              ?> <input type="button" value="Edit" onClick="edit();"/>
            <?php endif; } ?>
					<input type="button" value="Back" onClick="back();"/>
				</form>
				</div>
				</br>
				<?php foreach ($posts["posts"] as $r):?>
					<div class="col-md 6 contact-left">
						<form onSubmit="">
							<p><img height="45" width="45" class="img-rounded img-circle" id="userPic" src="<?php echo base_url();?>assets/users/<?=$r->Picture?>" /><strong> <a href="<?php echo site_url('userpage'); ?>/<?=$r->UserId?>"><?=$r->Username?></a> :</strong></p>
							<p> <?=$r->Description?> </p>
						</form>
					</div>
				<?php break; endforeach;?>

				<?php if (count($comments["comments"]) > 0) { foreach ($comments["comments"] as $r):?>
					<div class="col-md 6 contact-left">
						<form onSubmit="">
							<p class="img-thumbnail"><img height="45" width="45" class="img-rounded img-circle" id="userPic" src="<?php echo base_url();?>assets/users/<?=$r->Picture?>" /> <strong><a href="<?php echo site_url('userpage'); ?>/<?=$r->UserId?>"><?=$r->Username?></a> :</strong>
								</br> <?=$r->Text?>
							</p>

					  </form>
					</div>
				<?php endforeach; } else {?>
					<div class="col-md 6 contact-left">
						<form onSubmit="">
							<p class="img-thumbnail"> There have been no comments yet </p>
						</form>
					</div>
				<?php } ?>
				<hr>
				<div class="col-md 6 contact-left text-center">
          <?php echo form_open('VerifyComment'); ?>
					<form id="newComment" class="col-md 6 contact-left text-center" action="<?= site_url(array('posts','insert')) ?>" method="POST">
						<strong>New comment</strong>
						<br/>
						<textarea name="commenttext" id ="commenttext" maxlength="250" form="newComment"></textarea>
            <input name="comment" id="comment" type="hidden"/>
            <br/>
						<input name="postedBy" type="hidden" value="<?php echo $data['id'] ?>" />
						<br/>
						<input name="postId" type="hidden" value="<?php echo $postId?>" />

            <input name="catId" type="hidden" value="<?php if(isset($data["CatId"])){
              echo $CatId;
            }
            else{
            foreach ($posts["posts"] as $r): ?><?=$r->CategorieId?><?php break; endforeach; }?>"/>
						<br/>
						<input type="submit" name="action" value="Create Comment" onclick="getValue();"/>
					</form>

				</div>
        <?php echo validation_errors("<div class='alert alert-danger'>",'</div>'); ?>
			</div>
		</div>
    </body>
</html>
