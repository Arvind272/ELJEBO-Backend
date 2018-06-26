jQuery(document).ready(function(){
	jQuery('.add_new_appointments_form').on('submit',function(e){
		jQuery('#payment').append('<p class="loading_text">Loading...</p>');
		e.preventDefault();
		$.ajax({
			url: base_url+'Home/submit_add_new_appointments_form',
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
			success: function(res){
				jQuery('p.loading_text').remove();
				if (res.status == 1){
					window.location = SITE_URL+"Home/dashboard";
				}
			},
		});
		return false;
	});

	// Select Stylist
	jQuery('body').on('change','input.stylist_ids',function(){
		var value = $(this).val();
		jQuery('input.stylist_id').val(value);
	});

});

jQuery(document).ready(function() {



	/*FOR IMAGE TO BG*/
	var idCount = 1;
	jQuery('.bg-image').each(function () {
		jQuery(this).attr('id', 'media-' + idCount);
		idCount++;
		var getID = jQuery(this).attr('id');
		var imagesrc = jQuery('img', this).attr("src");
		jQuery(this).css('background-image', 'url(' + imagesrc + ')');
	});

	$(".customer_slider").owlCarousel({
nav : true, // Show next and prev buttons
dots: true,
slideSpeed : 300,
paginationSpeed : 400,
//autoplay :true,
loop:true,
responsive:{
	0:{
		items:1
	},
	320:{
		items:1
	},
	360:{
		items:1
	},
	414:{
		items:1
	},
	480:{
		items:1
	},

	1000:{
		items:2
	},

	1024:{
		items:3
	}
}
//singleItem:false,
});

	jQuery(".trigger-nav-0").click(function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("nav-open-0");
	});
	jQuery(".close-menu").click(function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("nav-open-0");
	});


	/* <!-- res nav end -->*/


	jQuery(".trigger-nav-1").click(function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("nav-open-1");
	});
	jQuery(".close-menu_02").click(function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("nav-open-1");
	});

	/* <!-- res nav end -->*/

	/*signup */

	jQuery(".myBtn").click(function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("open_signup");
		jQuery('body').removeClass("open_signin");
	});
	jQuery(".close_s").click(function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("open_signup");
	});
	jQuery('.no_thanks').click(function(event) {
		event.preventDefault(); 
		jQuery('body').toggleClass('open_signup')
	});

	/*signup */

	/*LOGIN POPUP */

	jQuery(".sign_in_btn").click(function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("open_signin");
	});
	jQuery(".close_i").click(function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("open_signin");
	});
	jQuery('.no_thanks_i').click(function(event) {
		event.preventDefault(); 
		jQuery('body').toggleClass('open_signin')
	});

	/*LOGIN */

	/*BOOKINFO POPUP */

	jQuery("body").on('click','.dcrf_modal_popup_btn',function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("dcrf_modal_popup_main");
	});
	jQuery(".dcrf_close_popup").click(function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("dcrf_modal_popup_main");
	});

	/*BOOKINFO POPUP end */

	/*LOGIN POPUP */

	jQuery(".register_sec").click(function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("open_register");
		jQuery('body').removeClass("open_signin");
	});
	jQuery(".close_r").click(function (event) {
		event.preventDefault();
		jQuery('body').toggleClass("open_register");
	});
	jQuery('.no_thanks_r').click(function(event) {
		event.preventDefault(); 
		jQuery('body').toggleClass('open_register')
	});

	/*LOGIN */



	// jQuery(this).on('click', '.stylist_profile', function(e) {
	// 	e.preventDefault();
	// 	jQuery('.view_sty_profile .modal').toggleClass('is-visible');
	// 	var id =jQuery(this).attr('data-id');
	// 	jQuery.ajax({
	// 		type: "POST",
	// 		url: SITE_URL+"Home/getViewStylish/"+id,
	// 		dataType: 'json',
	// 		data: {id: id},
	// 		success: function(res) {
	// 			jQuery('#stylerName').text(res.data[0].firstname.charAt(0).toUpperCase() + res.data[0].firstname.substr(1).toLowerCase()+' '+res.data[0].lastname.charAt(0).toUpperCase() + res.data[0].lastname.substr(1).toLowerCase());
	// 		}
	// 	});
	// });
	jQuery(".view_sty_profile .close_ico").click(function(){
		jQuery(".view_sty_profile .modal").removeClass("is-visible");
	});

	// Get form all value for review
	jQuery('form.add_new_appointments_form input,form.add_new_appointments_form select, form.add_new_appointments_form, .next_btn').on('keyup keypress change click',function(){

		var postal_code 	= jQuery('#zip').val();
		// Address
		var selectedAddress = $(".address_name option:selected").html();
		jQuery('#payment .sc-location span').html(selectedAddress);

		var treatment_type 	= jQuery('.treatment_type:checked').val();
		var treatment_label = jQuery('.treatment_label input').val();
		// Total Price
		var total_price = 0;
		var prices = jQuery('.treatment_label input[type=checkbox]:checked').map(function(){
			return total_price += parseInt(jQuery(this).attr('data-price'));
		}).get();
		jQuery('#payment .price_tag').html('£'+total_price);

		// Service Full Data
		var cat_data = [];
		var treat_cat_ids = jQuery('.treatment_label input[type="checkbox"]:checked').each(function(){
			var price = $(this).attr('data-price');
			return cat_data.push('<li class="sc-time"><span>'+$(this).attr('data-name')+'</span></li><li class="sc-time"><span>£'+price+'</span></li>');
		}).get();
		var treat_cat_id = cat_data.join(' ');
		jQuery('.tab_schedule_row.services ul.sc_ul').html(treat_cat_id);


		// Date
		var datetime = jQuery('.open_datepicker.datetimepicker').val();
		var date = new Date(datetime).toDateString("Y M d");
		jQuery('.tab_schedule_row.date_time ul li.sc-date span').html(date);
		var getCurrentAmPm = datetime.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
		var time = datetime.split(" ");
		jQuery('.tab_schedule_row.date_time ul li.sc-time span').html(time[1]+' '+time[2]);
	});
	
	// Stylist Name AND Image
	jQuery('body').on('change','input.stylist_ids',function(){
		var this_var = $(this);
		var stylist_name 	= this_var.parents('.stylist').find('label.stylist_name').html();
		var stylist_img 	= this_var.parents('.stylist').find('span.img_ico').html();

		// Title
		jQuery('#payment .txt_container h6').html(stylist_name);
		jQuery('#payment .img_ico').html(stylist_img);
	});

	/* Donation Popup */
	jQuery('#stylist').on('click','.stylist_profile', function(e) {
		e.preventDefault();
		var this_var 		= jQuery(this);
		var this_parents 	= this_var.parents('.tab_con_row.stylist');
		var name 			= this_parents.find('.stylist_name').html();
		var img 			= this_parents.find('span.img_ico img').attr('src');
		var gallery 		= this_parents.find('.portfoilio_data').html();

		jQuery('.view_sty_profile .stylist_man .img_ico img').attr('src', img);
		jQuery('.view_sty_profile span.stylist_profession').html(name);
		jQuery('.view_sty_profile .customers_container').html(gallery);

		jQuery('.view_sty_profile .modal').toggleClass('is-visible');
	});

	jQuery(".view_sty_profile .close_ico").click(function(){
		jQuery(".view_sty_profile .modal").removeClass("is-visible");
	});

	/* Donation popup end */

	/*user con man main_content_dashboard*/
	jQuery('#Upcoming_Bookings .tab_con_row').click(function(event) {
		jQuery(".main_content_dashboard .tab_con_row").removeClass("show_tab");
		jQuery(".main_content_dashboard .add_new_appointments").removeClass("show_tab");
		jQuery(".main_content_dashboard .tab_content_items").removeClass("show_tab");
		jQuery('.main_content_dashboard .Upcoming_user').addClass('show_tab');
	});

	jQuery('#Upcoming_Bookings .tab_con_row_add_appointment').click(function(event) {
		$('.add_new_appointments_wrap').fadeIn();
		$('.upcoming_booking_details').html('');
		// jQuery(".main_content_dashboard .tab_con_row").removeClass("show_tab");
		// jQuery(".main_content_dashboard .add_new_appointments").removeClass("show_tab");
		// jQuery('.main_content_dashboard .add_new_appointments').addClass('show_tab');
		// jQuery(".main_content_dashboard .add_new_appointments_wrap").removeClass("show_tab");
		// jQuery('.main_content_dashboard .add_new_appointments_wrap').addClass('show_tab');
		// jQuery(".main_content_dashboard .tab_content_items").removeClass("show_tab");
		// jQuery('.main_content_dashboard .tab_content_items').addClass('show_tab');
	});

	jQuery('#Previous_Bookings .tab_con_row').click(function(event) {
		jQuery(".main_content_dashboard .tab_con_row").removeClass("show_tab");
		jQuery(".main_content_dashboard .add_new_appointments").removeClass("show_tab");
		jQuery(".main_content_dashboard .tab_content_items").removeClass("show_tab");
		jQuery('.main_content_dashboard .previous_booking_user').addClass('show_tab');
	});

	jQuery('#Chat .tab_con_row').click(function(event) {
		jQuery(".main_content_dashboard .tab_con_row").removeClass("show_tab");
		jQuery(".main_content_dashboard .add_new_appointments").removeClass("show_tab");
		jQuery(".main_content_dashboard .tab_content_items").removeClass("show_tab");
		jQuery('.main_content_dashboard .chat_user').addClass('show_tab');
	});

	jQuery('#profile_settings .tab_con_row').click(function(event) {
		jQuery(".main_content_dashboard .tab_con_row").removeClass("show_tab");
		jQuery(".main_content_dashboard .add_new_appointments").removeClass("show_tab");
		jQuery(".main_content_dashboard .tab_content_items").removeClass("show_tab");
		jQuery('.main_content_dashboard .profile_and_settings').addClass('show_tab');
	});


	/*user con man main_content_dashboard end*/

	/*user con man main_content_dashboard responsive*/
	jQuery('#Upcoming_Bookings_02 .tab_con_row').click(function(event) {
		jQuery(".main_content_dashboard .tab_con_row").removeClass("show_tab");
		jQuery(".main_content_dashboard .add_new_appointments").removeClass("show_tab");
		jQuery(".main_content_dashboard .tab_content_items").removeClass("show_tab");
		jQuery('.main_content_dashboard .Upcoming_user').addClass('show_tab');
	});

	jQuery('#Upcoming_Bookings_02 .tab_con_row_add_appointment').click(function(event) {
		jQuery(".main_content_dashboard .tab_con_row").removeClass("show_tab");
		jQuery(".main_content_dashboard .add_new_appointments").removeClass("show_tab");
		jQuery('.main_content_dashboard .add_new_appointments').addClass('show_tab');
	});

	jQuery('#Previous_Bookings_02 .tab_con_row').click(function(event) {
		jQuery(".main_content_dashboard .tab_con_row").removeClass("show_tab");
		jQuery(".main_content_dashboard .add_new_appointments").removeClass("show_tab");
		jQuery('.main_content_dashboard .previous_booking_user').addClass('show_tab');
	});

	jQuery('#Chat_02 .tab_con_row').click(function(event) {
		jQuery(".main_content_dashboard .tab_con_row").removeClass("show_tab");
		jQuery(".main_content_dashboard .add_new_appointments").removeClass("show_tab");
		jQuery('.main_content_dashboard .chat_user').addClass('show_tab');
	});

	jQuery('#profile_settings_02 .tab_con_row').click(function(event) {
		jQuery(".main_content_dashboard .tab_con_row").removeClass("show_tab");
		jQuery(".main_content_dashboard .add_new_appointments").removeClass("show_tab");
		jQuery('.main_content_dashboard .profile_and_settings').addClass('show_tab');
	});

	/*user con man main_content_dashboard responsive end*/

	/*ADD NEW APPOINTMENt*/



