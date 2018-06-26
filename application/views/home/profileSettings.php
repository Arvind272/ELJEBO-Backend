<div class="main_content_dashboard customer_chat_main">
	<div class="tab_content_items">
		<div class="add_new_appointments">
			<h1 class="text">Your Addresses</h1>
			<ul class="appoinment_tabs">
				<li class="tab-link current" data-tab="postalCode">Add New</li>
				<li class="tab-link" data-tab="savedCode">Saved</li>
			</ul>
			<div id="postalCode" class="tab-content current">
				<div class="appointment_con">
					<div class="outer_box"> 
						<form method="POST" action="<?php echo get_current_page_method_url('class').'/saveCustomerAddress'; ?>">
							<input class="address_box" type="text" name="add_address_postalcode" placeholder="Enter Postal Code" onkeypress="return get_address_by_postalcode(this.value);">
							<div class="add_new_address_error"></div>
							<input type="hidden" class="latitude_longitude" name="latitude_longitude">
							<select class="address_box address_name" name="add_new_address"><option value="">Select Area</option></select>
							<input type="submit" class="btn_style_03 book_info_btn" name="add_new_address_btn" value="Add Address">
						</form>

					</div>
				</div>
			</div>

			<div id="savedCode" class="tab-content">
				<div class="appointment_con">
					<div class="outer_box">

						<?php 
						$customer_data = getDataByMethod('customerAddress');
						if (!empty($customer_data) && is_object($customer_data) && property_exists($customer_data, 'address')) {
							foreach ($customer_data->address as $key => $value) {
								echo '<a class="address_box" href="">'.$value->add.'</a>';
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>





<script type="text/javascript">

	var base_url = '<?php echo base_url(); ?>';
	function get_address_by_postalcode(postcode){
		
		if (postcode.length > 6) { 
			// jQuery.ajax({
			// 	type: "GET",
			// 	url: "https://api.getaddress.io/find/"+text_obj+"?api-key=KxWZCALNOk6uzozuPuhcQg12224",
			// 	dataType: 'json',
			// 	data: {postalcode: text_obj},
			// 	success: function(res) {
			// 		console.log(res);
			// 	}
			// });

			if(postcode == ''){
				jQuery('.add_new_address_error').html('<span style="color:red">Please enter valid postcode</span>');
			}else{
				url = "https://api.getaddress.io/find/"+postcode+"?api-key=KxWZCALNOk6uzozuPuhcQg12224";
				jQuery.ajax({
					url : url,
					method: "GET",
					success:function(data){
						jQuery('.add_new_address_error').html('');
						if(!(data.addresses[0]) || data.addresses[0] == undefined || data.addresses[0] == 'undefined' || data.addresses == ''){
							jQuery('.add_new_address_error').html('<span style="color:red">Please enter valid postcode</span>');
						}else{
							var htmls ='';
							var lat = data.latitude
							var long = data.longitude
							jQuery('.latitude_longitude').val(lat+'_'+long);
							for (i = 0; i < data.addresses.length; i++) {
								address = data.addresses[i];
								address = address.split(',,').join('');
								address = address.split(', ,').join('');
								htmls += '<option value="'+address+'">'+address+'</option>';
							}
							jQuery('select.address_box').html(htmls);
						}
					},
					error: function(result, success) {
						jQuery('.add_new_address_error').html('<span style="color:red">Please enter valid postcode</span>');
					}

				});
			}

		}
	}
</script>