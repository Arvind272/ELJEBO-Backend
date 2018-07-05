<div class="page page-tables-datatables">
    <div class="pageheader">
        <h2>Staff <span>Staff of ELJEBO</span></h2>      

    </div>
    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">
<section class="tile">

<!-- tile header -->
<div class="tile-header dvd dvd-btm">
    <h1 class="custom-font"><strong>Staff</strong></h1>
	<?php echo $this->session->flashdata('message'); ?>
		<ul class="controls">
            <?php
                          $role = $this->session->userdata('role'); 
                            if($role == '0'){?>
			<!--<li>
				<a role="button" tabindex="0" id="add-entry" href="<?php echo site_url();?>admin/add_customer"><i class="fa fa-plus mr-5"></i> Add Customer</a>
			</li>-->
        <?php } ?>
		</ul>
</div> 
<!-- /tile header -->

<!-- tile body -->

<div class="tile-body">
    <div class="table-responsive">
        <table class="table table-custom" id="customers">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Create Date</th>
                <?php
                            if($role == '0'){?>
                
                <th style="width: 160px;" class="no-sort">Status</th>
               <?php /* <th style="width: 160px;" class="no-sort">Actions</th>*/?>
            <?php } ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach($info as $data) : ?>
                <tr class="odd gradeX" id="row_<?php echo $data['id'];?>">
                <td><?php echo $data['firstname'];?></td>
                <td><?php echo $data['lastname'];?></td>
                <td><?php echo $data['email'];?></td>
				 <td><?php echo ($data['user_type']==0)?'Super Admin':'Admin';?></td>
                <td><?php echo $data['create_date'];?></td>
                 <?php
                            if($role == '0'){?>
                <?php /*<td class="actions">
                    <a role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10" style="margin-right:  2px !important;" href="<?php echo base_url('admin/editCustomer/'.$data['id']);?>">Edit</a>|| <a role="button" tabindex="0" style="margin-right:  2px !important;" class="edit text-primary text-uppercase text-strong text-sm mr-10" href="<?php echo base_url('admin/viewCustomerData/'.$data['id']);?>">view</a> || <a role="button" tabindex="0" style="margin-right:  2px !important;" class="edit text-primary text-uppercase text-strong text-sm mr-10" href="javascript:void(0)" onclick="delete_user(<?php echo $data['id'];?>);">Delete</a>
                    <!-- <a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10" data-remove="<?php// echo $data['id'];?>">Remove</a> -->
                </td>*/?>
                <td class="actions">
                    <?php if($data['status']==1){ ?>

                    <button id="activatersd<?php echo $data['id'];?>" onclick="activate(<?php echo $data['id'];?>)" class ="btn btn-success">Active</button>

                    <button id="deactivaters<?php echo $data['id'];?>" style="display: none;"  onclick="deactivate(<?php echo $data['id'];?>)" class ="btn btn-warning">Deactive</button>

                    
                    <?php } else { ?>

                    <button id="activaters<?php echo $data['id'];?>" style="display: none;" onclick="activate(<?php echo $data['id'];?>)" class ="btn btn-success">Active</button>

                    <button id="deactivatersd<?php echo $data['id'];?>" onclick="deactivate(<?php echo $data['id'];?>)" class ="btn btn-warning">Deactive</button>
                    
                    <?php } ?>
                    
                </td>
            <?php } ?>
            </tr>
            <?php endforeach; ?>
            </tbody>
            
        </table>
    </div>
</div>






            </div>
    </div>

</div>



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
