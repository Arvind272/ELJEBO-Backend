//SHOW HIDE PASSWORD ON CHANGE PASSWORD POPUP
jQuery('.showpass-icon').on('click',function() {
	var $pwd = jQuery('.hideShow').attr('type');
	if ($pwd == 'password') {
		jQuery('.hideShow').attr('type', 'text');
		jQuery(this).html("<i class='fa fa-eye'></i>");
	}else {
		jQuery('.hideShow').attr('type', 'password');
		jQuery(this).html("<i class='fa fa-eye-slash'></i>");
	}
});
//SHOW HIDE PASWORD CONFIRM ON CHANGE PASSWORD POPUP
jQuery('.showpass-conhs').on('click',function() {
	var $pwd = jQuery('.confim_hs').attr('type');
	if ($pwd == 'password') {
		jQuery('.confim_hs').attr('type', 'text');
		jQuery(this).html("<i class='fa fa-eye'></i>");
	}else {
		jQuery('.confim_hs').attr('type', 'password');
		jQuery(this).html("<i class='fa fa-eye-slash'></i>");
	}
});
jQuery('#parking').change(function(){
	jQuery(".parking_val").prop("readonly", !jQuery(this).is(':checked'));
});
jQuery('#travel').change(function(){
	jQuery(".travel_val").prop("readonly", !jQuery(this).is(':checked'));
});
jQuery(document).ready(function(){
	jQuery(".fee").on("keyup", function(){
		var value1 = parseInt(jQuery('.parking_val').val());
		var value2 = parseInt(jQuery('.travel_val').val());
		var value3 = parseInt(jQuery('.service').val()); 
		if(!isNaN(value1)) {
			var sum = value1 + value2 + value3;
			jQuery('#total').text(sum);
		}else if(!isNaN(value2)) {
			var sum = value2 + value3;
			jQuery('#total').text(sum);
		}else{
			jQuery('#total').text(value3);
		}     
	})
})

//addMethod 
jQuery.validator.addMethod("noSpace", function(value, element) { 
	return value == '' || value.trim().length != 0;  
}, "No space please and don't leave it empty");

jQuery.validator.addMethod("validmail", function(value, element) {
	var valid = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(value);
	return valid;
}, "Please enter a valid email address.");

/*======== service =========*/
// service login form validation function start 
jQuery("form[name='serviceLoginForm']").validate({
	errorElement: 'span',
	errorClass: 'error-login',
	rules: {
		email: {
			required: true,
			email: true,
			validmail:true
		},
		password: {
			required: true,
			noSpace: true,
			minlength : 3,
			maxlength : 20
		}
	},messages: {
		password: {
			required: "Please enter your password",
			noSpace  :"Space not allow in password",
			minlength : "Password should not less than three length",
			maxlength : "Password should not more than twenty length"
		},
		email: {
			required: "Please enter your email",
			email: "Please enter valid email address",
			validmail:"Please enter valid email",
		}
	},
});
// service register form validation function start 
jQuery("form[name='serviceRegisterForm']").validate({
	errorElement: 'span',
	errorClass: 'error-login',
	rules: {
		firstname:{
			required: true,
		},
		lastname:{
			required: true,
		},
		email: {
			required: true,
			email: true,
			validmail:true
		},
		password: {
			required: true,
			noSpace: true,
			minlength : 3
		},
		password_confirm: {
			required: true,
			noSpace: true,
			minlength : 3,
			equalTo: "#pass"
		},
	},messages: {
		firstname:{
			required : "Please enter your first name",
		},
		lastname:{
			required : "Please enter your last name",
		},
		password: {
			required: "Please enter your password",
			noSpace  :"Space not allow in password",
			minlength : "Password should not less than three length"
		},
		password_confirm:{
			required: "You must confirm your password",
			noSpace  :"Space not allow in password",
			minlength : "Password should not less than six length",
			equalTo:"password do not match"
		},
		email: {
			required: "Please enter your email",
			email: "Please enter valid email address",
			validmail:"Please enter valid email",
		}
	},
});
// service Forgot form validation function start 
jQuery("form[name='forgotten']").validate({
	errorElement: 'span',
	errorClass: 'error-login',
	rules: {
		email: {
			required: true,
			email: true,
			validmail:true
		}
	},messages: {
		email: {
			required: "Please enter your email",
			email: "Please enter valid email address",
			validmail:"Please enter valid email",
		}
	},
});
// service appointment Detail Form validation function start 
jQuery("form[name='appointmentDetailForm']").validate({
	errorElement: 'span',
	errorClass: 'error-login',
	rules: {
		parking_fee: {
			required: true,
			number: true,
			minlength: 2
		},
		travel_fee: {
			required: true,
			number: true,
			minlength: 2
		}
	},messages: {
		parking_fee: {
			required: "Please enter your parking fee",
			minlength: "Please enter at least 3 characters.",
		},
		travel_fee: {
			required: "Please enter your travel fee",
			minlength: "Please enter at least 3 characters.",
		}
	},
});

