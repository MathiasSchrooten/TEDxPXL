    <?php
		$this->load->view('header_view');
	?>
		<div id="port" class="features">
			<div class="head text-center">
				<h3><span> </span> Events</h3>
				<p>Here is an overview of all the events organized by TEDxPXL </p>
				</br>
			</div>
			<!----start-portfolio---->
			<div id="port" class="portfolio-main">
			<!---- start-portfolio-script----->
				<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
				<script type="text/javascript">
					$(function () {
						var filterList = {
							init: function () {

								// MixItUp plugin
								// http://mixitup.io
								$('#portfoliolist').mixitup({
									targetSelector: '.portfolio',
									filterSelector: '.filter',
									effects: ['fade'],
									easing: 'snap',
									// call the hover effect
									onMixEnd: filterList.hoverEffect()
								});

							},
							hoverEffect: function () {
								// Simple parallax effect
								$('#portfoliolist .portfolio').hover(
									function () {
										$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
										$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
									},
									function () {
										$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
										$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
									}
								);

							}

						};
						// Run the show!
						filterList.init();
					});
				</script>
				<!----//End-portfolio-script----->
				<div id="portfoliolist">
					<?php foreach ($results as $r):?>
						<div  class="portfolio logo1 mix_all" data-cat="logo" style="display: inline-block; opacity: 1;">
							<div class="portfolio-wrapper">
								<div class="port-grid">
									<div class="port-grid-text" style="padding:1px" >
										<p> <?=$r->Title?> </p>
										<label class="arrow-icon1"> </label>
									</div>
									<div class="port-grid-pic block last">
										<a href="<?php echo site_url('eventsdetail'); ?>/<?=$r->EventId?>" class="b-link-stripe b-animate-go  thickbox">
										 <img src="<?php echo base_url();?>assets/images/<?=$r->Image?>"><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 "> <?=$r->Date?> at <?=$r->Time?> </br> </br> <?=$r->Description?></h2>
										</div></a>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
    </body>
</html>
