    <?php 
		$this->load->view('header_view');
	?>
		<div id="port" class="portfolio portfolio-box">
			<div class="head text-center">
				<h3><span> </span> Forum</h3>
				<p>Welcome to the forum of TEDxPXL</p>
				</br>
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
							<tr>
								<td><?=$r->Title?></td>
								<td><?=$r->Description?></td>
								<td><?=$r->Username?></td>
							</tr>
				<?php endforeach; }?>	

				<tr>
					<td><a href="<?php echo site_url('categories'); ?>">Back to overview</a></td>
					<td></td>
					<td><a href="#">Create new post</a></td>
				</tr>
				</table>
			</div>
		</div>
    </body>
</html>

