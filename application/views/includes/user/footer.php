<style type="text/css">.center{font-size: 15px;text-align: center;margin-left: 0px !important;}#erro{color: red;margin-bottom: 17px;}</style>
</div>
</div>

<section class="footer_section">
	<div class="container">
		<div class="content_container">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<ul class="footer_links">
					<li><a href="#">mailing</a></li>
					<li><a href="#">list</a></li>
					<li><a href="#">contact</a></li>
					<li><a href="#">faq</a></li>
					<li><a href="#">press</a></li>
					<li><a href="#">privacy</a></li>
					<li><a href="#">terms</a></li>
				</ul>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="footer_social">
					<a href="#"> <i class="fa fa-pinterest-p"></i></a>
					<a href="#"> <i class="fa fa-instagram"></i></a>
					<a href="#"> <i class="fa fa-facebook-f"></i></a>
					<a href="#"> <i class="fa fa-twitter"></i></a>
				</div>
			</div>
		</div>
		<!--end of content container  -->
	</div>
	<!-- end of container -->
</section>
<!-- end of banner section -->
</main>
<!-- end of main -->
<!-- signup popup start -->
<div id="signup_myModal" class="signup_modal">
	<!-- Modal content -->
	<div class="signup_modal-content">
		<div class="close_container"><span class="close_s">&times;</span></div>
		<div class="signup_popup_container">
			<div class="top_part_s">
				<!-- <h1>GET £25 OFF YOUR FIRST ORDER</h1> -->
				<h6>You can reset your password here.</h6>
			</div>
			<div class="bottom_part_s">
				<form action="#" name="forgotForm" role="form" method="post">
					<input type="email" name="email" placeholder="Email Address">
					<input type="button" onclick="validateForgotForm();" value="Send">
				</form>
				<a class="no_thanks" >No thanks, I don’t want forgot password</a>
			</div>
		</div>
	</div>
