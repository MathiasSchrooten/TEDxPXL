    <?php 
		$this->load->view('header_view');
	?>
	
		<script>
			function backToOverview(){
				window.location='<?php echo site_url('categories'); ?>';
			}
		</script>
	
		<div id="port" class="portfolio portfolio-box">
			<div class="head text-center">
				<h3><span> </span> Forum</h3>
				<p>Welcome to the forum of TEDxPXL</p>
				</br>
				<form class="col-md 6 contact-left text-center">
					<input type="button" value="Back to overview" onClick="backToOverview();"/>
					<input type="button" value="Create new post"/>
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
							<tr>
								<td><?=$r->Title?></td>
								<td><?=$r->Description?></td>
								<td><?=$r->Username?></td>
							</tr>
				<?php endforeach; }?>	
				</table>
			</div>
		</div>
    </body>
</html>

