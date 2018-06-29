<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Customer Appointments List <span>Customer Appointments List ELJEBO</span></h2>

        <!-- <div class="page-bar">

            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html"><i class="fa fa-home"></i> Minovate</a>
                </li>
                <li>
                    <a href="#">Tables</a>
                </li>
                <li>
                    <a href="tables-datatables.html">Datatables</a>
                </li>
            </ul>

        </div> -->

    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Customer Appointments List</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                    <ul class="controls">
                        <li>
                            
                        </li>


                    </ul>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-custom" id="example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Stylish name</th>
                                <th>Customer Name</th>
                                <th>Appointment Date</th>
                                <th>Status</th> 
                                <th>Payment Status</th> 
                                <th>Total Price</th> 
                                <th style="width: 160px;" class="no-sort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                           if(isset($final_data)){
                                $i=1;
                           }
                            foreach($final_data as $data): ?>
                            <tr class="odd gradeX">
                                <td><a href="<?php echo site_url();?>admin/getAppointmentList/<?php echo $data->id ; ?>"><?php echo $data->id; ?></a></td>
                                <td>
                                   
                                    <?php echo ucfirst($data->stylerFname); ?> <?php echo ucfirst($data->stylerLname); ?>  
                                
                               </td>
                                <td>

                                    <?php echo ucfirst($data->customerFname); ?> <?php echo ucfirst($data->customerLname); ?>  
                                 
                                 </td>
                              <td>
                                    <?php

                                      $date1 = $data->appointment_date;
                                 echo $newDate = date("Y-m-d", strtotime($date1));

                                      ?> 
                                </td>  

                                <td>
                                    <?php

                                     $app_status = $data->status;
                                if($app_status == '1'){ ?>

                                               Pending

                                <?php }elseif ($app_status == '2') { ?>

                                               Accept
                                       
                                <?php  }elseif ($app_status == '3') { ?>
                                   
                                                Reject

                                <?php }elseif ($app_status == '4') { ?>

                                                Cancel

                                <?php }elseif ($app_status == '5') { ?>
                                  
                                                Half payment

                                <?php }elseif ($app_status == '6') { ?>

                                                Full payment
                                  
                                <?php  }elseif ($app_status == '7') { ?>

                                                Arrived at venue

                                <?php }elseif ($app_status == '8') { ?>

                                                Job start now

                                 <?php }elseif ($app_status == '9') { ?>

                                                Job completed
                                     
                                 <?php }elseif ($app_status == '10') { ?>

                                                    Feedback
                                    
                                 <?php }elseif ($app_status == '11') { ?>

                                                Feedback submitted
                                    
                                 <?php } ?>

                                </td>
                                <td> <?php

                                     $app_status = $data->status;
                                if($app_status == '5'){ ?>

                                               Half payment

                                <?php }elseif ($app_status == '6') { ?>

                                               Full payment
                                       
                                <?php  } ?></td>

                                <td>
                                    <?php echo $serviceIDs = $data->service_charge; ?>
                                </td>
                               
                                <td class="actions"><a class="edit text-primary text-uppercase text-strong text-sm mr-10" href="<?php echo site_url();?>admin/getAppointmentList/<?php echo $data->id ; ?>" >View</a>

                                <a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10 delete_row" data-id="<?php echo $data->id; ?>" data-method="delete_userApp">Remove</a>
                            </td>
                            </tr>
                            <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /tile body -->
            </section>
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>