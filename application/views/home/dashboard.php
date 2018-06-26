<div class="main_content_dashboard customer_dashboard_main">


	<!-- Add New Appointment Section -->
	<div class="tab_content_items add_new_appointments_wrap">
		<div class="add_new_appointments">
			<h1>New Appointment</h1>
			<ul class="appoinment_tabs">
				<li class="tab-link current" data-tab="location">01 location</li>
				<li class="tab-link" data-tab="treat">02 Treatment</li>
				<li class="tab-link" data-tab="date_time">03 Date/Time</li>
				<li class="tab-link" data-tab="stylist">04 Stylist</li>
				<li class="tab-link" data-tab="payment">05 Booking</li>
			</ul>
		</div>

		<form method="POST" class="add_new_appointments_form">
			<div id="location" class="tab-content current">
				<div class="appointment_con">
					<div class="outer_box">
						<div id="append_box"></div>
						<input class="address_box" type="text" onkeyup="getArea(this.value)"  placeholder="Enter Postal Code"  name="location_postal_code" id="zip">
						<div id="erro"></div>
						<select class="address_box address_name" id="ukAddress" name="location_address">
							<option value="">Select Area</option>
						</select>
						<a data-tab="treat" class="next_btn">Choose Treatment</a>
					</div>
				</div>
			</div>
			<div id="treat" class="tab-content">
				<div class="appointment_con">
					<div class="outer_box">
						<?php 
						if(!empty($categoryList) && is_array($categoryList)){
							$i=$j=1; 
							foreach ($categoryList as $category) {
								?>
								<div class="field_wrap treatment_wrap" data-type="<?php echo create_slug_by_string($category->category_name); ?>">
									<?php if (!empty($category->service)) : ?>
										<h4><input type="radio" class="treatment_type" data-check="<?php echo ($i == 1) ? 'checked' : 'unchecked'; ?>" data-type="<?php echo create_slug_by_string($category->category_name); ?>" name="treatment_type" value="<?php echo create_slug_by_string($category->category_id); ?>" <?php echo ($i==1) ? 'checked' : ''; ?>><?php echo $category->category_name; ?></h4>
										<div class="treatment_label" <?php echo ($i == 1) ? '' : 'style="display:none;"'; ?> data-type="<?php echo create_slug_by_string($category->category_name); ?>">
											<?php foreach ($category->service as $serviceName) { ?>
											<input id="box<?php echo $j; ?>" type="checkbox" name="treatment_data[]" value="<?php echo $serviceName->id; ?>" data-name="<?php echo $serviceName->service_name; ?>" data-price="<?php echo $serviceName->service_charge; ?>" /><label for="box<?php echo $j; ?>"><?php echo $serviceName->service_name; ?> <span>£<?php echo $serviceName->service_charge; ?></span></label>
											<?php $j++; } ?>
										</div>
									<?php else: ?>
										<h4><input disabled="" type="radio"><?php echo $category->category_name; ?></h4>
									<?php endif; ?>
								</div>
								<?php $i++;
							}
						} ?>
						<div class="field_wrap">
							<a data-tab="date_time" class="next_btn">Choose Date & Time</a>
						</div>
					</div>	
				</div>
			</div> 
			<div id="date_time" class="tab-content">
				<div class="outer_box">
					<!-- <div id="calendar"></div> -->
					<div class="p-15 appointment_con">
						<input type="text" class="address_box open_datepicker datetimepicker" name="date" placeholder="<?= date('Y-m-d H:i:s'); ?>"></div>
					</div>
					<a data-tab="stylist" class="next_btn">Choose Stylist</a>
				</div>

				<div id="stylist" class="tab-content">
					<div class="outer_box">
						<div class="all_stylist">
							<div id="stylist_man"></div>
							<input type="hidden" class="stylist_id" name="stylist_id" value="">
							<!-- <a data-tab="payment" class="next_btn">Proceed to Payment</a> -->
						</div>
					</div>
				</div>
				<div id="payment" class="tab-content">
					<div class="outer_box">
						<div class="tab_con_row">
							<div class="stylist_man">
								<div class="tab_con_container">
									<span class="img_ico">
										<img src="images/01.png">
									</span>
									<div class="txt_container">
										<h6>Choose Stylist</h6>
									</div>
								</div>
							</div>
							<div class="coupon_con">
								<div class="inner_container">
									<h5 class="price_tag">£00.00</h5>
								</div>
							</div>
						</div>
						<div class="tab_schedule_row date_time">
							<ul class="sc_ul">
								<li class="sc-date"><img src="<?php echo base_url() .'assetweb/images/cal.png'; ?>"><span><?php echo date('D jS M Y'); ?></span></li>
								<li class="sc-time"><img src="<?php echo base_url() .'assetweb/images/watch.png'; ?>"><span><?php echo date('H:i:s'); ?></span></li>
								<li class="sc-location"><img src="<?php echo base_url() .'assetweb/images/location.png'; ?>"><span>Select Area</span></li>
							</ul>
						</div>

						<div class="tab_schedule_row services">
							<div class="sc-date">
								<span>Services: </span>
							</div>
							<ul class="sc_ul">
								<li class="sc-time">
									<span></span>
								</li>
							</ul>
						</div>
					</div>
					<input type="submit" class="btn_style_03 book_info_btn new_apnment_submit_btn" name="add_new_appointment_btn" value="Book Appointments">
				</div>
			</form>
		</div>
		<!-- add new appointmnets end -->

		<div class="upcoming_booking_details">
			
		</div>

	</div>

	<script type="text/javascript">
		var base_url = '<?php echo base_url(); ?>';

		function getBooking(s_id){
			jQuery.ajax({
				type: "POST",
				url: base_url+"Home/appoinmentDetails/"+s_id,
				dataType: 'json',
				data: {s_id: s_id},
				success: function(res) {
					if (res.success == 1) {
						$("html, body").animate({ scrollTop: 0 }, 600);
						jQuery('.add_new_appointments_wrap').fadeOut();
						$('.upcoming_booking_details').hide();
						$('.upcoming_booking_details').html(res.data);
						$('.upcoming_booking_details').fadeIn('slow');
						return false;
					}
				}
			});
		}

		function cancelupcoming(s_id,parking_fee,travel_fee){
			jQuery.ajax({
				type: "POST",
				url: base_url+"Home/cancelAppoinment/"+s_id+parking_fee+travel_fee,
				dataType: 'json',
				data: {s_id: s_id,parking_fee: parking_fee,travel_fee: travel_fee},
				success: function(res) {
					if(res != ''){
						swal("Your appointment is canceled!")
						setTimeout(location.reload.bind(location), 3000);
					}
				}
			});
		}

		var base_url = '<?php echo base_url(); ?>';
		function preBooking(s_id){
			jQuery.ajax({
				type: "POST",
				url: base_url+"Home/appoinmentDetails/"+s_id,
				dataType: 'json',
				data: {s_id: s_id},
				success: function(res) {
					if (res.success == 1) {
						$("html, body").animate({ scrollTop: 0 }, 600);
						//$('#previouss').html(res.data);
						return false;
					}
					var fromDate = new Date(res.data.data.appointment_date);
					var date = new Date(fromDate).toDateString("Y M d");
					var getCurrentAmPm = fromDate.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })
					var services =res.data.data.services;
					// if(res != ''){
					// 	var data ='<div class="tab_con_row Upcoming_user show_tab"><div class="tab_con_container"><span class="img_ico"><img src="'+res.data.data.profile_pic +'"></span><div class="txt_container"><h6>'+res.data.data.firstname.charAt(0).toUpperCase() + res.data.data.firstname.substr(1).toLowerCase() +" "+ res.data.data.lastname.charAt(0).toUpperCase() + res.data.data.lastname.substr(1).toLowerCase()+'</h6></div><h5 class="price_tag">£'+res.data.data.total_cost +'.00</h5></div><div class="tab_schedule_row"><ul class="sc_ul"><li class="sc-date fa fa-calendar"> <span>'+ date +'</span></li><li class="sc-time fa fa-clock-o"> <span>'+getCurrentAmPm+'</span></li><li class="sc-location fa fa-map-marker"> <span>'+res.data.data.address +'</span></li></ul></div><div class="tab_schedule_row"><ul class="sc_ul"><li class="sc-date"><span>Services: </span></li>';
					// 	for(var i =0; i < services.length; i++){
					// 		data +='<li class="sc-time"><span>'+services[i].service_name+'</span></li><li class="sc-time"><span>£'+services[i].service_charge+'.00</span></li>';
					// 	}
					// 	data += '</ul></div><div class="tab_schedule_row"><ul class="sc_ul"><li class="sc-date"><span>Additional Charges: </span></li><ul><li class="sc-date"><span>Parking Fees: </span></li><li class="sc-time"><span>'+res.data.data.parking_fee+'</span></li></ul><ul><li class="sc-date"><span>Travel Fees: </span></li><li class="sc-time"><span>'+res.data.data.travel_fee+'</span></li></ul></ul></div><div class="tab_schedule_row"><ul class="sc_ul"><li class="sc-date"><span>Total: </span></li><li class="sc-time"><span>£'+res.data.data.total_cost+'.00</span></li></ul></div>'+
					// 	(res.data.data.status == 4 ? '' : '<a class="btn_indigo">Chat to stylist</a> &nbsp; <a onclick="cancelupcoming('+res.data.data.appoinment_id+','+res.data.data.parking_fee+','+res.data.data.travel_fee+')" class="btn_red">Cancel appointment</a></div>');
					// 	if(res.data.data.status == 3){
					// 		$('#previouss').html('');
					// 	}else{
					// 		$('#previouss').html(data);
					// 		$("#getdata").html('');
					// 	}
					// }
				}
			});
		}

		function cancelprevious(s_id,parking_fee,travel_fee){
			jQuery.ajax({
				type: "POST",
				url: base_url+"Home/cancelAppoinment/"+s_id+parking_fee+travel_fee,
				dataType: 'json',
				data: {s_id: s_id,parking_fee: parking_fee,travel_fee: travel_fee},
				success: function(res) {
					if(res != ''){
						swal("Your appointment is canceled!")
						setTimeout(location.reload.bind(location), 3000);
					}
				}
			});
		}

		function getArea(value) {
			$.ajax({
				url: "https://api.getaddress.io/find/"+value+"?api-key=KxWZCALNOk6uzozuPuhcQg12224",
				dataType: "json",	
				type: "GET",
				success: function(result, success) {
					var lat = result.latitude
					var long = result.longitude
					var address = result.addresses;
					var	htmls = '';
					htmls += '<option value="">Select Area</option>';
					if(result != ''){
						for(var i =0; i < address.length; i++){
							htmls += '<option value="'+lat+'_'+long+'">'+address[i]+'</option>';
						}
						$(document).ready(function(elem){
							$("select.address_name").change(function(){
								var selectedCountry = $(".address_name option:selected").html();
								var	addressBox = '';
								addressBox += '<a class="address_box active">'+selectedCountry+'</a>';
								$("#append_box").html(addressBox);
							});
						});
						$("#lat").html(lat);
						$("#long").html(long);
						$("#ukAddress").html(htmls);
						$("#erro").html('');
					}else{
						$("#ukAddress").html('');
					}
				},
				error: function(result, success) {
					var	htmls = '';
					htmls += '<option value="">Select Area</option>';
					$("#erro").html('Invalide Zip Code!');
					$("#ukAddress").html(htmls);
				}
			});
		}

		function submit_add_new_appointment_form(formData){
			$.ajax({
				url: base_url+'Home/submit_add_new_appointments_form',
				type: 'POST',
				dataType: 'json',
				data: formData,
				success: function(res){
					console.log(res);
				},
			});
			return false;
		}
	</script>