    <?php 
		$this->load->view('header_view');
	?>
	
		<script>
			function back(){
				window.location='<?php echo site_url('forum'); ?>/<?php echo $catId ?>';
			}
		</script>
	
		<div id="port" class="portfolio portfolio-box">
			<div class="head text-center">
				<h3><span> </span> Create new post</h3>
				<p>Welcome to the forum of TEDxPXL</p>
				</br>
				<form class="col-md 6 contact-left text-center">
					<input type="button" value="Back" onClick="back();"/>
				</form>
			</div>
			<!----start-portfolio---->
			<div id="port" class="portfolio-main">
				<form id="newPost" class="col-md 6 contact-left text-center" action="<?= site_url(array('forum','insert')) ?>" method="POST">
					Title:
					<br/>
					<input name="title" type="text" />
					<br/>
					Description:
					<br/>
					<textarea name="description" form="newPost"></textarea>
					<br/>
					<input name="postedBy" type="hidden" value="1" />
					<br/>
					<input name="categorieId" type="hidden" value="<?php echo $catId ?>" />
					<br/>
					<input type="submit" name="action" value="Create post"/>
				</form>
			</div>
		</div>
    </body>
</html>