</div>
<!-- sigup popup end -->
<!-- sigin popup end -->
<div id="login-modal" class="login-modal">
	<div class="login_modal-content">
		<div class="close_container"><span class="close_i">&times;</span></div>
		<div class="login_popup_container">
			<div class="top_part_s">
				<h1>Sign In</h1>
				<!-- <h6>BY SIGNING UP TO OUR MAILING LIST</h6> -->
			</div>
			<div class="bottom_part_s">
				<form role="form" method="post" name="loginForm" id="loginForm">
					<input class="email-sec" type="email" placeholder="Email" name="email">
					<input type="password" placeholder="Password" name="password" class="hideShow">
					<span class="showpass-icon"><i class="fa fa-eye-slash"></i></span>
					<input type="button" onclick="validateLogin();" value="SIGN IN">
				</form>
				<div class="form-btm-links"><span class="forget"><a href="" class="myBtn">Forgot Password?</a></span>
					<span class="register_sec"><a href="">Register</a></span></div>
				</div>
			</div>
		</div>
	</div>

	<!-- sigup popup end -->
	<div id="register-modal" class="register-modal">
		<div class="register_modal-content">
			<div class="close_container"><span class="close_r">&times;</span></div>
			<div class="register_popup_container">
				<div class="top_part_s">
					<h1>Sign Up</h1>
				</div>
				<div class="bottom_part_s">
					<form role="form" name="registrationForm" method="post" id="registrationForm">
						<input class="name" type="text" name="firstname" placeholder="First name">
						<input class="name" type="text" name="lastname" placeholder="Last Name">
						<input class="name" type="email" name="email" placeholder="Email">
						<input class="name hideShow" type="password" name="password" placeholder="Password" id="pass">
						<div class="showpass"><span class="showpass-icon"><i class="fa fa-eye-slash"></i></span></div>
						<input class="name confim_hs" type="password" name="password_confirm" placeholder="Confirm Password">
						<div class="showpass"><span class="showpass-conhs"><i class="fa fa-eye-slash"></i></span></div>
						<select class="name" name="referral_id">
							<option value="">Select Referral</option>
							<?php 
							if(!empty($data)){
								foreach ($data as $referralId) { 
									?>
									<option value="<?php if(isset($referralId->id)){ echo $referralId->id;} ?>">
										<?php if(isset($referralId->name)){  echo ucfirst($referralId->name);} ?>
									</option>
									<?php } }else{ echo "No Referral id"; } ?>
								</select>
								<input type="button" onclick="validateRegister();" value="Register">
							</form>
							<div><span class="register_sec"><a href="">Login</a></span></div>
						</div>
					</div>
				</div>
			</div>

			<script src="<?php echo site_url('assetweb/js/jquery.min.js'); ?>" type="text/javascript" type="text/javascript"></script>
			<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
			<script src="<?php echo site_url('assetweb/js/jquery.validate.min.js');?>" type="text/javascript"></script>
			<script src="<?php echo site_url('assetweb/js/validation.js'); ?>" type="text/javascript"></script>
			<script src="<?php echo site_url('assetweb/js/moment.min.js'); ?>" type="text/javascript"></script>
			<script src="<?php echo site_url('assetweb/js/bootstrap-datetimepicker.min.js'); ?>" type="text/javascript"></script>
			<script src="<?php echo site_url('assetweb/js/owl.carousel.min.js'); ?>" type="text/javascript"></script>
			<script src="<?php echo site_url('assetweb/js/sweetalert.min.js');?>" type="text/javascript"></script>
			<script src="<?php echo site_url('assetweb/js/additional-methods.min.js');?>" type="text/javascript"></script>

			<script src="<?php echo site_url('assetweb/js/custom.js'); ?>" type="text/javascript"></script>
			<script src="<?php echo site_url('assetweb/js/developer.js');?>" type="text/javascript"></script>

			<script src="<?php echo site_url('assets/js/vendor/fullcalendar/lib/moment.min.js');?>" ></script>
			<script src="<?php echo site_url('assets/js/vendor/fullcalendar/lib/jquery-ui.custom.min.js');?>"></script>
			<script src="<?php echo site_url('assets/js/vendor/fullcalendar/fullcalendar.min.js');?>"></script>
			
			<script>

				$(window).load(function(){

					jQuery('#Previous_Bookings a.tab_con_row:first-child').trigger("click");
					<?php
					if (isset($_GET['chat_id']) && $_GET['chat_id']) {

						$room_id 	= base64_decode($_GET['chat_id']);
						$user_id 	= base64_decode($_GET['user_id']);
						$name 		= ucwords(get_current_user_data('firstname', $user_id) .' '. get_current_user_data('lastname', $user_id));
				//$propic 	= get_current_user_data('firstname') . get_current_user_data('lastname');
						?>
						loadChatData("<?php echo $room_id; ?>", "<?php echo $name; ?>", "", "<?php echo $user_id; ?>");
						<?php }else{ ?>
							jQuery('#Chat .tab_con_row:first-child').trigger("click");
							<?php } ?>

                // Previous month action
                $('#cal-prev').click(function(){
                	$('#calendar').fullCalendar( 'prev' );
                });

                // Next month action
                $('#cal-next').click(function(){
                	$('#calendar').fullCalendar( 'next' );
                });

                // Change to month view
                $('#change-view-month').click(function(){
                	$('#calendar').fullCalendar('changeView', 'month');

                    // safari fix
                    $('#content .main').fadeOut(0, function() {
                    	setTimeout( function() {
                    		$('#content .main').css({'display':'table'});
                    	}, 0);
                    });

                });

                // Change to week view
                $('#change-view-week').click(function(){
                	$('#calendar').fullCalendar( 'changeView', 'agendaWeek');

                    // safari fix
                    $('#content .main').fadeOut(0, function() {
                    	setTimeout( function() {
                    		$('#content .main').css({'display':'table'});
                    	}, 0);
                    });

                });

                // Change to day view
                $('#change-view-day').click(function(){
                	$('#calendar').fullCalendar( 'changeView','agendaDay');

                    // safari fix
                    $('#content .main').fadeOut(0, function() {
                    	setTimeout( function() {
                    		$('#content .main').css({'display':'table'});
                    	}, 0);
                    });

                });

                // Change to today view
                $('#change-view-today').click(function(){
                	$('#calendar').fullCalendar('today');
                });

                /* initialize the external events
                -----------------------------------------------------------------*/
                $('#external-events .event-control').each(function() {

                    // store data so the calendar knows to render an event upon drop
                    $(this).data('event', {
                        title: $.trim($(this).text()), // use the element's text as the event title
                        stick: true // maintain when user navigates (see docs on the renderEvent method)
                    });

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                    	zIndex: 999,
                        revert: true,      // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    });

                });

                $('#external-events .event-control .event-remove').on('click', function(){
                	$(this).parent().remove();
                });

                // Submitting new event form
                $('#add-event').submit(function(e){
                	e.preventDefault();
                	var form = $(this);

                	var newEvent = $('<div class="event-control p-10 mb-10">'+$('#event-title').val() +'<a class="pull-right text-muted event-remove"><i class="fa fa-trash-o"></i></a></div>');

                	$('#external-events .event-control:last').after(newEvent);

                	$('#external-events .event-control').each(function() {

                        // store data so the calendar knows to render an event upon drop
                        $(this).data('event', {
                            title: $.trim($(this).text()), // use the element's text as the event title
                            stick: true // maintain when user navigates (see docs on the renderEvent method)
                        });

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                        	zIndex: 999,
                            revert: true,      // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        });

                    });

                	$('#external-events .event-control .event-remove').on('click', function(){
                		$(this).parent().remove();
                	});

                	form[0].reset();
                	$('#cal-new-event').modal('hide');
                });

            });
        </script>


        <!--/ Page Specific Scripts -->