// service login form validation function start 
jQuery("form[name='contactForm']").validate({
	errorElement: 'span',
	errorClass: 'error-login',
	rules: {
		mobile: {
			required: true,
			maxlength : 10,
			number: true
		},
		postalcode: {
			required: true,
			noSpace: true,
			minlength : 3,
			maxlength : 8
		},
		address: {
			required: true,
		}
	},messages: {
		mobile: {
			required: "Please enter your mobile",
			noSpace  :"Space not allow in mobile",
			maxlength : "Password should not more than 10 length"
		},
		postalcode: {
			required: "Please enter your postal code",
			noSpace  :"Space not allow in postal code",
			maxlength : "postal code should not more than 8 length"
		},
		address: {
			required: "Please enter address",
		}
	},
});

// service change Password validation function start 
jQuery("form[name='changePassword']").validate({
	errorElement: 'span',
	errorClass: 'error-login',
	rules: {
		old_password: {
			required: true,
		},
		new_password: {
			required: true,
			noSpace: true,
			minlength : 3
		},
		password_confirm: {
			required: true,
			noSpace: true,
			minlength : 3,
			equalTo: "#pass"
		}
	},messages: {
		old_password: {
			required: "Please enter your old password",
		},
		new_password: {
			required: "Please enter your new password",
			noSpace  :"Space not allow in password",
			minlength : "Password should not less than three length"
		},
		password_confirm: {
			required: "You must confirm your password",
			noSpace  :"Space not allow in password",
			minlength : "Password should not less than six length",
			equalTo:"password do not match"
		}
	},
});

//Service Certificate Form validation function  
jQuery("form[name='certificateForm']").validate({
	errorElement: 'span',
	errorClass: 'error-login',
	rules: {
		name: {
			required: true,
		},
		year: {
			required: true,
		},
		certificate: {
			required: true,
		}
	},messages: {
		name: {
			required: "Please enter your certificate name",
		},
		year: {
			required: "Please enter your certificate year",
		},
		certificate: {
			required: "Please enter your certificate image",
		}
	},
});

