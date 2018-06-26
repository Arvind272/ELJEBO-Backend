<link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/fullcalendar/fullcalendar.css');?> ">
<header class="header_top_02">
	<!-- /POPUP donation / -->
	<div class="view_sty_profile">
		<div class="modal">
			<div class="modal-overlay modal-toggle"></div>
			<div class="modal-wrapper modal-transition">
				<div class="popup_container_stylist">
					<div class="tab_con_row stylist">
						<a class="close_ico"><img src="<?php echo site_url();?>assets/images/close.png"></a>
						<div class="stylist_man">
							<span class="img_ico"><img src="<?php echo site_url();?>assets/images/03.png"></span>
							<div class="det_box_styl">
								<span id="stylerName" class="stylist_name"></span>
								<span class="stylist_profession">Hair Stylist</span>
							</div>
						</div>
						<ul class="customers_container">
							<li class="img_ico"><img src="<?php echo site_url();?>assets/images/user/01.jpg"></li>
							<li class="img_ico"><img src="<?php echo site_url();?>assets/images/user/02.jpg"></li>
							<li class="img_ico"><img src="<?php echo site_url();?>assets/images/user/03.jpg"></li>
							<li class="img_ico"><img src="<?php echo site_url();?>assets/images/user/04.jpg"></li>
							<li class="img_ico"><img src="<?php echo site_url();?>assets/images/user/05.jpg"></li>
							<li class="img_ico"><img src="<?php echo site_url();?>assets/images/user/01.jpg"></li>
							<li class="img_ico"><img src="<?php echo site_url();?>assets/images/user/01.jpg"></li>
							<li class="img_ico"><img src="<?php echo site_url();?>assets/images/user/02.jpg"></li>
						</ul>
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
					<a href="#"><img src="<?php echo site_url();?>assets/images/logo.png"></a>
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
	</div>
	<!-- end of menu-wrap -->

	<!-- END OF NAVIGATION CONTAINER -->	
</navigation>
<!-- end of navigation -->		
</header>































