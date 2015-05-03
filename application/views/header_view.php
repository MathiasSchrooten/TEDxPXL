<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
		<title>TEDxPXL - <?php echo uri_string(); ?></title>
		<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png"/>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
		<!---- start-smoth-scrolling---->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/move-top.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/easing.js"></script>
		<!----<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script> ---->
		<!---- start-smoth-scrolling---->
		<!-- Custom Theme files -->
		<link href="<?php echo base_url();?>assets/css/theme-style.css" rel='stylesheet' type='text/css' />
		<!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----font-Awesome----->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/css/font-awesome.min.css">
		<!----font-Awesome----->
		<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
					var w = $(window).width();
					if(w > 320 && menu.is(':hidden')) {
						menu.removeAttr('style');
					}
				});
			});
		</script>
		<!----//End-top-nav-script---->
    </head>
	<body>
		<!----start-header---->
		<div id="home" class="header scroll">
			<div class="container">
				<!---- start-logo---->
				<div class="logo">
					<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/images/TEDxPXL.jpg" width="400" height="120" title="Mabur" /></a>
				</div>
				<!---- //End-logo---->
				<!----start-top-nav---->
				 <nav class="top-nav">
					<ul class="top-nav">
						<li class="<?php if(uri_string()==='home') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php echo site_url('home'); ?>" class="scroll">Home</a></li>
						<li class="<?php if(uri_string()==='events' || $this->uri->segment(1)==='eventsdetail') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php echo site_url('events'); ?>" class="scroll">Events</a></li>
						<li class="<?php if(uri_string()==='categories' || $this->uri->segment(1)==='forum') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php echo site_url('categories'); ?>" class="scroll">Forum</a></li>
            <li class="<?php if(uri_string()==='search') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php echo site_url('search'); ?>" class="scroll">Search</a></li>

						<?php
							if ($this->session->userdata('logged_in'))
							{
						?>
							<li class="<?php if(uri_string()==='userpanel') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php echo site_url('userpanel'); ?>" class="scroll">Userpanel</a></li>
						<?php
							}
						?>

						<li class="<?php if(uri_string()==='login') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php if($this->session->userdata('logged_in')) { echo site_url('home/logout'); } else { echo site_url('login'); }  ?>" class="scroll"><?php if($this->session->userdata('logged_in')) { echo 'Logout'; } else { echo 'Login'; } ?></a></li>
					</ul>
					<a href="#" id="pull"><img src="<?php echo base_url();?>assets/images/nav-icon.png" title="menu" /></a>
				</nav>
				<div class="clearfix"> </div>
				<!----//End-top-nav---->
			</div>
		</div>
		<!----//End-header---->