/*======== customer =========*/
// customer login form validation function start 
jQuery("form[name='loginForm']").validate({
	errorElement: 'span',
	errorClass: 'error-login',
	rules: {
		email: {
			required: true,
			email: true,
			validmail:true
		},
		password: {
			required: true,
			noSpace: true,
			minlength : 3,
			maxlength : 20
		}
	},messages: {
		password: {
			required: "Please enter your password",
			noSpace  :"Space not allow in password",
			minlength : "Password should not less than three length",
			maxlength : "Password should not more than twenty length"
		},
		email: {
			required: "Please enter your email",
			email: "Please enter valid email address",
			validmail:"Please enter valid email",
		}
	},
});
// customer form validation function start 
jQuery("form[name='registrationForm']").validate({
	errorElement: 'span',
	errorClass: 'error-login',
	rules: {
		firstname:{
			required: true,
		},
		lastname:{
			required: true,
		},
		email: {
			required: true,
			email: true,
			validmail:true
		},
		mobile:{
			required: true,
		},
		password: {
			required: true,
			noSpace: true,
			minlength : 3
		},
		password_confirm: {
			required: true,
			noSpace: true,
			minlength : 3,
			equalTo: "#pass"
		},
	},messages: {
		firstname:{
			required : "Please enter your first name",
		},
		lastname:{
			required : "Please enter your last name",
		},
		mobile:{
			required : "Please enter your mobile number",
		},
		password: {
			required: "Please enter your password",
			noSpace  :"Space not allow in password",
			minlength : "Password should not less than three length"
		},
		password_confirm:{
			required: "You must confirm your password",
			noSpace  :"Space not allow in password",
			minlength : "Password should not less than six length",
			equalTo:"password do not match"
		},
		email: {
			required: "Please enter your email",
			email: "Please enter valid email address",
			validmail:"Please enter valid email",
		}
	},
});
//customer Forgot form validation function start 
jQuery("form[name='forgotForm']").validate({
	errorElement: 'span',
	errorClass: 'error-login',
	rules: {
		email: {
			required: true,
			email: true,
			validmail:true
		}
	},messages: {
		email: {
			required: "Please enter your email",
			email: "Please enter valid email address",
			validmail:"Please enter valid email",
		}
	},
});



function validateLogin(){
	if(jQuery("form[name='loginForm']").valid()){
		loginSubmit();
	}
}
function validateRegister(){
	if(jQuery("form[name='registrationForm']").valid()){
		registerSubmit();
	}
}
function validateForgotForm(){
	if(jQuery("form[name='forgotForm']").valid()){
		forgotFormSubmit();
	}
}

function loginSubmit(form) {  
	var data =  jQuery('form[name="loginForm"]').serializeArray();
	postArray = jQueryPostData(data,[]);
	ajaxCall('Home/login','loginForm');
}
function registerSubmit(form) {  
	var data =  jQuery('form[name="registrationForm"]').serializeArray();
	postArray = jQueryPostData(data,[]);
	ajaxRegisterForm('Home/register','registrationForm');
}
function forgotFormSubmit(form) {  
	var data =  jQuery('form[name="forgotForm"]').serializeArray();
	postArray = jQueryPostData(data,[]);
	ajaxForgot('Home/forgotPass','forgotForm');
}



function validateServiceLogin(){
	if(jQuery("form[name='serviceLoginForm']").valid()){
		serviceLoginSubmit();
	}
}
function validateServiceRegister(){
	if(jQuery("form[name='serviceRegisterForm']").valid()){
		serviceRegisterSubmit();
	}
}
function validateServiceForgotten(){
	if(jQuery("form[name='forgotten']").valid()){
		serviceForgottenSubmit();
	}
}
function validateAppointmentDetail(status){
	if(jQuery("form[name='appointmentDetailForm']").valid()){
		appointmentDetailSubmit(status);
	}
}
function validateContactForm(form){
	if(jQuery("form[name='contactForm']").valid()){
		contactFormSubmit();
	}
}

function validateChangePassword(form){
	if(jQuery("form[name='changePassword']").valid()){
		changePasswordSubmit();
	}
}

function validateCertificateForm(form){
	if(jQuery("form[name='certificateForm']").valid()){
		jQuery("#certificate").submit();
	}
}



