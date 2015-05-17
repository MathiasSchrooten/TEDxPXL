    <?php
		$this->load->view('header_view');
	?>

		<script>
			function back(){
				window.location='<?php echo site_url('categories'); ?>';
			}

			function newPost(){
				window.location='<?php echo site_url(array('forum','insert'))?>/<?php foreach ($results as $r): ?><?=$r->CategorieId?><?php break; endforeach; ?>';
			}
		</script>

		<div id="port" class="portfolio portfolio-box">
			<div class="head text-center">
				<h3><span> </span> <?php foreach ($results as $r): ?> <?=$r->Name?> <?php break; endforeach; ?></h3>
				<p>Welcome to the forum of TEDxPXL</p>
				</br>
				<form class="col-md 6 contact-left text-center">
					<input type="button" value="Back" onClick="back();"/>
					<input type="button" value="New post" onClick="newPost()"/>
				</form>
			</div>
			<!----start-portfolio---->
			<div id="port" class="portfolio-main">
				<table class="table table-hover" width="90%" border="0" align="center" cellpadding="3" cellspacing="1">
				<thead>
					<tr>
						<th>Title</th>
						<th>Description</th>
						<th>Posted by</th>
					</tr>
				<thead>

				<?php if (empty($results)) { ?>
						<tr>
							<td>There have been no posts yet</td>
						</tr>
				<?php }
					else
					{
						foreach ($results as $r):?>
							<tr class="contact-left">
								<td> <input type="button" value="<?=$r->Title?>" onClick="window.location='<?php echo site_url('posts'); ?>/<?=$r->PostId?>'"/> </td>
								<td><?=$r->Description?></td>
								<td><a href="<?php echo site_url('userpage'); ?>/<?=$r->UserId?>"><?=$r->Username?></a></td>
							</tr>
				<?php endforeach; }?>
				</table>
			</div>
		</div>
    </body>
</html>
