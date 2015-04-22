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
			<table width="40%" border="0" align="center" cellpadding="3" cellspacing="1">
			<tr>
			<td width="15%" align="left" bgcolor="#E6E6E6"><strong>Category name</strong></td>
			<td width="15%" align="left" bgcolor="#E6E6E6"><strong>Post count</strong></td>
			</tr>

			<?php foreach ($results as $r):?>
				<tr>
				<td bgcolor="#FFFFFF"><a><?=$r->Name?></a></td>
				<td bgcolor="#FFFFFF">NA</td>
				</tr>
			<?php endforeach;?>	
			</table>	
		</div>
	</div>
    </body>
</html>

