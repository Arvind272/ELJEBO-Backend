<div class="page page-tables-datatables">
    <div class="pageheader">
        <h2>Appointment Detail <span>Appointment Detail GlamArmy</span></h2>
    </div>
    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-10 col-md-offset-1">
            <!-- tile -->
            <section class="tile">
                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Appointment</strong> Detail</h1>
                </div>
                <!-- /tile header -->
                <!-- tile body -->
                <div class="tile-body">
                    <?php if(!empty($data)){ ?>
                    <form class="form-horizontal" role="form" name="appointmentDetailForm" >
                        <input type="hidden" name="appoinment_id" id="appoinment_id"  value="<?php if(isset($data->appoinment_id))
                            { echo $data->appoinment_id; } ?>">
                        <div class="form-group">
                            <label for="input01" class="col-sm-4 control-label text-left">
                                <img src="<?php if(isset($data->profile_pic)){ echo $data->profile_pic;} ?>" style="width: 50px; height: 50px; border-radius: 50%; border: 2px solid #ccc;">
                            </label>
                            <div class="col-sm-8">
                                <h3 class="text-drank" id="userName">
                                <?php 
                                  if(isset($data->firstname)){ echo ucfirst($data->firstname).' '; }
                                  if(isset($data->lastname)){ echo ucfirst($data->lastname); }
                                 ?>             
                                </h3>
                            </div>
                        </div>                   
                        <div class="form-group">
                            <label for="input03" class="col-sm-4 control-label text-left"><i class="glyphicon glyphicon-calendar"></i> Date</label>
                            <div class="col-sm-8">
                                <p>
                                    <?php
                                     if(isset($data->appointment_date)){
                                        $date = $data->appointment_date;
                                        echo  date("D, j F Y",strtotime($date));
                                       } 
                                    ?>
                                </p>
                            </div>
                        </div>
                       <!--   <hr class="line-dashed line-full" /> -->
                        <div class="form-group">
                            <label for="input03" class="col-sm-4 control-label text-left"><i class="glyphicon glyphicon-time"></i> Time</label>
                            <div class="col-sm-8">
                                <p>
                                <?php
                                 if(isset($data->appointment_date)){
                                        $date = $data->appointment_date;
                                        echo  date("h:i A",strtotime($date));
                                   } ?>
                                 </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input04" class="col-sm-4 control-label text-left"><i class="fa fa-map-marker"></i> Address</label>
                            <div class="col-sm-8">
                                 <?php
                                 if(isset($data->address)){ echo ucfirst($data->address);} ?> 
                                 </p>
                            </div>
                        </div>
                        <h4 class="custom-font filled bg-lightred">Services</h4>
                        <div class="form-group">
                            <?php if(isset($data->services)){
                                 foreach ($data->services as $service) {  
                            ?>
                            <div class="col-sm-6">
                                <p><?php echo ucfirst($service->service_name); ?></p>
                            </div>
                            <div class="col-sm-6">
                            
                                <p class="text-drank">￡<?php echo $service->service_charge; ?></p>
                            </div>
                            <?php } } ?>
                        </div>
                        <h4 class="custom-font filled bg-lightred">Additional Chages</h4>
                        <div class="form-group">
                        <div class="col-sm-4 control-label">
                                <label class="checkbox checkbox-custom-alt checkbox-custom-sm text-left">
                                    <input type="checkbox" id="parking"><i></i> 
                                    Parking Fee
                                </label>
                                <br>
                                <label class="checkbox checkbox-custom-alt checkbox-custom-sm text-left">
                                    <input type="checkbox" id="travel"><i></i>
                                    Travel Fee
                                </label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="parking_fee" id="parking_fee" class="form-control parking_val fee" placeholder="&#xffe1; 0.00" value="￡<?php if(isset($data->parking_fee)){ echo ucfirst($data->parking_fee); } ?>" readonly="readonly">
                                <br>
                                <input type="text" name="travel_fee" id="travel_fee" class="form-control travel_val fee" placeholder="&#xffe1; 0.00" value="￡<?php if(isset($data->travel_fee)){ echo ucfirst($data->travel_fee); } ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 text-left text-drank">Total</div>
                            <div class="col-sm-8">
                                <input type="hidden" value="<?php echo $data->total_cost; ?>" class="service">
                                <p id="total" class="text-drank">￡<?php echo $data->total_cost; ?></p>
                            </div>
                        </div>
                 <hr class="line-dashed line-full"/>
                        <div class="form-group">
                            <?php if($data->status != 2){ ?>
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="button" onclick="validateAppointmentDetail(2);" class="btn btn-success mb-10">SEND OFFER </button>
                                <button type="button"  onclick="validateAppointmentDetail(3);" class="btn btn-orange mb-10">REJECT</button>
                            </div>
                            <?php } ?>
                        </div>
                    </form>
                    <?php }else{ ?>
                        <span>Data not found</span>
                    <?php } ?>
                </div>
                <!-- /tile body -->
            </section>
            <!-- /tile -->
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>
</section>
<!--/ CONTENT -->
</div>
<!-- /col -->
</div>
<!-- /row -->
</div>