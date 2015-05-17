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
				window.location='<?php echo site_url('forum'); ?>/<?php foreach ($posts["posts"] as $r): ?><?=$r->PostId?><?php break; endforeach; ?>';
			}
			function newComment(){
				window.location='<?php echo site_url(array('posts','insert'))?>/<?php foreach ($posts["posts"] as $r): ?><?=$r->PostId?><?php break; endforeach; ?>';
			}
		</script>
		
		<div id="fea" class="features">
			<div class="container text-center">
				<div class="head text-center">
					<h3><span> </span> <?php foreach ($posts["posts"] as $r): ?><?=$r->Title?><?php break; endforeach; ?></h3>

					<p>Here is the post you selected</p>
					</br>
				<form class="col-md 6 contact-left text-center">
					<input type="button" value="Back" onClick="back();"/>
					<input type="button" value="New comment" onClick="newComment()"/>
				</form>
				</div>
				</br>
				<?php foreach ($posts["posts"] as $r):?>
					<div class="col-md 6 contact-left">
						<form onSubmit="">
							<p><strong> <a href="<?php echo site_url('userpage'); ?>/<?=$r->UserId?>"><?=$r->Username?></a> :</strong></p>
							<p> <?=$r->Description?> </p>
						</form>
					</div>
				<?php break; endforeach;?>
				<?php if (count($comments["comments"]) > 0) { foreach ($comments["comments"] as $r):?>
					<div class="col-md 6 contact-left">
						<form onSubmit="">
							<p class="img-thumbnail"> <a href="<?php echo site_url('userpage'); ?>/<?=$r->UserId?>"><?=$r->Username?></a> : </br> <?=$r->Text?> </p>
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
					<form id="newComment" class="col-md 6 contact-left text-center" action="<?= site_url(array('posts','insert')) ?>" method="POST">
						<strong>New comment: WERKT NOG NIET</strong>
						<br/>
						<textarea name="text" maxlength="250" form="newComment"></textarea>
						<br/>
						<input name="postedBy" type="hidden" value="<?php echo $data['id'] ?>" />
						<br/>
						<input name="postId" type="hidden" value="<?php echo $postId?>" />
						<br/>
						<input type="submit" name="action" value="Create Comment"/>
					</form>
				</div>
			</div>
		</div>
    </body>
</html>
