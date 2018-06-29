<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Customers <span>Registered customers of glamarmy</span></h2>

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
</div>
<!-- /tile header -->

<!-- tile body -->

<div class="tile-body">
    <div class="table-responsive">
        <table class="table table-custom" id="customers">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Referral</th>
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
                <td>
         <?php if($cust->referral_id !=0){
          $whr['id']=$cust->referral_id;
          $datareferral = $this->Admin_model->fetchrowedit('referral',$whr);
          foreach ($datareferral as $referral) {     ?>
                <?php echo  $referral->name;  ?>
                <?php }
               } ?>
               
               </td>
            
                <td><?php echo $cust->create_date;  ?></td>

                <td class="actions">
                    <a href="<?php echo base_url(); ?>admin/editCustomer/<?php echo $cust->id; ?>" role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">View</a>

                   <!--  <a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10" data-remove="<?php echo $cust->id;?>">Remove</a>  -->
                </td>
                <td class="actions">
                    <?php $status = $cust->status;

                    if($status ==1){ ?>
                        <a href="<?php echo base_url(); ?>admin/active_user/<?php echo $cust->id; ?>">Deactivate</a>
                 <?php   }else{ ?>
                        <a href="<?php echo base_url(); ?>admin/deactive_user/<?php echo $cust->id; ?>">Activate</a>
             <?php   }  ?>
                        
                </td>
            </tr>
            <?php $i++; }} ?>
            </tbody>
            
        </table>
    </div>
</div>
<!-- /tile body -->
<!-- Splash Modal -->
<!-- <section>
    <div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title custom-font">I'm a modal!</h3>
                </div>
                <div class="modal-body">
                    <p>This sure is a fine modal, isn't it?</p>

                    <p>Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default btn-border">Submit</button>
                    <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- /tile -->
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->

</div>