<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Service Provider List <span>Service Provider ELJEBO</span></h2>

        <!-- <div class="page-bar">

            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html"><i class="fa fa-home"></i> Minovate</a>
                </li>
                <li>
                    <a href="#">Tables</a>
                </li>
                <li>
                    <a href="tables-datatables.html">Datatables</a>
                </li>
            </ul>

        </div> -->

    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

<section class="tile">

 <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Service Provider List</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                    <ul class="controls">
                        <li>
                            <a role="button" tabindex="0" id="add-entry" href="<?php echo site_url();?>admin/add_serviceProvider"><i class="fa fa-plus mr-5"></i> Add Service Provider</a>
                        </li>


                    </ul>
                </div>
                <!-- /tile header -->

<div class="tile-body">
    <div class="table-responsive">
        <table class="table table-custom" id="example">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th width="210px">Create Date</th>
                <th width="250px" class="no-sort">Actions</th>
                <th  class="no-sort">Status</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($fetch_customer)){
                        $i=1;
                        foreach ($fetch_customer as $cust) { ?>
                <tr class="odd gradeX" id="row_<?php echo $cust->id;?>">
                
                <td><?php echo ucfirst($cust->firstname);  ?></td>
                <td><?php echo ucfirst($cust->lastname);  ?></td>
                <td><?php echo $cust->email;  ?></td>
                <td><?php echo $cust->create_date;  ?></td>

                <td class="actions">
                    <a href="<?php //echo base_url(); ?>admin/editServiceProvider/<?php echo $cust->id; ?>" role="button" tabindex="0" style="margin-right: 2px !important;" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a>|| <a href="<?php echo base_url(); ?>admin/viewServiceProvider/<?php echo $cust->id; ?>" style="margin-right:  2px !important;"  role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">View</a> || <a role="button" tabindex="0" style="margin-right:  2px !important;" class="edit text-primary text-uppercase text-strong text-sm mr-10" href="javascript:void(0)" onclick="delete_user(<?php echo $cust->id;?>);">Delete</a>

                   <!--  <a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10 delete_row" data-id="<?php //echo $cust->id; ?>" data-method="delete_user">Remove</a>  -->
                </td>



               
               
                    
                  <td class="actions">
                    <?php if($cust->status==1){ ?>

                    <button id="activatersd<?php echo $cust->id;?>" onclick="activate(<?php echo $cust->id;?>)" class ="btn btn-success">Active</button>

                    <button id="deactivaters<?php echo $cust->id;?>" style="display: none;"  onclick="deactivate(<?php echo $cust->id?>)" class ="btn btn-warning">Deactive</button>

                    
                    <?php } else { ?>

                    <button id="activaters<?php echo $cust->id;?>" style="display: none;" onclick="activate(<?php echo $cust->id;?>)" class ="btn btn-success">Active</button>

                    <button id="deactivatersd<?php echo $cust->id;?>" onclick="deactivate(<?php echo $cust->id;?>)" class ="btn btn-warning">Deactive</button>
                    
                    <?php } ?>
                    
                </td>
              
            </tr>
            <?php $i++; }} ?>
            </tbody>
            
        </table>
    </div>
</div>
<!-- /tile body -->

<!-- /tile -->
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->

</div>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>


<script>
function activate($id) {
    if(confirm('Are you really want to deactivate it?')){
        var user_id = $id;
        var base_url_path = '<?php echo base_url();?>admin/deactivate/'+user_id; 

        if(user_id){
            $.ajax({
              
              type:'POST',
              url : base_url_path,
              data: 'country_id ='+user_id,
              success: function(res){
               window.location.reload(true);


                }
            });
          }
    }
    
}
</script>
<script>
function deactivate($id) {
    if(confirm('Are you really want to activate it?')){
        var user_id = $id;
        var base_url_path = '<?php echo base_url();?>admin/activate/'+user_id; 

        if(user_id){
            $.ajax({
              
              type:'POST',
              url : base_url_path,
              data: 'country_id ='+user_id,
              success: function(res){
                window.location.reload(true);


                }
            });
        }
      }
}
</script>