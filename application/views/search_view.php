<?php
$this->load->view('header_view');
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
	<div id="fea" class="features">
		<div class="container text-center">
			<div class="head text-center">
				<h3><span> </span> Search</h3>
				<p>Here you can search the website for keywords</p>
			</div>
			</br>


				<form class="col-md 6 contact-left text-center" id="searching" method="get" action="">
					<select id="loc" name="loc" form="searching">
						<option <?php if(isset($_GET['loc'])){
							if($_GET['loc'] === 'all')
								echo "selected";
						}
						else
							echo "selected";
						?> value="all">All</option>
						<option <?php if(isset($_GET['loc'])){
							if($_GET['loc'] === 'cat')
								echo "selected";
						}?> value="cat">Categories</option>
						<option <?php if(isset($_GET['loc'])){
							if($_GET['loc'] === 'com')
								echo "selected";
						}?> value="com">Comments</option>
						<option <?php if(isset($_GET['loc'])){
							if($_GET['loc'] === 'ev')
								echo "selected";
						}?> value="ev">Events</option>
						<option <?php if(isset($_GET['loc'])){
							if($_GET['loc'] === 'po')
								echo "selected";
						}?> value="po">Posts</option>
						<option <?php if(isset($_GET['loc'])){
							if($_GET['loc'] === 'us')
								echo "selected";
						}?> value="us">Users</option>
					</select>
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
			<?php if(isset($_GET["loc"]) and $_GET["loc"] === "all"){ ?>
			<ul class="nav nav-pills nav-justified" role="tablist" id="searchTab">
  			<li role="presentation" class="active"><a href="#ca" id="ca-tab" role="tab" data-toggle="tab" aria-controls="ca" aria-expanded="true">
					Categories <span class="badge">10</span></a></li>
  			<li role="presentation"><a href="#co" aria-controls="co" role="tab" data-toggle="tab">
					Comments <span class="badge">10</span></a></li>
  			<li role="presentation"><a href="#ev" aria-controls="ev" role="tab" data-toggle="tab">Events</a></li>
				<li role="presentation"><a href="#po" aria-controls="po" role="tab" data-toggle="tab">Posts</a></li>
				<li role="presentation"><a href="#us" aria-controls="us" role="tab" data-toggle="tab">Users</a></li>
				</ul>
			<?php } ?>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="ca">cat test</div>
				<div role="tabpanel" class="tab-pane" id="co">comment test</div>
				<div role="tabpanel" class="tab-pane" id="messages">...</div>
				<div role="tabpanel" class="tab-pane" id="settings">...</div>
			</div>

			<?php

				if(isset($cat)){
					foreach($cat as $c){
					echo "" . $c->Name;
					}
				}
			?>
		</div>
		<script type="text/javascript">
    	jQuery(document).ready(function ($) {
        $('#searchTab').tab();
    	});
		</script>
	</div>
</body>
</html>