<main class="main_container">
	<section class="Dashboard_section">
		<div class="container_dashboard">
			<div class="left_menu_dashboard">
				<div class="tab_container desk">
					<div class="top_bar_heading">
						<a href="<?php echo base_url(get_current_page_method('class').'/dashboard'); ?>" class="tablink tab_heading <?php echo (get_current_page_method() == 'dashboard') ? 'active_tab' : ''; ?>">Upcoming Bookings</a>
						<a href="<?php echo base_url(get_current_page_method('class').'/previousBooking'); ?>" class="tab_heading tablink <?php echo (get_current_page_method() == 'previousBooking') ? 'active_tab' : ''; ?>">Previous Bookings</a>
						<a href="<?php echo base_url(get_current_page_method('class').'/customerChat'); ?>" class="tab_heading tablink <?php echo (get_current_page_method() == 'customerChat') ? 'active_tab' : ''; ?>">Chat</a>
						<a href="<?php echo base_url(get_current_page_method('class').'/profileSettings'); ?>" class="tablink tab_heading <?php echo (get_current_page_method() == 'profileSettings') ? 'active_tab' : ''; ?>">Profile & Settings</a>
					</div>
					<div class="tab_content_items">
						

						<!-- Upcoming Booking -->
						<?php if (get_current_page_method() == 'dashboard') { ?>

						
						<div id="Upcoming_Bookings" class="w3-container w3-border city">
							<a class="tab_con_row_add_appointment">
								<div class="tab_con_container">
									<span class="icon"><i class="fa fa-plus"></i></span>
									<div class="txt_container">
										<h6>Add new Appointments</h6>
									</div>
									<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
								</div>
							</a>
							<?php if(!empty($upcomingBooking) && is_array($upcomingBooking)){ 
								foreach ($upcomingBooking as $appointments) { ?>
								<a onclick="getBooking(<?php echo $appointments->appointment_id ?>)"  class="tab_con_row active_row">
									<div class="tab_con_container">
										<span class="img_ico"><img src="<?php echo  "$appointments->profilePicUrl" ?>"></span>
										<div class="txt_container">
											<h6><?php echo ucfirst($appointments->first_name)." ".ucfirst($appointments->lastname); ?></h6><span class="y_btn">
												<?php
												$app_status = $appointments->status;
												if($app_status == '1'){ ?><b>Awaiting response</b>

												<?php }elseif ($app_status == '2') { ?><b>Pay Now</b>

												<?php  }elseif ($app_status == '3') { ?><b>Reject</b>

												<?php }elseif ($app_status == '4') { ?><b>Cancel</b>

												<?php }elseif ($app_status == '5') { ?><b>Pay Now</b>

												<?php }elseif ($app_status == '6') { ?><b>Confirm</b>

												<?php  }elseif ($app_status == '7') { ?><b>Arrived At Venue</b>

												<?php }elseif ($app_status == '8') { ?><b>Starting Job Now</b>

												<?php }elseif ($app_status == '9') { ?><b>Job Completed</b>

												<?php }elseif ($app_status == '10') { ?><b>Feedback Require</b>

												<?php }elseif ($app_status == '11') { ?><b>Feedback Submitted</b>

												<?php } ?>
											</span>
											<span><?php $date1 = $appointments->appointment_date;
											echo $newDate = date("D, d F Y", strtotime($date1)); ?>&nbsp; <?php echo date("h:i A", strtotime($date1)); ?></span>
										</div>
										<span class="price_tag">£<?php echo $appointments->total_cost; ?>.00</span>
										<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
									</div>
								</a>  
								<?php }} ?>
							</div>

							<?php } // Upcoming Booking END ?>


							<?php
							if (get_current_page_method() == 'previousBooking') {
								$previousBooking = getDataByMethod('getPreviousAppoinment');
								if(!empty($previousBooking) && is_array($previousBooking)){
									?>
									<div id="Previous_Bookings" class="w3-container w3-border city">
										<?php foreach ($previousBooking as $preAppointment) { ?>
										<a onclick="preBooking(<?php echo $preAppointment->appointment_id ?>)" class="tab_con_row">
											<div class="tab_con_container">
												<span class="img_ico"><img src="<?php echo  "$preAppointment->profilePicUrl" ?>"></span>
												<div class="txt_container">
													<h6><?php echo ucfirst($preAppointment->first_name)." ".ucfirst($preAppointment->lastname); ?></h6><span class="y_btn">
														<?php
														$app_status = $preAppointment->status;
														if($app_status == '1'){
															echo '<b>Awaiting response</b>';
														}elseif ($app_status == '2') { 
															echo '<b>Pay Now</b>';
														}elseif ($app_status == '3') {
															echo '<b>Reject</b>';
														}elseif ($app_status == '4') {
															echo '<b>Cancel</b>';
														}elseif ($app_status == '5') { 
															echo '<b>Pay Now</b>';
														}elseif ($app_status == '6') {
															echo '<b>Confirm</b>';
														}elseif ($app_status == '7') {
															echo '<b>Arrived At Venue</b>';
														}elseif ($app_status == '8') {
															echo '<b>Starting Job Now</b>';
														}elseif ($app_status == '9') {
															echo '<b>Job Completed</b>';
														}elseif ($app_status == '10') {
															echo '<b>Feedback Require</b>';
														}elseif ($app_status == '11') { 
															echo '<b>Feedback Submitted</b>';
														}
														?>
													</span>
													<span><?php $date1 = $preAppointment->appointment_date;
													echo $newDate = date("D, d F Y", strtotime($date1)); ?>&nbsp; <?php echo date("h:i A", strtotime($date1)); ?></span>
												</div>
												<span class="price_tag">£<?php echo $preAppointment->total_cost; ?>.00</span>
												<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
											</div>
										</a>
										<?php } ?>
									</div>
									<?php 
								}
							}

							/**
							 * Chat Sidebar
							 */
							if (get_current_page_method() == 'customerChat') {
								$chatlist = getDataByMethod('getChatList');
								if (!empty($chatlist) && is_array($chatlist)) {
									?>
									<div id="Chat" class="w3-container w3-border city">
										<?php
										foreach ($chatlist as $key => $value) {
											$user_id = $value->user_id;
											$name = ucwords($value->firstname.' '.$value->lastname);
											?>
											<a class="tab_con_row" data-room_id="<?php echo $value->room_id; ?>" onclick="loadChatData('<?php echo $value->room_id; ?>','<?php echo $name; ?>','<?php echo $value->profile_pic; ?>','<?php echo $user_id; ?>');">
												<div class="tab_con_container">
													<span class="img_ico"><img src="<?php echo $value->profile_pic; ?>"></span>
													<div class="txt_container">
														<h6><?php echo ucwords($name); ?></h6>
														<span><?php echo date('M d Y,g:i A', strtotime($value->created_date)); ?></span>
													</div>
													<!-- <span class="price_tag">£35.00</span> -->
													<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
												</div>
											</a>
											<?php } ?>
										</div>
										<?php
									}
								}

						/**
						 * Profile and Settings Sidebar
						 */
						if (get_current_page_method() == 'profileSettings') {

							?>
							<div id="profile_settings" class="w3-container w3-border city profile_con">
								<a href="<?php echo base_url(get_current_page_method('class').'/'.get_current_page_method()); ?>" class="tab_con_row">
									<div class="tab_con_container">
										<div class="txt_container">
											<h6>Your addresses</h6>
										</div>
										<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
									</div>
								</a>
								<a href="<?php echo base_url(get_current_page_method('class').'/'.get_current_page_method().'/yourBeautyDetails'); ?>" class="tab_con_row">
									<div class="tab_con_container">
										<div class="txt_container">
											<h6>Your beauty details</h6>
										</div>
										<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
									</div>
								</a>

								<a href="<?php echo base_url(get_current_page_method('class').'/'.get_current_page_method().'/settings'); ?>" class="tab_con_row">
									<div class="tab_con_container">
										<div class="txt_container">
											<h6>Settings</h6>
										</div>
										<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
									</div>
								</a>

								<a href="<?php echo base_url(get_current_page_method('class').'/'.get_current_page_method().'/changePassword'); ?>" class="tab_con_row">
									<div class="tab_con_container">
										<div class="txt_container">
											<h6>Change Password</h6>
										</div>
										<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
									</div>
								</a>
								<a class="tab_con_row" onclick="logout();">
									<div class="tab_con_container">
										<div class="txt_container">
											<h6>Logout</h6>
										</div>
										<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
									</div>
								</a>
							</div>

							<?php } ?>

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
									<a class="tab_con_row_add_appointment">
										<div class="tab_con_container">
											<span class="icon"><i class="fa fa-plus"></i></span>
											<div class="txt_container">
												<h6>Add new Appointments</h6>
											</div>
											<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
										</div>
									</a>
									<a class="tab_con_row active_row">
										<div class="tab_con_container">
											<span class="img_ico"><img src="<?php site_url();?><?php site_url();?>images/01.png"></span>
											<div class="txt_container">
												<h6>Nails</h6><span class="y_btn">awaiting confirmation</span>
												<span>Wed 22nd feb 2017 at 2.30pm</span>
											</div>
											<span class="price_tag">£35.00</span>
											<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
										</div>
									</a>
									<a class="tab_con_row">
										<div class="tab_con_container">
											<span class="img_ico"><img src="<?php site_url();?><?php site_url();?>assets/images/02.png"></span>
											<div class="txt_container">
												<h6>Makeup</h6>
												<span>Wed 22nd feb 2017 at 2.30pm</span>
											</div>
											<span class="price_tag">£35.00</span>
											<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
										</div>
									</a>
									<a class="tab_con_row">
										<div class="tab_con_container">
											<span class="img_ico"><img src="<?php site_url();?><?php site_url();?>assets/images/03.png"></span>
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
									<a class="tab_con_row">
										<div class="tab_con_container">
											<span class="img_ico"><img src="<?php site_url();?><?php site_url();?>assets/images/02.png"></span>
											<div class="txt_container">
												<h6>Nails</h6>
												<span>Wed 22nd feb 2017 at 2.30pm</span>
											</div>
											<span class="price_tag">£35.00</span>
											<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
										</div>
									</a>
									<a class="tab_con_row">
										<div class="tab_con_container">
											<span class="img_ico"><img src="<?php site_url();?><?php site_url();?>assets/images/03.png"></span>
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
									<a class="tab_con_row active_user">
										<div class="tab_con_container">
											<span class="img_ico"><img src="<?php site_url();?><?php site_url();?>assets/images/02.png"></span>
											<div class="txt_container">
												<h6>Makeup</h6>
												<span>Wed 22nd feb 2017 at 2.30pm</span>
											</div>
											<span class="price_tag">£35.00</span>
											<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
										</div>
									</a>
									<a class="tab_con_row">
										<div class="tab_con_container">
											<span class="img_ico"><img src="<?php site_url();?><?php site_url();?>assets/images/03.png"></span>
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
									<a class="tab_con_row">
										<div class="tab_con_container">
											<div class="txt_container">
												<h6>Your payment details</h6>
											</div>
											<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
										</div>
									</a>
									<a class="tab_con_row">
										<div class="tab_con_container">
											<div class="txt_container">
												<h6>Your addresses</h6>
											</div>
											<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
										</div>
									</a>
									<a class="tab_con_row">
										<div class="tab_con_container">
											<div class="txt_container">
												<h6>Your beauty details</h6>
											</div>
											<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
										</div>
									</a>
									<a class="tab_con_row">
										<div class="tab_con_container">
											<div class="txt_container">
												<h6>Your account details</h6>
											</div>
											<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
										</div>
									</a>
									<a href="<?php echo site_url(); ?>profileSetting" class="tab_con_row">
										<div class="tab_con_container">
											<div class="txt_container">
												<h6>Settings</h6>
											</div>
											<span class="icon_arrow"><i class="fa fa-angle-right"></i></span>
										</div>
									</a>
									<a class="tab_con_row">
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