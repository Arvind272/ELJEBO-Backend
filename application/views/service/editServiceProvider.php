<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>View Service Provider <span>Service Provider GlamArmy</span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>View Customers</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->
                <!-- tile body -->
                <?php if(isset($fetch_customer)){
                    foreach ($fetch_customer as $cust) { ?>
                <div class="tile-body">
                   <form  id="customer" method='POST'  enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/updateservice">
                   <input type="hidden" name="id" value="<?php echo $cust->id; ?>">
                      
                     <div class="form-group">
                        <label for="pwd">Profile Pic: </label>
                        <?php $whr['id']=$cust->profile_pic;
                         $profile_image = $this->Admin_model->fetchrowedit('users_images',$whr);
                         foreach ($profile_image as $pic) { 
                             $proimg = $pic->image  ?>
                            
                             <img src=" <?php echo  base_url().'uploads/customer/'.$cust->id.'/'.$proimg?>" style="width: 100px; height: 100px;">
                         <?php } ?>
                      </div>

                      <div class="form-group">
                        <label for="pwd">First Name:</label>
                        <input type="text" class="form-control" id="firstname"  name="firstname" value="<?php echo $cust->firstname; ?>" >
                      </div>

                      <div class="form-group">
                        <label for="pwd">Last Name:</label>
                        <input type="text" class="form-control" id="lastname"  name="lastname" value="<?php echo $cust->lastname; ?>" >
                          </div>

                      <div class="form-group">
                        <label for="pwd">Address:</label>
                        <input type="text" class="form-control" id="address"  name="address" value="<?php echo $cust->address; ?>" >
                      </div>

                      <div class="form-group">
                        <label for="pwd">Telephone:</label>
                        <input type="text" class="form-control" id="telephone"  name="telephone" value="<?php echo $cust->telephone; ?>" >
                      </div>

                      <div class="form-group">
                        <label for="pwd">Mobile:</label>
                        <input type="text" class="form-control" id="mobile"  name="mobile" value="<?php echo $cust->mobile; ?>" >
                      </div>

                      <div class="form-group">
                        <label for="pwd">Landline:</label>
                        <input type="text" class="form-control" id="landline"  name="landline" value="<?php echo $cust->landline; ?>" >
                      </div>

                     
                      <input type="submit" name="update" class="btn btn-default" value="Update"> 
                    </form>
                </div>
                <?php }} ?>
                <!-- /tile body -->
            </section>
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>