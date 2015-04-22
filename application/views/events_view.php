<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <title>example2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<table>
	        <?php foreach ($results as $r):?>
			<tr>
				<td> Test gegevens </td>
			</tr>
			<tr>
				<td> <?=$r->EventId?></td>
				<td> <?=$r->Title?></td>
				<td> <?=$r->Description?></td>
				<td> <?=$r->Date?></td>
				<td> <?=$r->Time?></td>
				<td> <?=$r->UserId?></td>
			</tr>
		<?php endforeach;?>	
	</table>
    </body>
</html>

