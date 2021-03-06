<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Add Customer <span>Customer GlamArmy</span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Add Customer   </strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
              <form action="<?php echo site_url();?>admin/add_CustomerPro" id ="add_CustomerPro" method='POST' enctype="multipart/form-data">
                     
                      <div class="form-group">
                        <label for="pwd"> First Name: <span style="color: red;">*</span> </label>
                        <input  type="text" class="form-control" id="firstname"  name="firstname">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Last Name:<span style="color: red;">*</span></label>
                        <input   type="text" class="form-control" id="lastname"  name="lastname">
                      </div>

                      <div class="form-group">
                        <label for="pwd">user Name:<span style="color: red;">*</span></label>
                        <input   type="text" class="form-control" id="username"  name="username">
                      </div>

                       <div class="form-group">
                        <label for="pwd">Email:<span style="color: red;">*</span></label>
                        <input  type="text" class="form-control" id="email"  name="email">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Password:<span style="color: red;">*</span></label>
                        <input  type="password" class="form-control" id="password"  name="password">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Gender:<span style="color: red;">*</span></label>
                        <select   class="form-control" id="gender"  name="gender">
                          <option value="">Select Gender</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                          <option value="0">Other</option>
                        </select>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="pwd">Country :<span style="color: red;">*</span></label>
                              <select   class="form-control" id="country"  name="country">
                                <option value="">Select Country</option>
                                <?php if(isset($countries)){
                                    foreach ($countries as  $countrie) { ?>
                                <option value="<?php echo $countrie->id; ?>"><?php echo $countrie->name; ?></option>
                                <?php }} ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="pwd">State:<span style="color: red;">*</span></label>
                              <select   class="form-control" id="state"  name="state">
                                <option value="">Select State</option>
                               
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="pwd">City:<span style="color: red;">*</span></label>
                              <select   class="form-control" id="city"  name="city">
                                <option value="">Select City</option>
                                
                              </select>
                            </div>

                          </div>
                        </div>

                      <div class="form-group">
                        <label for="pwd">Address:<span style="color: red;">*</span></label>
                        <input  type="text" class="form-control" id="address"  name="address">
                      </div>

                       <div class="form-group">
                        <label for="pwd">Address 2 (optional):<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="address2"  name="address2">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Zip Code:<span style="color: red;">*</span></label>
                        <input  type="text" class="form-control" id="zip_code"  name="zip_code">
                      </div>
                    <div class="form-group">
                        <label for="pwd">Phone number:<span style="color: red;">*</span></label>
                        <input  type="text" class="form-control" id="phone"  name="phone">
                      </div> 

                    <div class="form-group">
                        <label for="pwd">Security Question 1  :<span style="color: red;">*</span></label>
                        <input  type="text" class="form-control" id="question1"  name="question1">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Answer 1 :<span style="color: red;">*</span></label>
                        <input  type="text" class="form-control" id="answer1"  name="answer1">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Security Question 2 :<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="question2"  name="question2">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Answer 2 :<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="answer2"  name="answer2">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Security Question 3 :<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="question3"  name="question3">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Answer 3 :<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="answer3"  name="answer3">
                    </div>




                    <div class="form-group">
                      <label>Education<span style="color: red;">*</span></label>
                        <div style="clear: both;"></div>
                      <div class="col-md-12">
                        <div class="col-md-4">
                              <label> <input type="checkbox"  class="some check"   name="education[]" value="1"></label>
                              GED
                        </div>
                          <div class="col-md-3"></div>
                          <div class="col-md-5"></div>
                    </div>
                        
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label> <input  type="checkbox" class="some check"   name="education[]" value="2"></label>
                            High School
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                      </div>

                      <div class="col-md-12">

                        <div class="col-md-4">
                            <label> <input type="checkbox" class="some check"  name="education[]" value="3"></label>
                            College & Above
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                       </div>
                   </div>

                       <div style="clear: both;"></div>
                  <br>
                    
                    
                  

                  <div class="form-group">
                        <label for="pwd">Description :<span style="color: red;">*</span></label>
                        <textarea   type="text" class="form-control" id="description"  name="description" rows="2"></textarea>
                  </div>





                  

                    <div style="clear: both;"></div>
                  <br>

                    <div class="form-group">
                        <label for="pwd">Upload Certifications:<span style="color: red;">*</span></label>
                        <input   type="file" class="form-control" id="certification"  name="certification">
                  </div>


                  <div style="clear: both;"></div>
                  <br>

                    <div class="form-group">
                        <label for="pwd">Status:<span style="color: red;">*</span></label>
                        <select class="form-control" id="status"
                         name="status">
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


<script type="text/javascript">
  $(document).ready(function(){

    $('#country').on('change', function(){

      var countryID = $(this).val();
       var base_url_path = '<?php echo base_url();?>admin/getstate/'+countryID;
       // alert(base_url_path);

      if(countryID){

        $.ajax({
          type:'POST',
          url : base_url_path,
          data: 'country_id ='+countryID,
          success: function(res){
            console.log(res);
              $('#city').empty();
                $('#state').empty().append(res);

            }
        });
      }
  })



    $('#state').on('change', function(){

      var countryID = $(this).val();
       var base_url_path = '<?php echo base_url();?>admin/getcity/'+countryID;
       // alert(base_url_path);

      if(countryID){

        $.ajax({
          type:'POST',
          url : base_url_path,
          data: 'country_id ='+countryID,
          success: function(res){
            console.log(res);
                $('#city').empty().append(res);

            }
        });
      }
  })







});


</script>