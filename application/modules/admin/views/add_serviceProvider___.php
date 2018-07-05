<div class="page page-tables-datatables">

    <div class="pageheader">
  <h2>Add Service Provider <span>Services Provider </span></h2>
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
                  <form action="<?php echo site_url();?>admin/add_servicePro" id="edit_servicePro" method='POST' enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="pwd">First Name:<span style="color: red;">*</span></label>
                            <input  type="text" class="form-control" id="firstname"  name="firstname">
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="pwd">Last Name:<span style="color: red;">*</span></label>
                            <input   type="text" class="form-control" id="lastname"  name="lastname">
                          </div>    
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="pwd">user Name:<span style="color: red;">*</span></label>
                            <input   type="text" class="form-control" id="username"  name="username">
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="pwd">Email:<span style="color: red;">*</span></label>
                            <input  type="text" class="form-control" id="email"  name="email">
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="pwd">Password:<span style="color: red;">*</span></label>
                            <input  type="password" class="form-control" id="password"  name="password">
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="pwd">Gender:<span style="color: red;">*</span></label>
                          <select   class="form-control" id="gender"  name="gender">
                            <option value="">Select Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="0">Other</option>
                          </select>
                        </div>
                        <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
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
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="pwd">State:<span style="color: red;">*</span></label>
                            <select   class="form-control" id="state"  name="state">
                              <option value="">Select State</option> 
                            </select>
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="pwd">City:<span style="color: red;">*</span></label>
                          <select   class="form-control" id="city"  name="city">
                            <option value="">Select City</option>
                          </select>
                        </div>
                        <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->

                      <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="pwd">Address:<span style="color: red;">*</span></label>
                          <input  type="text" class="form-control" id="address"  name="address">
                        </div>
                        <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="pwd">Address 2 (optional):<span style="color: red;">*</span></label>
                          <input type="text" class="form-control" id="address2"  name="address2">
                        </div>
                        <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="pwd">Zip Code:<span style="color: red;">*</span></label>
                          <input  type="text" class="form-control" id="zip_code"  name="zip_code">
                        </div>  
                        <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="pwd">Phone number:<span style="color: red;">*</span></label>
                          <input  type="text" class="form-control" id="phone"  name="phone">
                        </div>
                        <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="pwd">Security Question 1  :<span style="color: red;">*</span></label>
                            <input  type="text" class="form-control" id="question1"  name="question1">
                        </div>
                        <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="pwd">Answer 1 :<span style="color: red;">*</span></label>
                            <input  type="text" class="form-control" id="answer1"  name="answer1">
                        </div>
                        <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                              <label for="pwd">Security Question 2 :<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" id="question2"  name="question2">
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                              <label for="pwd">Answer 2 :</label>
                              <input type="text" class="form-control" id="answer2"  name="answer2">
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="pwd">Security Question 3 :<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="question3"  name="question3">
                          </div>      
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                              <label for="pwd">Answer 3 :<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" id="answer3"  name="answer3">
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group radio-item-container">
                              <label>Education<span style="color: red;">*</span></label>
                              <div class="clearfix"></div>
                              <div class="radio-item">
                                <div class="radio-block">
                                    <label><input type="checkbox" class="some check" name="education[]" value="1"></label> GED
                                </div>
                              </div>
                              <!-- /END OF RADIO-ITEM/ -->
                              <div class="radio-item">
                                <label><input  type="checkbox" class="some check" name="education[]" value="2"></label> High School
                              </div>
                              <!-- /END OF RADIO-ITEM/ -->
                              <div class="radio-item">
                                <label><input type="checkbox" class="some check" name="education[]" value="3"></label> College & Above
                              </div>
                              <!-- /END OF RADIO-ITEM/ -->
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                        <div class="ul--cointainer--flex">
                          <div class="ul--flex-item">
                            <div class="padding-box">
                              <label>Label for Checkboxes<span style="color: red;">*</span></label>
                              <div class="checkboxes-lists">
                                <li>
                                  <label><input type="checkbox" class="some check" name="education[]" value="1"></label> Mechanic 
                                </li>
                                <li class="input-to-be-showed">
                                  <input type="text" name="" class="form-control-item" placeholder="Enter Price">
                                </li>
                                <li>
                                  <label><input type="checkbox" class="some check" name="education[]" value="1"></label> Technician 
                                </li>
                                <li>
                                  <label><input type="checkbox" class="some check" name="education[]" value="1"></label> Label
                                </li>
                              </div>
                            </div>
                            <!-- /END OF PADDING-BOX/ -->
                          </div>
                          <!-- /END OF UL/ -->
                          <div class="ul--flex-item">
                            <div class="padding-box">
                              <label>Label for Checkboxes<span style="color: red;">*</span></label>
                              <div class="checkboxes-lists">
                                <li>
                                  <label><input type="checkbox" class="some check" name="education[]" value="1"></label> Wedding 
                                </li>
                                <li>
                                  <label><input type="checkbox" class="some check" name="education[]" value="1"></label>  Birthday
                                </li>
                              </div>
                            </div>
                            <!-- /END OF PADDING-BOX/ -->
                          </div>
                          <!-- /END OF UL/ -->
                          <div class="ul--flex-item">
                            <div class="padding-box">
                              <label>Label for Checkboxes<span style="color: red;">*</span></label>
                              <div class="checkboxes-lists">
                                <li>
                                  <label><input type="checkbox" class="some check" name="education[]" value="1"></label> Building Architects 
                                </li>
                              </div>
                            </div>
                            <!-- /END OF PADDING-BOX/ -->
                          </div>
                          <!-- /END OF UL/ -->
                        </div>
                        <!-- /END OF UL--CONTAINER/ -->
                      </div>
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group">
                              <label for="pwd">Description :<span style="color: red;">*</span></label>
                              <textarea   type="text" class="form-control" id="description"  name="description" rows="2" style="resize: vertical;width: 100%"></textarea>
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group">
                              <label for="pwd">Time:<span style="color: red;">*</span></label>
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                              <label for="pwd">From:</label>
                              <div class="input-group clockpicker">
                                  <input  type="time" name="from" id="from" class="form-control" >
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-time"></span>
                                  </span>
                              </div>
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="pwd"> To: </label>
                          <div class="input-group clockpicker">
                            <input  type="time" name="to" id="to" class="form-control" >
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                          </span>
                          </div>
                        </div>
                        <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                              <label for="pwd">Upload Certifications:</label>
                              <input type="file" class="form-control" id="certification" name="certification">
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->

                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                              <label for="pwd">Status:<span style="color: red;">*</span></label>
                              <select class="form-control" name="status">
                                <option value="0">Account Disable</option>
                                <option value="1">Active</option>
                                <option value="2">Pending for Approval</option>
                              </select>
                          </div>
                          <!-- /END OF FORM-GROUP/ -->
                      </div>
                      <!-- /END OF COL/ -->
                  </form>


                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                   <form action="<?php echo site_url();?>admin/add_servicePro" id="edit_servicePro" method='POST' enctype="multipart/form-data">               

                   
                    
          <div class="form-group">
                      <label>Services<span style="color: red;">*</span></label>
          </div>         

          <div class="col-md-12">
            <?php if(isset($service_category)){ 
                      foreach ($service_category as $name){?>
                    <div class="form-group col-md-6" style="margin-bottom: 15px; height: auto;">
                      <?php $whrservice['category_id'] =  $name->id;
                            $subcategoryname =   $this->Admin_model->fetchrowedit('services',$whrservice); ?>
                        
                           
                        <label for="pwd"><?php echo $name->category_name;?> :<span style="color: red;">*</span></label>
                      
                <?php    
                           
                  foreach ($subcategoryname as $subcategorynameid ) { ?>


                      <div class="col-md-12" >

                              <div class="col-md-9">
                                <label> <input  type="checkbox" class="some check<?php echo $subcategorynameid->id; ?>" onclick="someFunction(<?php echo $subcategorynameid->id; ?>)" name="service_ids[]" value="<?php echo $subcategorynameid->id; ?>"></label>
                                
                                <?php echo $subcategorynameid->service_name; ?> 
                                
                              </div>
                         
                           
                        <div class="col-md-1">
                                <label > <input placeholder="Enter Price" type="text" style="display: none; width: 100px;margin-left: -100px; margin-left: -100px;"    class="validate textbox<?php echo $subcategorynameid->id; ?>" name="service_amount[<?php echo $subcategorynameid->id; ?>]" value=""></label>
                                 
                            </div>

                            <div class="col-md-2"></div>

                            

                         </div> 

                         <?php } ?>
                  </div>


                  <?php }} ?>
                  </div>

                  <div class="form-group">
                        <label for="pwd">Description :<span style="color: red;">*</span></label>
                        <textarea   type="text" class="form-control" id="description"  name="description" rows="2"></textarea>
                  </div>





                  <div class="form-group">
                        <label for="pwd">Time:<span style="color: red;">*</span></label>
                  </div>

                  <div class="col-md-12">
                          <div class="col-md-3">
                            <label for="pwd">From:</label>

                            <div class="input-group clockpicker">
                                <input  type="time" name="from" id="from" class="form-control" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                          </div>
                          <div class="col-md-3"></div>
                            <div class="col-md-3">
                            <label for="pwd"> To: </label>

                            <div class="input-group clockpicker">
                                <input  type="time" name="to" id="to" class="form-control" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                  

                    <div style="clear: both;"></div>
                  <br>

                    <div class="form-group">
                        <label for="pwd">Upload Certifications:</label>
                        <input   type="file" class="form-control" id="certification"  name="certification">
                  </div>


                  <div style="clear: both;"></div>
                  <br>
                      <div class="form-group">
                        <label for="pwd">Status:<span style="color: red;">*</span></label>
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