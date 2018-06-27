<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>View Service Provider <span>Service Provider ELJEBO</span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>View Service Provider</strong></h1>
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


                        <?php 
                        if($cust->profile_pic =='0'){ ?>
                          <img src=" <?php echo  base_url();?>uploads/avtar.png" style="width: 100px; height: 100px;">
                       <?php }else{


                        $whr['id']=$cust->profile_pic;
                         $profile_image = $this->Admin_model->fetchrowedit('users_images',$whr);
                         foreach ($profile_image as $pic) { 
                             $proimg = $pic->image;

                             if($proimg !=''){ ?>
                            
                             <img src=" <?php echo  base_url().'uploads/service_provider/'.$cust->id.'/'.$proimg?>" style="width: 100px; height: 100px;">

                             <?php }else{ ?>

                             <img src=" <?php echo  base_url();?>uploads/avtar.png" style="width: 100px; height: 100px;">

                             <?php } ?>


                         <?php }} ?> 
                      </div>

                      <div class="form-group">
                        <label for="pwd">First Name:</label>
                        <input type="text" class="form-control" id="firstname"  name="firstname" value="<?php echo ucfirst($cust->firstname); ?>" >
                      </div>

                      <div class="form-group">
                        <label for="pwd">Last Name:</label>
                        <input type="text" class="form-control" id="lastname"  name="lastname" value="<?php echo ucfirst($cust->lastname); ?>" >
                          </div>

                      <div class="form-group">
                        <label for="pwd">Address:</label>
                        <input type="text" class="form-control" id="address"  name="address" value="<?php echo ucfirst($cust->address); ?>" >
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


                       <?php /* $certificateIDs = $cust->certificate_ids;
                
                $arr = explode(",", $certificateIDs);
                //print_r($arr); die;
                $query = $this->db->select('*')->where_in('id',$arr)->get('certificates');
                //echo $this->db->last_query(); die;
                $certificateList = $query->result_array();
                
                foreach ($certificateList as $certificateData) {
                
                 ?>
                   <div class="form-group">
                        <label for="pwd">Certificats Images:</label>
                        


                   </div>
          <?php  }  */?>




               
                   
                  <div class="form-group">
                    <label>Services</label>
                    <div style="clear: both;"></div>
                    <?php if(isset($getService)){

                          $serviceIDs = $cust->service_ids;
                          $arr = explode(",", $serviceIDs);

                      foreach ($getService as $service) { ?>

                    
                      <div class="col-md-3">
                      <label> <input type="checkbox" name="service_ids[]" value="<?php echo $service->id; ?>" <?php  foreach ($arr as $value) {

                                if(in_array($service->id, $arr)){ echo "checked='checked'";} } ?> > <?php echo ucfirst($service->service_name); ?></label> 

                      </div>
                      

                     <?php }} ?>
                        
                  </div>
                      
                
                <?php }} ?>
                <!-- /tile body -->

                <div style="clear: both;"></div>
                <br>
                    <div class="form-group">
                        <label for="pwd">Status:</label>
                        <select class="form-control" name="status">
                          <?php if($cust->status == '2'){ ?>
                          <option value="0" <?php if($cust->status == '0'){echo 'selected';} ?> >Account disable</option>
                          <option value="1" <?php if($cust->status == '1'){echo 'selected';} ?>>Active</option>
                          <option value="2" <?php if($cust->status == '2'){echo 'selected';} ?>>Pending for approval</option>

                          <?php }else{ ?>

                          <option value="0" <?php if($cust->status == '0'){echo 'selected';} ?> >Account disable</option>
                          <option value="1" <?php if($cust->status == '1'){echo 'selected';} ?>>Active</option>

                       <?php   } ?>
                        </select>
                    </div>

                  <input type="submit" name="update" class="btn btn-default" value="Update"> 
                    </form>

                </div>
            </section>
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>