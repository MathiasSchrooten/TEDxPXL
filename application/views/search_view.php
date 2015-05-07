<?php
$this->load->view('header_view');
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
	<div id="fea" class="features" >
		<div class="container text-center">
			<div class="head text-center">
				<h3><span> </span> Search</h3>
			</div>
				<form class="col-md 6 contact-left text-center" id="searching" method="get" action="">
						<input type="text" size="20" id="search" name="search"
						<?php if(isset($_GET['search'])){
								echo "value='". $_GET['search'] ."'";
						}
						?>
						/>
						<input type="submit" value="Search"/>
				</form>
		</div>
		<div class="container text-center">
			<?php if(isset($_GET["search"])){ ?>
			<ul class="nav nav-pills nav-justified" role="tablist" id="searchTab">
  				<li role="presentation" class="active">
						<a href="#ca" id="ca-tab" role="tab" data-toggle="tab" aria-controls="ca" aria-expanded="true">
												Categories <span class="badge"><?php echo sizeof($cat); ?></span></a></li>
  				<li role="presentation"	>
						<a href="#co" aria-controls="co" role="tab" data-toggle="tab">
												Comments <span class="badge"><?php echo sizeof($co); ?></span></a></li>
  				<li role="presentation">
						<a href="#ev" aria-controls="ev" role="tab" data-toggle="tab">
												Events <span class="badge"><?php echo sizeof($ev); ?></span></a></li>
					<li role="presentation">
						<a href="#po" aria-controls="po" role="tab" data-toggle="tab">
												Posts <span class="badge"><?php echo sizeof($po); ?></span></a></li>
					<li role="presentation"]>
						<a href="#us" aria-controls="us" role="tab" data-toggle="tab">
												Users <span class="badge"><?php echo sizeof($us); ?></span></a></li>
				</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="ca">
					<br/><br/>
					<?php
						if(isset($cat) and sizeof($cat) > 0){
								foreach($cat as $c){?>
									<?php echo "<a href=" . ">" . $c->Name; ?></a><br/><br/>
								<?php }
							}
							else{
								echo "<p>Geen zoekresultaten</p>";
							}
					?>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="co">
					<br/><br/>
					<?php
						if(isset($co) and sizeof($co) > 0){
							foreach($co as $c){?>
								<?php echo "<a href=" . ">" . $c->Text; ?></a><br/><br/>
							<?php }
						}
						else{
							echo "<p>Geen zoekresultaten</p>";
						}
					?>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="ev">
					<br/><br/>
					<?php
						if(isset($ev) and sizeof($ev) > 0){
							foreach($ev as $e){?>
								<?php echo "<a href=" . ">" . $e->Title . "<br/>";
								echo "<h6>" . $e->Description . "</h6>";  ?></a><br/>
							<?php }
						}
						else{
							echo "<p>Geen zoekresultaten</p>";
						}
					?>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="po">
					<br/><br/>
					<?php
						if(isset($po) and sizeof($po) > 0){
							foreach($po as $p){?>
								<?php echo "<a href=" . ">" . $p->Title  . "<br/>";
								echo "<h6>" . $p->Description . "</h6>";  ?></a><br/>
							<?php }
						}
						else{
							echo "<p>Geen zoekresultaten</p>";
						}
					?>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="us">
					<br/><br/>
					<?php
						if(isset($us) and sizeof($us) > 0){
							foreach($us as $u){?>
								<?php echo "<a href=" . ">" . $u->Username; "<br/>";
								echo "<h6>" . $u->Firstname . " " . $u->Lastname . "</h6>"; ?></a><br/>
							<?php }
						}
						else{
							echo "<p>Geen zoekresultaten</p>";
						}
					?>
				</div>
			</div>
			<?php } ?>


		</div>
		<script type="text/javascript">
    	jQuery(document).ready(function ($) {
        $('#searchTab').tab();
    	});
		</script>
	</div>
</body>
</html>
