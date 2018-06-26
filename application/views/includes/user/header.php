<header class="header_top">
	<div class="signup_container">
		<?php if (is_user_logged_in('customer')) { ?>
			<div class="register_btn"><a href="<?php echo base_url('home/dashboard'); ?>">Dashboard</a></div>
			<span>|</span>
			<div class="register_btn" id="myBtn"><a onclick="logout();" href="javascript:Void(0);">Logout</a></div>
			<?php } elseif (is_user_logged_in('service')) { ?>
			<div class="register_btn"><a href="<?php echo base_url('service/dashboard'); ?>">Dashboard</a></div>
			<span>|</span>
			<div class="register_btn" id="myBtn"><a onclick="logout();" href="javascript:Void(0);">Logout</a></div>
		<?php }else{ ?>
			<div class="sign_in_btn"><a href="#">SIGN IN</a></div>
			<span>|</span>
			<div class="register_btn" id="myBtn"><a class="register_sec" href="#">REGISTER</a></div>
			<span>|</span>
			<div class="register_btn"><a href="<?php echo site_url(); ?>Service/login">SERVICE PROVIDER</a></div>
			<?php
		}
		?>
	</div>		
</header>
<main class="main_container">
	<section class="banner_section">
		<navigation>
			<div class="container menu_nav">
				<nav class="des_nav">
					<span class="logo_top"><a href="#"><img src="<?php echo site_url('assetweb/images/logo.png'); ?>"></a></span>
					<ul class="nav_ul">
						<li><a href="#">STYLES</a></li>
						<li><a href="#">PACKAGES</a></li>
						<li><a href="#">HOW IT WORKS</a></li>
						<li><a href="#">BLOG</a></li>
						<li><a href="#">ENLIST</a></li>
						<li class="book_now_btn"><a href="#">BOOK NOW</a></li>
					</ul>
				</nav>
				<!-- end of desktop nav -->

				<a class="trigger-nav-0">
					<div class="hamburger-menu">
						<div class="line-menu"></div>
						<div class="line-menu"></div>
						<div class="line-menu"></div>
					</div>
				</a>
				<div class="menu-wrap">
					<div class="close-menu">
						<svg version="1.1" id="Layer_1" class="menu-close-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
						x="0px" y="0px" width="20.5px" height="20.5px" viewBox="0 0 20.5 20.5" style="enable-background:new 0 0 20.5 20.5;"
						xml:space="preserve">
						<g>
							<line class="st0" x1="0.7" y1="0.7" x2="19.8" y2="19.8" />
						</g>
						<g>
							<line class="st0" x1="0.7" y1="19.8" x2="19.8" y2="0.7" />
						</g>
					</svg>
				</div>

				<nav class="mob_nav menus">
					<ul class="nav_ul">
						<li><a href="#">Home</a></li>
						<li><a href="#">STYLES</a></li>
						<li><a href="#">PACKAGES</a></li>
						<li><a href="#">HOW IT WORKS</a></li>
						<li><a href="#">BLOG</a></li>
						<li><a href="#">ENLIST</a></li>
						<li class="book_now_btn"><a href="#">BOOK NOW</a></li>
						<li><a href="#">Sign in</a></li>
						<li><a href="#" class="myBtn">Register</a></li>
					</ul>
				</nav>
				<!-- end of mobile nav -->
			</div>	
			<!-- END OF NAVIGATION CONTAINER -->	
		</navigation>
		<!-- end of navigation -->
		<div class="container caption_container">
			<div class="content_container">
				<h1 class="banner_h1">GLAM ARMY GIVES YOU<br> PROFESSIONAL<br> BEAUTY TREATMENTS<br> ANYTIME, ANYWHERE
				</h1>
				<div class="book_appointment_btn"><a href="#">BOOK AN APPOINTMENT</a></div>
			</div>
		</div>
		<!-- end of container -->
	</section>
	<!-- end of banner section -->

	