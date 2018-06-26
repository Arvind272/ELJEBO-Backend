<div class="main_content_dashboard previous_booking_main">
	<div id="location" class="tab-content current">
		<div class="appointment_con">
			<div class="outer_box">	
				<form method="post" action="<?php echo site_url(); ?>Home/updateCustomerProfile" id="profileUpdate" class="customerpofilesetting" enctype="multipart/form-data">

					<?php  $item =  $this->session->flashdata('success');

					if($item != ''){ ?>
					<div class="alert alert-success">
						<?php echo  $item; ?>
					</div>
					<?php } ?>

					<?php
					$post = array();
					$post['customer_id'] = get_current_user_id();
					$getCustomerProfile = getDataByMethod('getCustomerProfile', $post);
					$getCustomerProfile = $getCustomerProfile[0];
					
					if(!empty($getCustomerProfile)){ ?>

					<a class="stylist_man_profille">
						<span class="img_ico"><img src="<?php echo $getCustomerProfile->profilePicUrl; ?>">
							<input type="file" class="fa fa-camera cam" name="profile_pic" value="<?php echo $getCustomerProfile->profilePicUrl; ?>">
							<input type="hidden" class="fa fa-camera cam" name="preimage" value="<?php echo  "$getCustomerProfile->profilePicUrl" ?>">
						</span>
					</a>

					<input class="address_box" type="text" name="firstname" placeholder="First Name" value="<?php echo ucfirst($getCustomerProfile->firstname); ?>">
					<input class="address_box" type="text" name="lastname" placeholder="Last Name" value="<?php echo ucfirst($getCustomerProfile->lastname); ?>">
					<input class="address_box" type="text" name="email" placeholder="Email" value="<?php echo $getCustomerProfile->email; ?>" disabled >
					<!-- <input class="address_box" type="text" name="password" placeholder="Password" value="**********" disabled> -->
					<input class="address_box" type="text" onkeypress="return isNumber(event)" maxlength="10" name="mobile" placeholder="Mobile" value="<?php echo $getCustomerProfile->mobile; ?>">
					<input class="address_box" type="text" name="landline"  onkeypress="return isNumber(event)" maxlength="10" placeholder="Landline Number" value="<?php echo $getCustomerProfile->landline; ?>">
					<?php } ?>
					<input type="submit" name="updateProfile" class="submitButton" value="Update">

				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}
</script>