function serviceLoginSubmit(form) {  
	var data =  jQuery('form[name="serviceLoginForm"]').serializeArray();
	postArray = jQueryPostData(data,[]);
	ajaxCall('Service/serviceProviderLogin','serviceLoginForm');
}
function serviceRegisterSubmit(form) {  
	var data =  jQuery('form[name="serviceRegisterForm"]').serializeArray();
	postArray = jQueryPostData(data,[]);
	ajaxRegister('Service/serviceProviderRegister','serviceRegisterForm');
}
function serviceForgottenSubmit(form) {  
	var data =  jQuery('form[name="forgotten"]').serializeArray();
	postArray = jQueryPostData(data,[]);
	ajaxForgot('Service/serviceForgotPassword','forgotten');
}
function appointmentDetailSubmit(status) { 
	var data =  jQuery('form[name="appointmentDetailForm"]').serializeArray();
	postArray = jQueryPostData(data,[]);
	postArray.status=status;
	ajaxAppointment('Service/updateAppoinment','appointmentDetailForm');
}
function contactFormSubmit() {  
	var data =  jQuery('form[name="contactForm"]').serializeArray();
	postArray = jQueryPostData(data,[]);
	ajaxCommon('Service/contactSubmitInfo','contactForm');
}
function changePasswordSubmit() {  
	var data =  jQuery('form[name="changePassword"]').serializeArray();
	postArray = jQueryPostData(data,[]);
	ajaxCommon('Service/changePasswordSubmit','changePassword');
}

var ignore = [];
function jQueryPostData(data,ignore){
	var  array = {};
	jQuery.each(data,function () {
		if(jQuery.inArray(this.name,ignore))
			array[this.name] = this.value;      
	})
	return array;
}

//ajax common 
function ajaxCommon(method_url,form){
	jQuery.ajax({
		url:SITE_URL+method_url,
		data:postArray,
		type: 'POST',
		dataType: 'json',
		success: function(data) {
			if(data.success == 1){             
				swal('', data.message, 'success'); 
				setTimeout(function(){ window.location.href = SITE_URL+'Service/setting'; }, 1000);
			}else{
				swal('',data.message,'error'); 
			}
		}
	});
}
// Login Ajax Call
function ajaxCall(method_url,form){
	jQuery.ajax({
		url:SITE_URL+method_url,
		data:postArray,
		type: 'POST',
		dataType: 'json',
		success: function(data) {
			if(data['user_type'] == 1){             
				swal(
					'',
					'Login successfully.',
					'success'
					); 
				setTimeout(function(){ window.location.href = SITE_URL+'Home/dashboard'; }, 1000);
			}else if(data['user_type'] == 2 || data['user_type'] == 3){               
				swal(
					'',
					'Login successfully.',
					'success'
					); 
				setTimeout(function(){ window.location.href = SITE_URL+'Service/dashboard'; }, 1000);
			}else{
				swal(
					'',
					data.message,
					'error'
					); 
			}
		}
	});
}
//service register Ajax Call
function ajaxRegister(method_url,form){
	jQuery.ajax({
		url:SITE_URL+method_url,
		data:postArray,
		type: 'POST',
		dataType: 'json',
		success: function(data) {
//console.log(data);
if(data.success == 1){             
	swal(
		'',
		data.message,
		'success'
		); 
	setTimeout(function(){ window.location.href = SITE_URL+'Service/dashboard'; }, 1000);
}else{
	swal(
		'',
		data.message,
		'error'
		); 
}
}
});
}

// Forgot Password
function ajaxForgot(method_url,form){
	jQuery.ajax({
		url:SITE_URL+method_url,
		data:postArray,
		type: 'POST',
		dataType: 'json',
		success: function(data) {
			if(data.success == 1){             
				swal('', data.message, 'success'); 
				setTimeout((function() { window.location.reload(); }), 1000);
			}else{
				swal('',data.message,'error'); 
			}
		}
	});
}

