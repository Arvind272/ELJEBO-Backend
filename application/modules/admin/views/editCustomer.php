<div class="page page-tables-datatables">

    <div class="pageheader">
        <h2>Edit  Customer <span></span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Edit Customer   </strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                    <form action="<?php echo site_url();?>admin/edit_CustomerPro" enctype="multipart/form-data" id = "edit_CustomerPro" method='POST'>

                    <?php  
                  if(isset($fetch_customer)){
                        foreach ($fetch_customer as $customer_data) {?>

                     
                      <div class="form-group">
                        <label for="pwd">First Name:<span style="color: red;">*</span></label>
                        <input type="text"  value="<?php echo $customer_data->firstname; ?>" class="form-control" id="firstname"  name="firstname">
                        <input type="hidden" name="user_id" value="<?php echo $customer_data->id; ?>">
                      </div>


                      <div class="form-group">
                        <label for="pwd">Last Name:<span style="color: red;">*</span></label>
                        <input type="text" value="<?php echo $customer_data->lastname; ?>"   class="form-control" id="lastname"  name="lastname">
                      </div>


                      <div class="form-group">
                        <label for="pwd">user Name:<span style="color: red;">*</span></label>
                        <input type="text" value="<?php echo $customer_data->username; ?>"  class="form-control" id="username"  name="username">
                      </div>


                       <div class="form-group">
                        <label for="pwd">Email:<span style="color: red;">*</span></label>
                        <input type="text" value="<?php echo $customer_data->email; ?>"  class="form-control" readonly id="email"  name="email">
                      </div>


                      

                      <div class="form-group">
                        <label for="pwd">Gender:<span style="color: red;">*</span></label>
                        <select   class="form-control" id="gender"  name="gender">
                          
                            <?php if($customer_data->gender = 1 ){ ?>
                              <option value="1" selected>  Male </option>
                              <option value="2">  Female </option>
                              <option value="0">  Other </option>

                            <?php } elseif($customer_data->gender = 0){?>
                               <option value="1" >  Male </option>
                              <option value="2">  Female </option>
                              <option value="0" selected>  Other </option>
                            <?php } elseif($customer_data->gender = 2){?>
                                <option value="1" >  Male </option>
                              <option selected value="2">  Female </option>
                              <option value="0" >  Other </option>
                            <?php } ?>
                          
                        </select>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="pwd">Country :<span style="color: red;">*</span></label>
                              <select  class="form-control" id="country"  name="country">
                               
                                <?php if(isset($countries)){
                                    foreach ($countries as  $countrie) { ?>
                                <option value="<?php echo $countrie->id; ?>" <?php if($countrie->id == $customer_data->country_id){echo "selected";} ?>><?php echo $countrie->name; ?></option>
                                <?php }} ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="pwd">State:<span style="color: red;">*</span></label>
                              <select   class="form-control" id="state"  name="state">
                                <?php if(isset($states)){
                                    foreach ($states as  $state) { ?>
                                <option value="<?php echo $state->id; ?>" <?php if($state->id == $customer_data->state_id){echo "selected";} ?>><?php echo $state->name; ?></option>
                                <?php }} ?>
                                
                               
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="pwd">City:<span style="color: red;">*</span></label>
                              <select   class="form-control" id="city"  name="city">
                                <?php if(isset($cities)){
                                    foreach ($cities as  $city) { ?>
                                <option value="<?php echo $city->id; ?>" <?php if($city->id == $customer_data->city_id){echo "selected";} ?>><?php echo $city->name; ?></option>
                                <?php }} ?>
                               
                                
                              </select>
                            </div>

                          </div>
                        </div>

                      <div class="form-group">
                        <label for="pwd">Address:<span style="color: red;">*</span></label>
                        <input type="text"  value="<?php echo $customer_data->address; ?>"  class="form-control" id="address"  name="address">
                      </div>

                       <div class="form-group">
                        <label for="pwd">Address 2 (optional):<span style="color: red;">*</span></label>
                        <input type="text" value="<?php echo $customer_data->address2; ?>"  class="form-control" id="address2"  name="address2">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Zip Code:<span style="color: red;">*</span></label>
                        <input type="text" value="<?php echo $customer_data->zip_code; ?>"  class="form-control" id="zip_code"  name="zip_code">
                      </div>
                    <div class="form-group">
                        <label for="pwd">Phone number:<span style="color: red;">*</span></label>
                        <input type="text" value="<?php echo $customer_data->mobile; ?>"  class="form-control" id="phone"  name="phone">
                      </div> 


                      <?php  $test =  $customer_data->security_que_ans ; 
                        $jsonquestion = json_decode($test, true);
                        /*echo "<pre>";
                        print_r($jsonquestion);
                        exit();*/
                        // $keycont = 0;
                        $icount = 1;
                          ?>

                          <?php foreach ($jsonquestion as  $value) {?>
                          

                    <div class="form-group">
                        <label for="pwd">Security Question <?php echo $icount; ?>  :</label>
                        <input type="text" value="<?php echo $value['question']; ?>"  class="form-control" id="question1"  name="question<?php echo $icount; ?>">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Answer <?php echo $icount; ?> :<span style="color: red;">*</span></label>
                        <input type="text" value="<?php echo $value['answer']; ?>"  class="form-control" id="answer<?php echo $answer; ?>"  name="answer<?php echo $icount; ?>">
                    </div>
                  <?php $icount++;   } ?>




                    <!-- <div class="form-group">
                        <label for="pwd">Security Question 2 :</label>
                        <input type="text" value="<?php// echo $customer_data->question2; ?>"   class="form-control" id="question2"  name="question2">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Answer 2 :</label>
                        <input type="text" value="<?php// echo $customer_data->answer2; ?>"   class="form-control" id="answer2"  name="answer2">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Security Question 3 :</label>
                        <input type="text" value="<?php //echo $customer_data->question3;?>"  class="form-control" id="question3"  name="question3">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Answer 3 :</label>
                        <input type="text" value="<?php //echo $customer_data->answer3; ?>"  class="form-control" id="answer3"  name="answer3">
                    </div>

 -->
                    <?php  $education =  $customer_data->education; 
                     $total = (explode(",",$education));
                    ?>



                    <div class="form-group">
                      <label>Education<span style="color: red;">*</span></label>
                        <div style="clear: both;"></div>

                        

                      <div class="col-md-12">
                        <div class="col-md-4">


    <label> <input type="checkbox" class="some check"  name="education[]" value="1" <?php if (in_array("1", $total)) {?> checked <?php }?>>
                              </label>
                              GED
                        </div>
                          <div class="col-md-3"></div>
                          <div class="col-md-5"></div>
                    </div>
                  
                        
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label> <input type="checkbox" class="some check"  name="education[]"  value="2"<?php if (in_array("2", $total)) {?> checked <?php }?>></label>
                            High School
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                      </div>
                   

                      <div class="col-md-12">

                        <div class="col-md-4">
                            <label> <input type="checkbox" class="some check"  name="education[]" <?php if (in_array("3", $total)) {?> checked <?php }?> value="3"></label>
                            College & Above
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                       </div>
                   </div>
                

                       <div style="clear: both;"></div>
                  <br>

                  <?php 
                  $userSrvices = array();
                  $userSrvicesP = array();
                 if(is_array($getServicesCharge) && !empty($getServicesCharge)){
                    foreach($getServicesCharge as $srv){
                        $userSrvices[]=$srv->service_id;
                        $userSrvicesP[]=$srv->charge;
                    }
                 }
                
                 ?> 
                    


                      <div style="clear: both;"></div>
                  <br>
                  

                  <div class="form-group">
                        <label for="pwd">Description :<span style="color: red;">*</span></label>
                        <textarea type="text" class="form-control" id="description"    name="description" rows="5"><?php echo $customer_data->description;?></textarea>
                  </div>





                  

                  <?php 

                    $whr['id'] = $customer_data->certificate_ids;
                    $images_data = $this->Admin_model->fetchrowedit('users_images',$whr); 
                    $image = $images_data[0]->image

                 ?>

                 





                  <div class="form-group">
                        <label for="pwd">Upload Certifications:<span style="color: red;">*</span></label>
                        <input   type="file" class="form-control" id="certification"  name="certification">
                      <input type="hidden" name="image_ids" value="<?php echo $customer_data->certificate_ids ; ?>">
                  </div>

                    <div class="form-group">
                        <label for="pwd"> Certifications:</label>
                        <a href="<?php echo base_url();?>uploads/customer/<?php echo $image;?>"   target="_blank" >Link of documents</a>
                  </div>


                  <div style="clear: both;"></div>
                  <br>
                      <div class="form-group">
                        <label for="pwd">Status:<span style="color: red;">*</span></label>
                        <select class="form-control" name="status" >


                          
                            
                        <?php if($customer_data->status = 1 ){ ?>
                          <option value="0">Account Disable</option>
                          <option value="1" selected>Active</option>
                          <option value="2">Pending for Approval</option>
                            <?php } elseif($customer_data->status = 0){?>

                        <option selected value="0">Account Disable</option>
                          <option value="1" >Active</option>
                          <option value="2">Pending for Approval</option>
                            <?php } elseif($customer_data->status = 2){?>
                          <option  value="0">Account Disable</option>
                          <option value="1" >Active</option>
                          <option selected value="2">Pending for Approval</option>
                              <?php } ?>



                          
                          <!-- <option value="0">Account Disable</option>
                          <option value="1">Active</option>
                          <option value="2">Pending for Approval</option> -->
                        </select>
                    </div>
                  <?php }} ?>


                     <input type="submit" name="edit_provider" class="btn btn-default" value="Submit">
                 
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

    function someFunction(id) {
        
        var  textbox  = '.textbox'+id;
        var checkboxe = '.check'+id;

        if ($(checkboxe).is(":checked")) 
          {
          
            $(textbox).css("display", "block");
          
          } else {
          
            $(textbox).css("display", "none");
            $(textbox).val('');
          
          }
    }
</script>
<script type="text/javascript">
  $('.validate').keypress(function(event) {
  if ((event.which != 46 || event.which === 8 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57 )  ) {
    event.preventDefault();
  }
});
</script>

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
<script type="text/javascript">
$('.clockpicker').clockpicker({
    placement: 'top',
    align: 'left',
    donetext: 'Done'
});
</script>