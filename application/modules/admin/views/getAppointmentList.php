  <div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>View Customers Appointments<span>Customers Appointments ELJEBO</span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">


                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>View Customers Appointments</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->
                <!-- tile body -->
               
                <div class="tile-body">
                   <div class="container-fluid">
                    <?php 
                    if(isset($final_data)){ ?>
                    <div class="col-md-12">
                      <div class="pull-left">
                        <p>Order: <b>#<?php echo $this->uri->segment('3'); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;Status: <span class="yellow">
                          <?php

                                     $app_status = $final_data['status'];
                                if($app_status == '1'){ ?><b>Pending</b>

                                <?php }elseif ($app_status == '2') { ?><b>Accept</b>
                                       
                                <?php  }elseif ($app_status == '3') { ?><b>Reject</b>

                                <?php }elseif ($app_status == '4') { ?><b>Cancel</b>

                                <?php }elseif ($app_status == '5') { ?><b>Half payment</b>

                                <?php }elseif ($app_status == '6') { ?><b>Full payment</b>
                                  
                                <?php  }elseif ($app_status == '7') { ?><b>Arrived at venue</b>

                                <?php }elseif ($app_status == '8') { ?><b>Job start now</b>

                                 <?php }elseif ($app_status == '9') { ?><b>Job completed</b>
                                     
                                 <?php }elseif ($app_status == '10') { ?><b>Feedback</b>
                                    
                                 <?php }elseif ($app_status == '11') { ?><b>Feedback submitted</b>
                                    
                                 <?php } ?>
                        </span></b> </p>
                        <h3>Appointment Details </h3>
                        <p>Appoinment Date: <b><?php
                                    
                                      $date1 = $final_data['appointment_date'];
                                 echo $newDate = date("Y-m-d", strtotime($date1));

                                      ?></b>&nbsp;&nbsp;Appoinment Time: <b><?php echo date("h:i:s A", strtotime($date1)); ?></b></p>
                        <h3>Stylist Details  </h3>
                        <p>Stylist Name: <b><?php echo ucfirst($final_data['stylist_name']); ?> <?php echo ucfirst($final_data['lname']); ?></b></p>
                     
                        <p>Email: <b><?php echo $final_data['email']; ?></b></p>
                        <p>Phone No.: <b><?php echo $final_data['mobile']; ?></b></p>
                      </div>
                      <div class="col-md-6" style="margin-top: 95px;">
                        <h3>Customer Details </h3>                                                                                                                                                      
                        <p>Customer Name: <b><?php echo ucfirst($final_data['customerfname']); ?> <?php echo ucfirst($final_data['customerlname']); ?></b></p>
                        <p>Travel Fee: <b>£<span id="travler_id"><?php echo $final_data['travel_fee']; ?></span></b></p>
                        <p>Parking Fee: <b>£<span id="parking_id"><?php echo $final_data['parking_fee']; ?></b></p>
                        <p>Email: <b><?php echo $final_data['customeremail']; ?></b></p>
                        <p>Phone No.: <b><?php echo $final_data['customermobile']; ?></b></p>
                        <p>Location: <b><?php echo ucfirst($final_data['location']); ?></b></p>
                      </div>
                    </div>
                     

                    <div class="col-md-12">
                      <h3>Order Details </h3>
                      <table class="table table-striped table-bordered" width="100%"> 
                          <thead>
                            <tr>
                              <th>Category Name</th>
                              <th>Service Name</th>
                              <th>Service Charge</th>
                            </tr>
                          </thead>

                           <tbody>

                          <?php if(!empty($serviceData)) { 

                             $countservice =  count($serviceData);

                                   for ($i = 0; $i < $countservice; $i++) {  ?>
                                        <tr>
                                          <?php  if($i == 0) { ?>

                                            <td><?php echo ucfirst($final_data['cat_name']); ?></td>

                                            <?php }else{ ?>

                                            <td></td>

                                            <?php } ?>
                                            <td><?php echo ucfirst($serviceData[$i]['service_name']); ?></td>
                                            <td>£<span class="serviceCharges"><?php echo ucfirst($serviceData[$i]['service_charge']); ?></span>.00</td>
                                        
                                      </tr>

                                      <?php } ?>

                                      <tr>
                                          <td colspan="1"</td>
                                          <td>Total</td>
                                          <td>£<span id="total"></span>.00</td>
                                      </tr>
                                                    
                                  

                                  <?php } ?>

                                    </tbody>
                          </table>
                    </div>
                    <?php } ?>
                   </div>
                </div>
               
                <!-- /tile body -->
            </section>
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>  
<script>




    var x = document.getElementById("travler_id").innerHTML;
    var y = document.getElementById("parking_id").innerHTML;
   // var z = document.getElementById("serviceCharges").innerHTML;

    var elements = document.getElementsByClassName("serviceCharges");

    var names = 0;
    for(var i=0; i<elements.length; i++) {
         // names += elements[i].innerHTML;

          names +=  +elements[i].innerHTML;
       
    }
    var totalservice = names;
    
 

    var a = parseFloat(x) + parseFloat(y) + parseFloat(totalservice);
    


  
    //alert(tab_id);
   //console.log(d);
    document.getElementById("total").innerHTML = a;
    document.getElementById("subtotal").innerHTML = a;

</script>

