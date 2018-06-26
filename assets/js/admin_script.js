$(document).ready(function(){
    $(".delete_row").click(function(){
       var id = $(this).attr("data-id");
       var method = $(this).attr("data-method");
       //alert(method);
		 swal({
		  title: "Are you sure want to delete this?",
		  type: "question",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "<a id='del'>Yes, delete it!</a>",
		  closeOnConfirm: false
		});

		$("#del").on("click",function(){
			if(id != ''){
                    jQuery.ajax({
                        url:SITE_URL+'admin/'+method,
                        data:{id:id},
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                              if(data.success){
                                    swal(
                                      '',
                                      data.message,
                                      'success'
                                    );

                              }else{
                                    swal(
                                      '',
                                      data.message,
                                      'error'
                                    );
                              }
                           setTimeout(function(){ window.location.reload(); }, 2000);
                        }
                  });
            }

		});
    });

    // //add service modal
    //  $("#add-entry").click(function(){

    //      // show Modal
    //      $('#services').modal('show');
    // });

    


});

