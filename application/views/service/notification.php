<div class="page page-dashboard">
    <div class="pageheader">
        <h2><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?><span> Activities</span></h2>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo site_url(); ?>Service/dashboard"><i class="fa fa-home"></i> GlamArmy</a>
                </li>
                <li>
                    <a href="<?php echo site_url(); ?>Service/notification">
                        <?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?>
                    </a>
                </li>
            </ul>
           
        </div>
    </div>

    <!-- cards row //$data = count($data->data);-->
    <div class="row">
        <div class="col-md-12">
            <section class="tile tile-simple">

                <!-- tile widget -->
                <div class="tile-widget dvd dvd-btm">

                    <h5 class="text-strong m-0">Messages <span class="badge bg-lightred pull-right"><?php echo count($data); ?></span></h5>

                </div>
                <!-- /tile widget -->

                <!-- tile body -->
                <div class="tile-body p-0">

                    <ul class="list-unstyled">
                        <?php if(!empty($data)){ 

                           foreach ($data as $noti) {
                        

                         ?>
                        <li class="p-10 b-b">
                            <div class="media">
                                <div class="pull-left thumb thumb-sm">
                                    <img class="media-object img-circle" src="assets/images/random-avatar8.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading fa fa-circle"> <i class=" text-success pull-right"></i></h5>
                                    <small class="noti text-muted"> <?php
                                        echo ucfirst($noti->notification_message);
                                    ?></small>
                                    <small class="pull-right"><?php echo  date("Y-m-d", strtotime($noti->create_date)); ?></small>
                                </div>
                            </div>
                        </li>
                       <?php }  }else{ ?>
                       <span>No Data Found</span>
                       <?php  }?>
                    </ul>

                </div>
                <!-- /tile body -->
            </section>
        </div>
    </div>
    <!-- /row -->
</div>