//Ajax Appointment
function ajaxAppointment(method_url,form){
	var name =jQuery('#userName').text();
	console.log(name);
	jQuery.ajax({
		url:SITE_URL+method_url,
		data:postArray,
		type: 'POST',
		dataType: 'json',
		success: function(data) {
			if(postArray.status == 2){             
				swal(data.message,'You have accepted the appointment requested by '+name, 'success'); 
				setTimeout(function(){ window.location.href = SITE_URL+'Service/pending'; }, 2000);
			}else if(postArray.status == 3){
				swal(data.message,'You have rejected the appointment requested by '+name, 'success'); 
				setTimeout(function(){ window.location.href = SITE_URL+'Service/pending'; }, 2000);  
			}
			else if(postArray.status == 3){
				swal('',data.message,'error'); 
			}
		}
	});
}

//service Logout Ajax Call
function onLogout() {
	jQuery.ajax({
		url:SITE_URL+'Service/logout',        
		type: 'POST',
		error: function() {
			alert('An error has occurred');
		},
		dataType: 'json',
		success: function(data) {
			if(data.success == false){               
				swal('',data.message,'error');
			}else{
				swal('',data.message,'success');
				setTimeout(function(){ window.location.href = SITE_URL+'Service/login'; }, 1000);
			}
		},
	});
}  

// Costumer Register Ajax Call
function ajaxRegisterForm(method_url,form){
	jQuery.ajax({
		url:SITE_URL+method_url,
		data:postArray,
		type: 'POST',
		dataType: 'json',
		success: function(data) {
			if(data.success == 1){             
				swal(
					'',
					data.message,
					'success'
					); 
				setTimeout(function(){ window.location.href = SITE_URL+'Home/dashboard'; }, 1000);
			}else{
				swal(
					'',
					data.message,
					'error'
					); 
			}
		}
	});
}
//service Logout Ajax Call
function logout() {
	jQuery.ajax({
		url:SITE_URL+'Home/logout',        
		type: 'POST',
		error: function() {
			alert('An error has occurred');
		},
		dataType: 'json',
		success: function(data) {

			if(data.success == false){               
				swal('',data.message,'error');
			}else{
				swal('',data.message,'success');
				setTimeout(function(){ window.location.href = SITE_URL; }, 1000);
			}
		},
	});
} 
//get zip code all info User 
jQuery(".postalcode").on("change",function(){
	var this_var = jQuery(this);
	var zip =jQuery(".postalcode").val();
	if(zip != ""){
		var zip_length = zip.length;
		//if (zip_length >= 6) {
			jQuery.ajax({
				url:SITE_URL+'Service/zipCodeInfo',
				type: "POST",
				data: {'zip': zip},
				dataType: 'json', 
				success:function(data){
					if(data.success == true){
						jQuery("#address").val(data.address); 
					}else{
						this_var.val('');
						this_var.attr('placeholder',zip);
						swal('',data.message,'error');
					}
				}
			});
		//}
	}
});

//Delete PortFolio Image
jQuery('.portFolio').on('click',function(){
	var image_id =jQuery('#col').attr('data-id');
	swal({
		title: "Are you sure?",
		text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "No, cancel plx!",
		closeOnConfirm: false,
		closeOnCancel: false
	}).then(function(isConfirm) {
		if (isConfirm == true) {
			jQuery.ajax({
				url:SITE_URL+'Service/portFolioDelete',
				type: "POST",
				data: {'image_id': image_id},
				dataType: 'json', 
				success:function(data){
					if(data.success == false){               
						swal('',data.message,'error');
					}else{
						swal('',data.message,'success');
						jQuery("#col").remove();
					}
				}
			});
		} else {
			swal("Cancelled", "Your imaginary file is safe :)", "error");
		}
	});
});



// Ajax Call For Save Chat Users
var ajax_restrict = true;
function ajaxCallForinitiateChat(room_id,message_to,message) {
	
	if (ajax_restrict == true) {
		jQuery.ajax({
			url:SITE_URL+'Home/saveUsersChat',
			type: 'POST',
			data: { 'room_id': room_id,'message_to': message_to,'message': message },
			dataType: 'json',
			success: function(data) {
				ajax_restrict = false;
			},
		});
	}
} 




/**
* Developer Code Start
*/

jQuery(document).ready(function(){

	


});