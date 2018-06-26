<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<title>Glam Army dashboard</title>
</head>
<body>
	<header class="header_top_02">
		<!-- /POPUP donation / -->
		<div class="view_sty_profile">
		 <div class="modal">
		    <div class="modal-overlay modal-toggle"></div>
		    <div class="modal-wrapper modal-transition">
				<div class="popup_container_stylist">
					<div class="tab_con_row stylist">
						<a class="close_ico"><img src="images/close.png"></a>
				    	<div class="stylist_man">
				    		<span class="img_ico"><img src="images/03.png"></span>
				    		<div class="det_box_styl">
					    		<span class="stylist_name">Georgina harding</span>
					    		<span class="stylist_profession">Hair Stylist</span>
					    	</div>
				    	</div>
				    	<ul class="customers_container">
				    		<li class="img_ico"><img src="images/user/01.jpg"></li>
				    		<li class="img_ico"><img src="images/user/02.jpg"></li>
				    		<li class="img_ico"><img src="images/user/03.jpg"></li>
				    		<li class="img_ico"><img src="images/user/04.jpg"></li>
				    		<li class="img_ico"><img src="images/user/05.jpg"></li>
				    		<li class="img_ico"><img src="images/user/01.jpg"></li>
							<li class="img_ico"><img src="images/user/01.jpg"></li>
				    		<li class="img_ico"><img src="images/user/02.jpg"></li>
				    	</div>
				    </div>
				    
				</div>
				<!-- popup_container_stylist -->
		    </div>
		  </div>
		</div>
		<!-- /POPUP donation / -->

		<navigation>
				<div class="container menu_nav">
					<nav class="des_nav">
						<span class="logo_top">
							<a href="#"><img src="images/logo.png"></a>
							<a class="info" href=""><i class="fa fa-question-circle"></i></a>
						</span>
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
							<li><a href="#">Register</a></li>
						</ul>
					</nav>
					<!-- end of mobile nav -->
				</div>	
				<!-- end of menu-wrap -->

				<!-- END OF NAVIGATION CONTAINER -->	
			</navigation>
			<!-- end of navigation -->		
	</header>
	<!-- /END OF HEADER/ -->
	<main class="main_container">
		<section class="Dashboard_section">
			<div class="container_dashboard">
				<div class="left_menu_dashboard">
					<div class="tab_container desk">

						<div class="top_bar_heading">
						    <button class=" tablink tab_heading active_tab" onclick="openCity(event,'Upcoming_Bookings')">Upcoming Bookings</button>
						    <button class="tab_heading tablink" onclick="openCity(event,'Previous_Bookings')">Previous Bookings</button>
						    <button class="tab_heading tablink" onclick="openCity(event,'Chat')">Chat</button>
						    <button class="tab_heading tablink" onclick="openCity(event,'profile_settings')">Profile & Settings</button>
						</div>
						  
					  	<div class="tab_content_items">
						  <div id="Upcoming_Bookings" class="w3-container w3-border city">
						    <a href="add_new_appoinment.html" class="tab_con_row_add_appointment">
						    	<div class="tab_con_container">
						    		<span class="icon"><i class="fa fa-plus"></i></span>
						    		<div class="txt_container">
							    		<h6>Add new Appointments</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="upcoming_bookings.html" class="tab_con_row active_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/01.png"></span>
						    		<div class="txt_container">
							    		<h6>Nails</h6><span class="y_btn">awaiting confirmation</span>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="upcoming_bookings.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/02.png"></span>
						    		<div class="txt_container">
							    		<h6>Makeup</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="upcoming_bookings.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/03.png"></span>
						    		<div class="txt_container">
							    		<h6>BlowOut</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						  </div>

						  <div id="Previous_Bookings" class="w3-container w3-border city" style="display:none">
						    <a  href="previous_booking.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/02.png"></span>
						    		<div class="txt_container">
							    		<h6>Nails</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="previous_booking.html"  class="tab_con_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/03.png"></span>
						    		<div class="txt_container">
							    		<h6>BlowOut</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						  </div>

						  <div id="Chat" class="w3-container w3-border city" style="display:none">
						    <a href="chat.html" class="tab_con_row active_user">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/02.png"></span>
						    		<div class="txt_container">
							    		<h6>Makeup</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a  href="chat.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/03.png"></span>
						    		<div class="txt_container">
							    		<h6>BlowOut</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						  </div>

						  <div id="profile_settings" class="w3-container w3-border city profile_con" style="display:none">
						    <a href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Your payment details</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a  href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Your addresses</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a  href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Your beauty details</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a  href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Your account details</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a  href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Settings</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a  href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Logout</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						  </div>

						</div>
						<!-- end of tab content items -->
					</div>
					<!-- end of tab container desktop -->
					
					<a class="trigger-nav-1">
			           <div class="hamburger-menu">
			              <div class="line-menu"></div>
			              <div class="line-menu"></div>
			              <div class="line-menu"></div>
			           </div>
			         </a>

					<div class="menu-wrap_02">
					    <div class="close-menu_02">
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

						<div class="tab_container mobile">

							<div class="top_bar_heading">
							    <button class=" tablink tab_heading active_tab" onclick="openCity(event,'Upcoming_Bookings_02')">Upcoming Bookings</button>
							    <button class="tab_heading tablink" onclick="openCity(event,'Previous_Bookings_02')">Previous Bookings</button>
							    <button class="tab_heading tablink" onclick="openCity(event,'Chat_02')">Chat</button>
							    <button class="tab_heading tablink" onclick="openCity(event,'profile_settings_02')">Profile & Settings</button>
							</div>
							  
					  	<div class="tab_content_items">
						  <div id="Upcoming_Bookings_02" class="w3-container w3-border city">
						    <a href="add_new_appoinment.html" class="tab_con_row_add_appointment">
						    	<div class="tab_con_container">
						    		<span class="icon"><i class="fa fa-plus"></i></span>
						    		<div class="txt_container">
							    		<h6>Add new Appointments</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="upcoming_bookings.html" class="tab_con_row active_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/01.png"></span>
						    		<div class="txt_container">
							    		<h6>Nails</h6><span class="y_btn">awaiting confirmation</span>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="upcoming_bookings.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/02.png"></span>
						    		<div class="txt_container">
							    		<h6>Makeup</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="upcoming_bookings.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/03.png"></span>
						    		<div class="txt_container">
							    		<h6>BlowOut</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						  </div>

						  <div id="Previous_Bookings_02" class="w3-container w3-border city" style="display:none">
						    <a href="previous_bookings.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/02.png"></span>
						    		<div class="txt_container">
							    		<h6>Nails</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="previous_bookings.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/03.png"></span>
						    		<div class="txt_container">
							    		<h6>BlowOut</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						  </div>

						  <div id="Chat_02" class="w3-container w3-border city" style="display:none">
						    <a href="chat.html" class="tab_con_row active_user">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/02.png"></span>
						    		<div class="txt_container">
							    		<h6>Makeup</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="chat.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<span class="img_ico"><img src="images/03.png"></span>
						    		<div class="txt_container">
							    		<h6>BlowOut</h6>
							    		<span>Wed 22nd feb 2017 at 2.30pm</span>
							    	</div>
							    	<span class="price_tag">£35.00</span>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						  </div>

						  <div id="profile_settings_02" class="w3-container w3-border city profile_con" style="display:none">
						    <a href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Your payment details</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Your addresses</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Your beauty details</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Your account details</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Settings</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						    <a href="profile_setting.html" class="tab_con_row">
						    	<div class="tab_con_container">
						    		<div class="txt_container">
							    		<h6>Logout</h6>
							    	</div>
						    		<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
						    	</div>
						    </a>
						  </div>

						</div>
							<!-- end of tab content items -->
						</div>
						<!-- end of tab container  mobile-->
					</nav>
					<!-- end of mobile nav -->
				</div>	
				<!-- end of menu-wrap -->


				</div>
				<!-- left_menu_dashboard end -->
				<div class="main_content_dashboard">
					<div class="tab_content_items">
						<div class="add_new_appointments">
					  			<h1>New Appointment</h1>
								<ul class="appoinment_tabs">
									<li class="tab-link current" data-tab="location">01 location</li>
									<li class="tab-link" data-tab="treat">02 Treatment</li>
									<li class="tab-link" data-tab="date_time">03 Date/Time</li>
									<li class="tab-link" data-tab="stylist">04 Stylist</li>
									<li class="tab-link" data-tab="payment">05 Payment</li>
								</ul>
								<div id="location" class="tab-content current">
									<div class="appointment_con">
										<div class="outer_box">	
											<a class="address_box active" href="">12 Test Street, Heworth, Gatesshread NE10 9AF</a>
											<a class="address_box" href="">12 Test Street, Heworth, Gatesshread NE10 9AF</a>
											<input class="address_box" type="text" name="add_address" placeholder="Add new address">
											<a data-tab="treat" class="next_btn">Choose Treatment</a>
										</div>
									</div>
								</div>
								<div id="treat" class="tab-content">
									 <div class="appointment_con">
									 	<div class="outer_box">
										 	<div class="field_wrap">
										 		<h4>Hair</h4>
										 		<input id="box1" type="checkbox" /> <label for="box1">Blowout <span>£ 30</span></label>
												<input id="box2" type="checkbox" /> <label for="box2">Updo <span>£ 25</span></label>
										 	</div>

										 	<div class="field_wrap">
										 		<h4>Makeup</h4>
										 		<input id="box3" type="checkbox" /> <label for="box3">Makeup <span>£ 30</span></label>
												<input id="box4" type="checkbox" /> <label for="box4">Lashes <span>£ 25</span></label>
										 	</div>

										 	<div class="field_wrap">
										 		<h4>Nails</h4>
										 		<input id="box5" type="checkbox" /> <label for="box5">Manicure <span>£ 30</span></label>
												<input id="box6" type="checkbox" /> <label for="box6">Padicure <span>£ 25</span></label>
										 	</div>

										 	<div class="field_wrap">
										 		<h4>Henna</h4>
										 		<input id="box7" type="checkbox" /> <label for="box7">Hands <span>£ 30</span></label>
												<input id="box8" type="checkbox" /> <label for="box8">Face <span>£ 25</span></label>
										 	</div>
										 	<div class="field_wrap">
											 	<a data-tab="date_time" class="next_btn">Choose Date & Time</a>
											</div>
										</div>	
									 </div>
								</div>
								<div id="date_time" class="tab-content">
									<div class="outer_box">
										<h3>Place for calender</h3>
										<a data-tab="stylist" class="next_btn">Choose Stylist</a>
									</div>
								</div>
								<div id="stylist" class="tab-content">
									<div class="outer_box">
										<div class="all_stylist">
											<div class="tab_con_row stylist">
										    	<a class="stylist_man">
										    		<span class="img_ico"><img src="images/03.png"></span>
										    		<span class="stylist_name">Georgina harding</span>
										    	</a>
										    	<a class="stylist_profile">
										    		<i class="fa fa-user"></i>
										    		<span>view Profile</span>
										    	</a>
										    </div>
										    <!-- end of row stylist -->

										    <div class="tab_con_row stylist">
										    	<a class="stylist_man">
										    		<span class="img_ico"><img src="images/01.png"></span>
										    		<span class="stylist_name">Georgina harding</span>
										    	</a>
										    	<a class="stylist_profile">
										    		<i class="fa fa-user"></i>
										    		<span>view Profile</span>
										    	</a>
										    </div>
										    <!-- end of row stylist -->

										    <div class="tab_con_row stylist">
										    	<a class="stylist_man">
										    		<span class="img_ico"><img src="images/02.png"></span>
										    		<span class="stylist_name">Georgina harding</span>
										    	</a>
										    	<a class="stylist_profile">
										    		<i class="fa fa-user"></i>
										    		<span>view Profile</span>
										    	</a>
										    </div>
										    <!-- end of row stylist -->
										    <a data-tab="payment" class="next_btn">Proceed to Payment</a>
										</div>
									</div>
								</div>
								<div id="payment" class="tab-content">
									<div class="outer_box">
										<h3>Payment</h3>
									</div>
								</div>
							</div>
						<!-- add new appointmnets end -->

					</div>
				</div>
				<!-- /END OF MAIN CONTENT DASHBOARD/ -->
			</div>
		</section>
	</main>
	<!-- /END OF MAIN/ -->

	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!-- res nav js -->

</body>
</html>