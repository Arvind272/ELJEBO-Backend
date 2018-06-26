<div class="page page-tables-datatables">
    <div class="pageheader">
        <h2><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?>
            <span>Pending GlamArmy</span></h2>
            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li><a href="<?php echo get_current_page_method_url('class'); ?>"><i class="fa fa-home"></i> GlamArmy</a></li>
                    <li><a href="#"><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?></a></li>
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
                        <h1 class="custom-font"><strong>Pending</strong></h1>
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
                                        foreach($data as $pendlist) {?>
                                        <tr class="odd gradeX">
                                            <td><img src="<?php echo $pendlist->profilePicUrl; ?>" style="width: 40px;height: 40px;" alt="image"></td>
                                            <td><?php echo ucfirst($pendlist->first_name.' '.$pendlist->lastname); ?></td>
                                            <td><?php
                                            $date = $pendlist->appointment_date;
                                            echo  date("D, j F Y H:i A",strtotime($date)); 
                                            ?></td>
                                            <td><?php echo $pendlist->address; ?></td>
                                            <td>
                                                <?php if($pendlist->status == '2'){ ?>   
                                                <span class="label bg-warning">Awaiting Confirmation</span>
                                                <?php }else{ ?> 
                                                <span class="label bg-lightred">New Prospect</span>
                                                <?php } ?>
                                            </td>
                                            <td><a href="<?php echo site_url();?>Service/pendingAppoinment/<?php echo $pendlist->appointment_id; ?>" class="btn btn-warning mb-10">More details</a></td>
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