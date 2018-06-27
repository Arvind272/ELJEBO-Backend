<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Add Service Provider <span>Services Provider GlamArmy</span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Add Services Provider   </strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                   <form action="<?php echo site_url();?>admin/add_servicePro" method='POST'>
                     
                      <div class="form-group">
                        <label for="pwd">First Name:</label>
                        <input type="text" class="form-control" id="firstname" required name="firstname">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Last Name:</label>
                        <input type="text" class="form-control" id="lastname" required name="lastname">
                      </div>

                       <div class="form-group">
                        <label for="pwd">Email:</label>
                        <input type="text" class="form-control" id="email" required name="email">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="password" required name="password">
                      </div>

                       <div class="form-group">
                        <label for="pwd">Address:</label>
                        <input type="text" class="form-control" id="address" required name="address">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Latitude:</label>
                        <input type="number" class="form-control" id="latitude" required name="latitude">
                      </div>  

                      <div class="form-group">
                        <label for="pwd">Longitude:</label>
                        <input type="number" class="form-control" id="longitude" required name="longitude">
                      </div>

                       <div class="form-group">
                        <label for="pwd">Profile Pic:</label>
                        <input type="file" class="form-control" id="profile_pic" required name="profile_pic">
                      </div>

                       <div class="form-group">
                        <label for="pwd">Portfolio Image Ids:</label>
                        <input type="file" class="form-control" id="portfolio_img" required name="portfolio_img">
                      </div> 

                      <div class="form-group">
                        <label for="pwd">Telephone:</label>
                        <input type="text" class="form-control" id="telephone" required name="telephone">
                      </div> 

                      <div class="form-group">
                        <label for="pwd">Mobile:</label>
                        <input type="text" class="form-control" id="mobile" required name="mobile">
                      </div> 

                      <div class="form-group">
                        <label for="pwd">Landline:</label>
                        <input type="text" class="form-control" id="landline" required name="landline">
                      </div>    

                      <div class="form-group">
                    <label>Services</label>
                    <div style="clear: both;"></div>
                    <?php if(isset($getService)){
 
                      foreach ($getService as $service) { ?>

                      <div class="col-md-3">
                          <label> <input type="checkbox" name="service_ids[]" value="<?php echo $service->id; ?>"></label>
                          <?php echo $service->service_name; ?> 
                      </div>
                      

                     <?php }} ?>
                        
                  </div>
                  <div style="clear: both;"></div>
                  <br>
                      <div class="form-group">
                        <label for="pwd">Status:</label>
                        <select class="form-control" name="status">
                          <option value="0">Account Disable</option>
                          <option value="1">Active</option>
                          <option value="2">Pending for Approval</option>
                        </select>
                    </div>

                     <input type="submit" name="add_provider" class="btn btn-default" value="Submit">
                 
                    </form>
                </div>
                <!-- /tile body -->
            </section>
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>