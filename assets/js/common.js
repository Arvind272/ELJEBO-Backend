function delete_user(id) {
    if(confirm('Are you really want to delete it?')){
        var user_id = id;
        var base_url_path = base_url+'admin/deleteUser'; 
        if(user_id){
            $.ajax({
              type:'POST',
              url : base_url_path,
              data: {id:user_id},
              dataType: "json",
              success: function(res){
                if(res.success ==1){
                    $('#row_'+user_id).remove();
                }
                alert(res.message);

                }
            });
        }
      }
}