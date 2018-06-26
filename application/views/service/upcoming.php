<div class="page page-tables-datatables">
     <div class="pageheader">
        <h2><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?>
           <span>Upcoming GlamArmy</span></h2>
        <div class="page-bar">

            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo get_current_page_method_url('class'); ?>"><i class="fa fa-home"></i> GlamArmy</a>
                </li>
                <li>
                    <a href="javascript:void(0);"><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?></a>
                </li>
            </ul>
        
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">
            <section class="tile">
            <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Upcoming</strong></h1>
                </div>
            <!-- tile body -->
            <div class="tile-body">
            <div class="table-responsive">
            <table class="table table-custom" id="appointments">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Customer Name</th>
                        <th>Appointment Date</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>More details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      if(!empty($data)){ 
                      foreach($data as $upcomingList) {?>
                        <tr class="odd gradeX">
                            <td><img src="<?php echo $upcomingList->profilePicUrl; ?>" style="width: 40px;height: 40px;" alt="image"></td>
                            <td><?php echo ucfirst($upcomingList->first_name.' '.$upcomingList->lastname); ?></td>
                            <td><?php
                                $date = $upcomingList->appointment_date;
                                echo  date("D, j F Y h:i A",strtotime($date)); 
                             ?></td>
                            <td><?php echo $upcomingList->address; ?></td>
                            <td>
                            <?php if($upcomingList->status == '2'){ ?>   
                             <span class="label bg-info">Awaiting Confirmation</span>

                        <?php    }elseif($upcomingList->status == '5'){ ?>

                            <span class="label bg-lightred">Cancel</span>
                            <?php    }elseif($upcomingList->status == '6'){ ?>
                            <span class="label bg-success">Confirm</span>
                            <?php }else{ ?> 
                            <span class="label label-warning">New Prospect</span>
                            <?php } ?>
                           
                            </td>
                            <td><a href="<?php echo site_url();?>Service/upcomingAppoinment/<?php echo $upcomingList->appointment_id; ?>" class="btn btn-warning mb-10">More details</a></td>
                        </tr>
                    <?php } }else{ ?> 
                </tbody>
            </table>
            </div>
            <br>
            <span class="text-capitalize text-center text-darkgray">
                <p><?php echo $message; ?></p>
            </span>
            <?php } ?>
            </div>
            <!-- /tile body -->
            </section>
         </div>
        <!-- /col -->
    </div>
<!-- /row -->
</div>