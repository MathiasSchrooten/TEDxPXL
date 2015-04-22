    <?php 
		$this->load->view('header_view');
	?>
		<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1">
		<tr>
		<td width="6%" align="left" bgcolor="#E6E6E6"><strong>#</strong></td>
		<td width="15%" align="left" bgcolor="#E6E6E6"><strong>Title</strong></td>
		<td width="53%" align="left" bgcolor="#E6E6E6"><strong>Description</strong></td>
		<td width="13%" align="left" bgcolor="#E6E6E6"><strong>Posted by</strong></td>
		</tr>

		<?php foreach ($results as $r):?>
			<tr>
			<td bgcolor="#FFFFFF"><?=$r->PostId?></td>
			<td bgcolor="#FFFFFF"><?=$r->Title?></td>
			<td bgcolor="#FFFFFF"><?=$r->Description?></td>
			<td bgcolor="#FFFFFF"><?=$r->UserId?></td>
			</tr>
		<?php endforeach;?>	

		<tr>
		<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="create_topic.php"><strong>Create New Topic</strong> </a></td>
		</tr>
		</table>
    </body>
</html>

