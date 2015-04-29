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
							
							<?php foreach ($results as $r):?>
								<tr class="contact-left">
								
									<td> <input type="button" value="<?=$r->Name?>" onClick="window.location='<?php echo site_url('forum'); ?>/<?=$r->CategorieId?>'"/> </td>
									<td> <?=$r->catCount?> </td>
								
								</tr>
							<?php endforeach;?>	
							
						</tbody>
					</table>	
			</div>
		</div>
    </body>
</html>

