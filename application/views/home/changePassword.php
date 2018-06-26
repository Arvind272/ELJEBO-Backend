<style type="text/css">
.submitButton{
	border-radius: 35px;
	display: block;
	padding: 15px;
	width: 300px;
	background: #000;
	color: #fff;
	margin: 15px auto;
	transition: all ease 0.5s;
	font-size: 14px;

}
.appointment_con label{
	color: red;
	font-size: 13px;
	background: none;
	margin-top: -30px;
}
</style>
<!---/START OF MAIN LOCATION/-->

<div class="main_content_dashboard">
	<div id="location" class="tab-content current">
		<div class="appointment_con">
			<div class="outer_box" style="padding: 109px;">	
				<form method="post" action="<?php echo site_url(); ?>Home/customerChangePassword" id="changePassword">
					<?php 
					$item =  $this->session->flashdata('success');

					if($item != ''){ ?>
					<div class="alert alert-success">
						<?php echo  $item; ?>
					</div>
					<?php } ?>
					<input class="address_box" type="text" name="old_password"  id="old_password" placeholder="Old Password">

					<input class="address_box" type="text" name="new_password" id="new_password"  placeholder="New Password">

					<input class="address_box" type="text" name="confirm_passwprd" placeholder="Confirm Password">


					<input type="submit" name="updateProfile" class="submitButton" value="Update">

				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>