// jQuery('.next_btn').click(function(){
//   var tab_id = jQuery(this).attr('data-tab');
//   var linkId = jQuery('.appoinment_tabs li').attr('data-tab');
//    jQuery('.appoinment_tabs li').removeClass('current');
//    jQuery(linkId+'li').addClass('current');

//   jQuery('.tab-content').removeClass('current');
//   jQuery("#"+tab_id).addClass('current');
// });

jQuery('.add_new_appointments').each(function() {

	jQuery(this).on('click', 'li', function(){

		var tab_id = jQuery(this).attr('data-tab');
		jQuery('.appoinment_tabs li').removeClass('current');
		jQuery('.tab-content').removeClass('current');
		jQuery(this).addClass('current');
		jQuery("#"+tab_id).addClass('current');
// alert();

$('#calendar').fullCalendar({

	header: {
		left: 'prev',
		center: 'title',
		right: 'next'
	},
	defaultDate: new Date(),
	editable: true,
	droppable: true,
	drop: function() {
		if ($('#drop-remove').is(':checked')) {
			$(this).remove();
		}
	},
	eventLimit: true,
	events: [{
		start: '2015-02-07',
		end: '2015-02-10',
	}]
});
});

	jQuery('body').on('click', '.next_btn', function(){
		var this_var 	= $(this);
		var parentsID 	= this_var.parents('div.tab-content').attr('id');
		if (parentsID == 'location') {
			var inputval 	= $('#'+parentsID).find('input.address_box');
			if (inputval.val() == '') {
				inputval.focus(); return false;
			}
			var selectval = $('#'+parentsID).find('select');
			if (selectval.val() == '') {
				selectval.focus(); return false;
			}
			$(".tab-link[data-tab="+parentsID+"]").addClass('complete');
		}
		if (parentsID == 'treat') {
			var treatment_type = $('#'+parentsID).find('input.treatment_type:checked').attr('data-type');
			var treat_label = jQuery('.treatment_label[data-type='+treatment_type+']').find('input:checked');
			if (treat_label.length <= 0) {
				treat_label.focus();
				return false;
			}
			$(".tab-link[data-tab="+parentsID+"]").addClass('complete');
		}
		if (parentsID == 'date_time') {
			var inputval 	= $('#'+parentsID).find('input');
			if (inputval.val() == '') {
				inputval.focus();
				return false;
			}
			$(".tab-link[data-tab="+parentsID+"]").addClass('complete');
		}

		if (parentsID == 'stylist') {
			var inputval 	= $('#'+parentsID).find('input.stylist_id');
			if (inputval.val() == '') {
				inputval.focus();
				return false;
			}
			$(".tab-link[data-tab="+parentsID+"]").addClass('complete');
		}

		var tab_id = jQuery(this).attr('data-tab');
		var tab_li_id = jQuery('.appoinment_tabs li').attr('data-tab');
		jQuery('.tab-content').removeClass('current');
		jQuery('.appoinment_tabs li.tab-link').removeClass('current');
		jQuery('.appoinment_tabs li.tab-link[data-tab='+tab_id+']').addClass('current');
		jQuery("#"+tab_id).addClass('current');

		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});


	// Treatment Tab Show/Hide Cat Subcategories

	jQuery('.treatment_type').on('click',function(){
		var this_var 	= jQuery(this);
		var datatype 	= $(this).attr('data-type');
		var data_checked = this_var.attr('data-check');	
		if (data_checked == 'checked') {
			return false;
		}
		jQuery('.treatment_type').attr('data-check','unchecked');
		this_var.attr('data-check','checked');
		jQuery('.treatment_label').slideUp();
		jQuery('.treatment_label input').prop('checked', false);
		jQuery('.treatment_label[data-type='+datatype+']').slideDown();

	});

	$('.datetimepicker').datetimepicker({
		//format: 'YYYY-MM-DD HH:mm:ss',
		minDate: moment(),
		viewMode: 'days'
	});


	jQuery('body').on('click', '.next_btn[data-tab="stylist"]', function(){
		var appointment_date 	= jQuery('.add_new_appointments_wrap .open_datepicker').val();
		var lat_long 			= jQuery(".add_new_appointments_wrap .address_name option:selected").val();
		var treatment_type 		= jQuery('.add_new_appointments_wrap input.treatment_type:checked').attr('data-type');
		var treat_label 		= jQuery('.treatment_label[data-type="'+treatment_type+'"]').find('input:checked');
		var treat_cat = treat_label.map(function(){
			return $(this).val();
		}).get().join(',');;

		jQuery.ajax({
			url:SITE_URL+'Home/getStylistList',
			type: "POST",
			data: {'appointment_date': appointment_date,'lat_long': lat_long,'treat_sub_cat': treat_cat},
			dataType: 'json', 
			success:function(data){
				if (data.success == 1) {
					$('#stylist_man').html(data.data);
				}
			}
		});

	});

});




// jQuery('.next_btn').click(function(event) {
//   jQuery('.tab-content.current').removeClass('.current')
//   jQuery()
// });

/*VIEW PROFILE STYLIST*/



/*VIEW PROFILE STYLIST END*/

/*ADD NEW APPOINTMENt end*/

jQuery('.top_bar_heading .tab_heading.tablink').click(function(){

	jQuery('div').removeClass('show_tab');
//jQuery('.main_content_dashboard .add_new_appointments').css('display','none')
});


});
/*END OF READY FUNCTION*/


/* dashboard left menu tab js desktop*/
function openCity(evt, cityName) {
	var i, x, tablinks;
	x = document.getElementsByClassName("city");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < x.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active_tab", "");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active_tab";
}

/* dashboard left menu tab js mobile*/
function openCity(evt, cityName) {
	var i, x, tablinks;
	x = document.getElementsByClassName("city");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < x.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active_tab", "");
	}
	document.getElementById(cityName).style.display = "block";

	evt.currentTarget.className += " active_tab";
}
