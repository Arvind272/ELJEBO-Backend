<div class="main_content_dashboard previous_booking_main">



</div>


<script type="text/javascript">

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
					$('.previous_booking_main').hide();
					$('.previous_booking_main').html(res.data);
					$('.previous_booking_main').fadeIn();
				}
			}
		});
	}
</script>