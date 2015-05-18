<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	if($this->session->userdata('logged_in')) { 
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['role'] = $session_data['role'];
		$data['id'] = $session_data['id'];
		$data['picture'] = $session_data['picture'];
	}	
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
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
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
					<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/images/TEDxPXL.jpg" width="400" height="120" title="TEDxPXL}" /></a>
				</div>
				<!---- //End-logo---->
				<!----start-top-nav---->
				 <nav class="top-nav">
					<ul class="top-nav">
						<li class="<?php if(uri_string()==='home' || $this->uri->segment(1)===null) { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php echo site_url('home'); ?>" class="scroll">Home</a></li>
						<li class="<?php if(uri_string()==='events' || $this->uri->segment(1)==='eventsdetail') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php echo site_url('events'); ?>" class="scroll">Events</a></li>
						<li class="<?php if(uri_string()==='categories' || $this->uri->segment(1)==='forum' || $this->uri->segment(1)==='posts') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php echo site_url('categories'); ?>" class="scroll">Forum</a></li>
						<li class="<?php if(uri_string()==='search') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php echo site_url('search'); ?>" class="scroll">Search</a></li>

						<?php
							if ($this->session->userdata('logged_in'))
							{
						?>
							<li class="<?php if(uri_string()==='userpanel') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php echo site_url('userpanel'); ?>" class="scroll">Userpanel</a></li>
						<?php
							} if ($this->session->userdata('logged_in') && $data['role']==="1")
							{
						?>
							<li class="<?php if($this->uri->segment(1)==='adminpanel') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php echo site_url('adminpanel'); ?>" class="scroll">Adminpanel</a></li>
							<?php
							}
						?>

						<li class="<?php if(uri_string()==='login') { ?> active <?php } else {?> page-scroll <?php }?>"><a href="<?php if($this->session->userdata('logged_in')) { echo site_url('home/logout'); } else { echo site_url('login'); }  ?>" class="scroll"><?php if($this->session->userdata('logged_in')) { echo 'Logout'; } else { echo 'Login'; } ?></a></li>
					</ul>
					<a href="#" id="pull"><img src="<?php echo base_url();?>assets/images/nav-icon.png" title="menu" /></a>
				</nav>
				<div class="clearfix"> </div>
				<!----//End-top-nav---->
				<?php 
					if(!(uri_string()==='login')) { 
						$this->session->set_userdata('currentPage', uri_string()); 
					} 
					
					if($this->session->userdata('logged_in')) { 	
					?>
						<p><img height='45' width='45' class='img-rounded img-circle' id='userPic' src="<?php echo base_url()?>assets/users/<?php echo $data['picture']?>" /> Hello <strong><a href="<?php echo site_url('userpage') ?>/<?php echo $data['id'] ?>"> <?php echo $data['username'] ?> </a></strong> you are
					<?php
						if($data['role']==="1"){ echo " an <strong>admin</strong></p>"; } else { echo " a <strong>member</strong></p>"; }
					}
				?>
			</div>
		</div>
		<!----//End-header---->
