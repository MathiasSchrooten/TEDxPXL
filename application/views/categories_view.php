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
			<table class="table table-hover">
				<thead>
				  <tr>
					<th>Category name</th>
					<th>Post count</th>
				  </tr>
				</thead>
				<tbody>
					<?php foreach ($results['categories'] as $r):?>
						<tr>
							<td><a href="<?php echo site_url('forum'); ?>/<?=$r->CategorieId?>"><?=$r->Name?></a></td>
							<td><?=$r->rowCount?></td>
						</tr>
					<?php endforeach;?>	
				</tbody>
			</table>	
		</div>
	</div>
    </body>
</html>

