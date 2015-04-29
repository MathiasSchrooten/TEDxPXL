    <?php 
		$this->load->view('header_view');
	?>
		<table class="table table-hover" width="90%" border="0" align="center" cellpadding="3" cellspacing="1">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Description</th>
				<th>Posted by</th>			
			</tr>
		<thead>

		<?php foreach ($results as $r):?>
			<tr>
				<td><?=$r->PostId?></td>
				<td><?=$r->Title?></td>
				<td><?=$r->Description?></td>
				<td><?=$r->UserId?></td>
			</tr>
		<?php endforeach;?>	

		<tr>
			<td><a href="#">Create New Topic </a></td>
		</tr>
		</table>
    </body>
</html>

