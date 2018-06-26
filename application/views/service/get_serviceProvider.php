<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Service Provider List <span>Service Provider glamarmy</span></h2>

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
                    <h1 class="custom-font"><strong>Customers</strong></h1>
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
        <table class="table table-custom" id="customers">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Create Date</th>
                <th style="width: 160px;" class="no-sort">Actions</th>
                <th style="width: 160px;" class="no-sort">Status</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($fetch_customer)){
                        $i=1;
                        foreach ($fetch_customer as $cust) { ?>
                <tr class="odd gradeX">
                <td><?php echo $i; ?></td>
                <td><?php echo $cust->firstname;  ?></td>
                <td><?php echo $cust->lastname;  ?></td>
                <td><?php echo $cust->email;  ?></td>
                <td><?php echo $cust->create_date;  ?></td>

                <td class="actions">
                    <a href="<?php echo base_url(); ?>admin/editServiceProvider/<?php echo $cust->id; ?>" role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a>

                    <a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10 delete_row" data-id="<?php echo $cust->id; ?>" data-method="delete_user">Remove</a> 
                </td>
               
                    
                  <td class="actions">
                    <?php $status = $cust->status;

                    if($status ==1){ ?>
                        <a href="<?php echo base_url(); ?>admin/active_userp/<?php echo $cust->id; ?>">Deactivate</a>
                 <?php   }else{ ?>
                        <a href="<?php echo base_url(); ?>admin/deactive_userp/<?php echo $cust->id; ?>">Activate</a>
             <?php   }  ?>
                        
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