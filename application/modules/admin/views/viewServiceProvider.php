<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>View Service Provider <span></span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>View Services Provider   </strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                   <form action="<?php echo site_url();?>admin/add_servicePro" method='POST'>

                    <?php  
                  if(isset($fetch_customer)){
                        foreach ($fetch_customer as $customer_data) {?>

                     
                      <div class="form-group">
                        <label for="pwd">First Name:</label>
                        <input type="text" readonly value="<?php echo $customer_data->firstname; ?>" class="form-control" id="firstname"  name="firstname">
                      </div>


                      <div class="form-group">
                        <label for="pwd">Last Name:</label>
                        <input type="text" value="<?php echo $customer_data->lastname; ?>" readonly  class="form-control" id="lastname"  name="lastname">
                      </div>


                      <div class="form-group">
                        <label for="pwd">user Name:</label>
                        <input type="text" value="<?php echo $customer_data->username; ?>" readonly class="form-control" id="username"  name="username">
                      </div>


                       <div class="form-group">
                        <label for="pwd">Email:</label>
                        <input type="text" value="<?php echo $customer_data->email; ?>" readonly class="form-control" id="email"  name="email">
                      </div>


                      

                      <div class="form-group">
                        <label for="pwd">Gender:</label>
                        <select disabled  class="form-control" id="gender"  name="gender">
                          
                          <option value="1">
                            <?php if($customer_data->gender = 1 ){ ?>
                                Male
                            <?php } elseif($customer_data->gender = 0){?>
                                Other
                            <?php } elseif($customer_data->gender = 2){?>
                                Female
                            <?php } ?>
  </option>
                          
                        </select>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="pwd">Country :</label>
                              <select disabled class="form-control" id="country"  name="country">
                               
                                <?php if(isset($countries)){
                                    foreach ($countries as  $countrie) { ?>
                                <option value="<?php echo $countrie->id; ?>" <?php if($countrie->id == $customer_data->country_id){echo "selected";} ?>><?php echo $countrie->name; ?></option>
                                <?php }} ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="pwd">State:</label>
                              <select  disabled class="form-control" id="state"  name="state">
                                <?php if(isset($states)){
                                    foreach ($states as  $state) { ?>
                                <option value="<?php echo $state->id; ?>" <?php if($state->id == $customer_data->state_id){echo "selected";} ?>><?php echo $state->name; ?></option>
                                <?php }} ?>
                                
                               
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="pwd">City:</label>
                              <select disabled  class="form-control" id="city"  name="city">
                                <?php if(isset($cities)){
                                    foreach ($cities as  $city) { ?>
                                <option value="<?php echo $city->id; ?>" <?php if($city->id == $customer_data->city_id){echo "selected";} ?>><?php echo $city->name; ?></option>
                                <?php }} ?>
                               
                                
                              </select>
                            </div>

                          </div>
                        </div>

                      <div class="form-group">
                        <label for="pwd">Address:</label>
                        <input type="text"  value="<?php echo $customer_data->address; ?>" readonly class="form-control" id="address"  name="address">
                      </div>

                       <div class="form-group">
                        <label for="pwd">Address 2 (optional):</label>
                        <input type="text" value="<?php echo $customer_data->address2; ?>" readonly class="form-control" id="address2"  name="address2">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Zip Code:</label>
                        <input type="text" value="<?php echo $customer_data->zip_code; ?>" readonly class="form-control" id="zip_code"  name="zip_code">
                      </div>
                    <div class="form-group">
                        <label for="pwd">Phone number:</label>
                        <input type="text" value="<?php echo $customer_data->mobile; ?>" readonly class="form-control" id="phone"  name="phone">
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
                        <label for="pwd">Security Question <?php echo $icount; ?>  :<span style="color: red;">*</span></label>
                        <input type="text" value="<?php echo $value['question']; ?>"  class="form-control" readonly id="question1"  name="question<?php echo $icount; ?>">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Answer <?php echo $icount; ?> :<span style="color: red;">*</span></label>
                        <input type="text" readonly value="<?php echo $value['answer']; ?>"  class="form-control" id="answer<?php echo $answer;  ?>"  name="answer<?php echo $icount; ?>">
                    </div>
                  <?php $icount++;   } ?>



                    <div class="form-group">
                      <label>Education</label>
                        <div style="clear: both;"></div>

                        <?php if($customer_data->education = 1){?>

                      <div class="col-md-12">
                        <div class="col-md-4">
                              <label> <!-- <input type="checkbox" class="some check  name="education[]" value="GED"> --></label>
                              GED
                        </div>
                          <div class="col-md-3"></div>
                          <div class="col-md-5"></div>
                    </div>
                  <?php } elseif ($customer_data->education = 2) {?>
                        
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label> <input type="checkbox" class="some check  name="education[]" value="High School"></label>
                            High School
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                      </div>
                    <?php } elseif ($customer_data->education = 3) {?>

                      <div class="col-md-12">

                        <div class="col-md-4">
                            <label> <input type="checkbox" class="some check  name="education[]" value="College & Above"></label>
                            College & Above
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                       </div>
                   </div>
                 <?php } ?>

                       <div style="clear: both;"></div>
                  <br>
                    
                    <div class="form-group">
                        <label>Services charge Amount :</label>
                        <div style="clear: both;"></div>
                          <?php if(isset($getService)){
                            foreach ($getService as $service) { ?>

                            <div class="col-md-12">
                              <div class="col-md-4">
                                <label> <!-- <input type="checkbox" class="some check<?php //echo $service->id; ?>" onclick="someFunction(<?php //echo $service->id; ?>)" name="service_ids[]" value="<?php //echo $service->id; ?>"> --></label>
                                <?php echo $service->service_name; ?> 
                            </div>
                            <div class="col-md-3">
                                <label > <input placeholder="Enter Price" type="text" readonly   class="validate textbox<?php echo $service->id; ?>" name="service_ids[]" value="<?php echo $service->charge; ?>"></label>
                                 
                            </div>

                            <div class="col-md-5"></div>

                            

                         </div> 
                         <?php }} ?>
                        
                  </div>


                      <div style="clear: both;"></div>
                  <br>
                  

                  <div class="form-group">
                        <label for="pwd">Description :</label>
                        <textarea type="text" class="form-control" id="description" readonly   name="description" rows="5"><?php echo $customer_data->description;?></textarea>
                  </div>





                  <div class="form-group">
                        <label for="pwd">Time:</label>
                  </div>

                  <div class="col-md-12">
                          <div class="col-md-3">
                            <label for="pwd">From:</label>

                            <div class="input-group clockpicker">
                                <input type="time" name="form" id="from" class="form-control" readonly value="<?php echo $customer_data->start_time;?>" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                          </div>
                          <div class="col-md-3"></div>
                            <div class="col-md-3">
                            <label for="pwd"> To: </label>

                            <div class="input-group clockpicker">
                                <input type="time" name="to" id="to" class="form-control" readonly  value="<?php echo $customer_data->end_time;?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                  

                    <div style="clear: both;"></div>
                  <br>

                  <?php 

                    $whr['id'] = $customer_data->certificate_ids;
                    $images_data = $this->Admin_model->fetchrowedit('users_images',$whr); 
                    $image = $images_data[0]->image

                 ?>

                    <div class="form-group">
                        <label for="pwd"> Certifications:</label>
                        <a href="<?php echo base_url();?>uploads/service_provider/<?php echo $image;?>"   target="_blank" >Link of documents</a>
                  </div>


                  <div style="clear: both;"></div>
                  <br>
                      <div class="form-group">
                        <label for="pwd">Status:</label>
                        <select class="form-control" name="status" disabled>


                          <option>
                            
                            <?php if($customer_data->status = 1 ){ ?>
                                    Active
                            <?php } elseif($customer_data->status = 0){?>

                               Account Disable
                            <?php } elseif($customer_data->status = 2){?>
                                Pending for Approval
                              <?php } ?>


                          </option>
                          <!-- <option value="0">Account Disable</option>
                          <option value="1">Active</option>
                          <option value="2">Pending for Approval</option> -->
                        </select>
                    </div>
                  <?php }} ?>


                    <!--  <input type="submit" name="add_provider" class="btn btn-default" value="Submit"> -->
                 
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