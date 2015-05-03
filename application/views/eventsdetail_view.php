    <?php
		$this->load->view('header_view');
	?>

		<div id="port" class="features">
			<div class="container">
				<div class="head text-center">
					<h3><span> </span> Event detail</h3>
					<p>Here you can see more info about the selected event</p>
				</div>
			</div>
			<!---- start-blog-time-line---->
			<?php foreach ($results as $r):?>
				<div class="blog-time-line">
					<div class="col-md-6 blog-time-line-left" >
						<img id="foto" src="<?php echo base_url();?>assets/images/<?=$r->Image?>" title="<?=$r->Title?>" />
					</div>
					<div class="col-md-6 blog-time-line-right">
						<div class="blog-post">
							<div class="col-md-8 blog-post-info">
								<div class="col-md-2 blog-post-date">
									<span>
										<label>
											<?=$r->Date?> at <?=$r->Time?>
										</label>
									</span>
								</div>
								<div class="clearfix"> </div>
								<h3 class="post-head"><?=$r->Title?></h3>
								<p><?=$r->Description?></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
					<form id="back" class="col-md 6 contact-left text-center" action="<?php echo site_url('events'); ?>">
						<input type="submit" name="back" value="Back"/>
					</form>
				</div>
			<?php endforeach;?>
		</div>
    </body>
</html>
