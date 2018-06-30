<div class="page page-tables-datatables">
    <div class="pageheader">
        <h2>Customer Appointments List <span>Customer Appointments List ELJEBO</span></h2>
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
                    <ul class="controls"><li></li></ul>
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
                                
                                $i=1;
                                if (!empty($final_data) && is_array($final_data)) {
                                    foreach($final_data as $data) :
                                        if (property_exists($data, 'id')) {
                                            ?>
                                            <tr class="odd1 gradeX1">
                                                <td><?php echo $i; ?></td>
                                                <td><a href="<?php echo site_url();?>admin/getAppointmentList/<?php echo $data->id ; ?>"><?php echo ucfirst($data->stylerFname); ?> <?php echo ucfirst($data->stylerLname); ?></a></td>
                                                <td><?php echo ucfirst($data->customerFname); ?> <?php echo ucfirst($data->customerLname); ?></td>
                                                <td><?php echo $newDate = date("Y-m-d", strtotime($data->appointment_date)); ?></td>
                                                <td>
                                                    <?php
                                                    $app_status = $data->status;
                                                    if($app_status == '1'){ 
                                                        echo 'Pending';
                                                    }elseif ($app_status == '2') {
                                                        echo 'Accept';
                                                    }elseif ($app_status == '3') {
                                                        echo 'Reject';
                                                    }elseif ($app_status == '4') {
                                                        echo 'Cancel';
                                                    }elseif ($app_status == '5') {
                                                        echo 'Half payment';
                                                    }elseif ($app_status == '6') {
                                                        echo 'Full payment';
                                                    }elseif ($app_status == '7') {
                                                        echo 'Arrived at venue';
                                                    }elseif ($app_status == '8') {
                                                        echo 'Job start now';
                                                    }elseif ($app_status == '9') {
                                                        echo 'Job completed';
                                                    }elseif ($app_status == '10') {
                                                        echo 'Feedback';
                                                    }elseif ($app_status == '11') {
                                                        echo 'Feedback submitted';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $app_status = $data->status;
                                                    if($app_status == '5'){
                                                        echo 'Half payment';
                                                    }elseif ($app_status == '6') {
                                                        echo 'Full payment';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $data->service_charge; ?></td>
                                                <td class="actions"><a class="edit text-primary text-uppercase text-strong text-sm mr-10" href="<?php echo site_url();?>admin/getAppointmentList/<?php echo $data->id ; ?>" >View</a>
                                                    <a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10 delete_row" data-id="<?php echo $data->id; ?>" data-method="delete_userApp">Remove</a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    endforeach;
                                }
                                ?>
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