<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>View Customers</h2>
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
                   <form  id="customer" method='POST'>
                   <input type="hidden" name="id" value="<?php echo $cust->id; ?>">
                      
                     <div class="form-group">
                        <label for="pwd">Profile Pic: </label>
                        <?php
                          if($cust->profile_pic !='' && $cust->profile_pic != 0){

                            $whr['id']=$cust->profile_pic;
                         $profile_image = $this->Admin_model->fetchrowedit('users_images',$whr);
                         foreach ($profile_image as $pic) { 
                             $proimg = $pic->image  ?>
                            
                             <img src=" <?php echo  base_url().'uploads/customer/'.$cust->id.'/'.$proimg?>" style="width: 100px; height: 100px;">
                         <?php }

                          } else { ?>

                          <img src=" <?php echo  base_url().'uploads/avtar.png' ;?>" style="width: 100px; height: 100px;">

                          <?php } ?>
                         
                      </div>

                      <div class="form-group">
                        <label for="pwd">First Name:</label>
                        <input type="text" class="form-control" id="firstname"  name="firstname" value="<?php echo ucfirst($cust->firstname); ?>" readonly>
                      </div>

                      <div class="form-group">
                        <label for="pwd">Last Name:</label>
                        <input type="text" class="form-control" id="lastname"  name="lastname" value="<?php echo ucfirst($cust->lastname); ?>" readonly>
                          </div>

                      <div class="form-group">
                        <label for="pwd">Address:</label>
                        <input type="text" class="form-control" id="address"  name="address" value="<?php echo ucfirst($cust->address); ?>" readonly>
                      </div>

                      <div class="form-group">
                        <label for="pwd">Telephone:</label>
                        <input type="text" class="form-control" id="telephone"  name="telephone" value="<?php echo $cust->telephone; ?>" readonly>
                      </div>

                      <div class="form-group">
                        <label for="pwd">Mobile:</label>
                        <input type="text" class="form-control" id="mobile"  name="mobile" value="<?php echo $cust->mobile; ?>" readonly>
                      </div>

                      <div class="form-group">
                        <label for="pwd">Landline:</label>
                        <input type="text" class="form-control" id="landline"  name="landline" value="<?php echo $cust->landline; ?>" readonly>
                      </div>

                      <h5 style="font-weight: 800;">Beauty Details:</h5>
                      <?php
                      

                       if(!empty($getBeautySubCatData)){ 
                       $beauty_details = $getBeautySubCatData['beatySubCatDetail'];
                       $beautyimg = $getBeautySubCatData['beautyImages'];
                       ?>

                       <div class="form-group">
                        <label for="pwd">Allergy:</label>
                        <input type="text" class="form-control" id="landline"  name="landline" value="<?php echo $getBeautySubCatData['allergy']; ?>" readonly>
                      </div>
                      
                      
                     
                      <div class="form-group">
                        <label for="pwd">Name:</label>
                        <?php   foreach ($beauty_details as $get_data) {   ?>
                        <input type="text" class="form-control" id="landline"  name="landline" value="<?php echo $get_data['name']; ?>" readonly>
                        <?php } ?>
                      </div>

                      <div class="form-group">
                        <label for="pwd">Image:</label>
                        <?php   foreach ($beautyimg as $get_img) { 

                        echo $customer_image = $get_img['image'];  ?>
                        <input type="text" class="form-control" id="landline"  name="landline" value="<?php echo $get_img['image']; ?>" readonly>
                        <img src="<?php echo  base_url().'uploads/customer/'.$cust->id.'/'.$customer_image?>">
                        

                        <?php } ?>
                      </div>
                      <?php } ?>
                    <!-- 
                      <input type="submit" name="update" class="btn btn-default" value="Update"> -->
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