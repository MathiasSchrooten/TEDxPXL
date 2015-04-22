<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <title>example2</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/theme-style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
		<div id="port" class="portfolio portfolio-box">
				<div class="head text-center">
					<h3><span> </span> Portofolio</h3>
					<p>Here is an overview of all the events organized by TEDxPXL </p>
				</div>
				<!----start-portfolio---->
               <div id="port" class="portfolio-main">
	        	<!---- start-portfolio-script----->
					<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery.mixitup.min.js"></script>
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
							<div class="portfolio logo1 mix_all" data-cat="logo" style="display: inline-block; opacity: 1;">
								<div class="portfolio-wrapper">	
									<div class="port-grid">
										<div class="port-grid-text">
											<p> <?=$r->Title?> </p>
											<label class="arrow-icon1"> </label>
										</div>
										<div class="port-grid-pic block last">
											<a href="#" class="b-link-stripe b-animate-go  thickbox">
											 <img src="<?php echo base_url();?>/assets/images/p1.jpg"><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 "> <?=$r->Description?> </h2>
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
		</div>
    </body>
</html>

