<div class="page page-dashboard">
    <div class="pageheader">
        <h2><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?><span> Activities</span></h2>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php site_url(); ?>dashboard"><i class="fa fa-home"></i> GlamArmy</a>
                </li>
                <li>
                    <a href="<?php site_url(); ?>dashboard"><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- cards row -->
    <div class="row">
        <!-- col -->
        <div class="card-container col-lg-4 col-sm-6 col-sm-12">
            <div class="card">
                <a href="<?php site_url(); ?>pending">
                    <div class="front bg-greensea">

                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-4">
                                <i class="fa fa-calendar-o fa-4x"></i>
                            </div>
                            <!-- /col -->
                            <!-- col -->
                            <div class="col-xs-8">

                                <p class="text-elg text-strong mb-0"><?php if(isset($data->upcomingBooking)){ echo $data->pendingBooking; } ?></p>
                                <span>Pending</span>

                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->
                    </div>
                </a>
            </div>
        </div>
        <!-- /col -->
        <!-- col -->
        <div class="card-container col-lg-4 col-sm-6 col-sm-12">
            <div class="card">
                <a href="<?php site_url(); ?>upcoming">
                    <div class="front bg-lightred">
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-4">
                                <i class="fa fa-share fa-4x"></i>
                            </div>
                            <!-- /col -->
                            <!-- col -->
                            <div class="col-xs-8">
                                <a href="#">
                                    <p class="text-elg text-strong mb-0"><?php if(isset($data->upcomingBooking)){ echo $data->upcomingBooking; } ?></p>
                                    <span>Upcoming</span>

                                </div>
                                <!-- /col -->
                            </div>
                            <!-- /row -->
                        </div>
                    </a>
                </div>
            </div>
            <!-- /col -->
            <!-- col -->


            <div class="card-container col-lg-4 col-sm-6 col-sm-12">
                <div class="card">
                    <a href="<?php site_url(); ?>previous">
                        <div class="front bg-blue">
                            <!-- row -->
                            <div class="row">
                                <!-- col -->
                                <div class="col-xs-4">
                                    <i class="fa fa-clock-o fa-4x"></i>
                                </div>
                                <!-- /col -->
                                <!-- col -->
                                <div class="col-xs-8">

                                    <p class="text-elg text-strong mb-0"><?php if(isset($data->upcomingBooking)){ echo $data->previousBooking; } ?></p>
                                    <span>Previous</span>

                                </div>
                                <!-- /col -->
                            </div>
                            <!-- /row -->
                        </div>
                    </a>
                </div>
            </div>
            <!-- /col -->
            <!-- col -->

            <!-- /col -->
        </div>
        <!-- /row -->

        <div class="tcol">
            <!-- right side header -->
            <div class="p-15 bg-white">
                <div class="pull-right">
                    <button type="button" class="btn btn-sm btn-default" id="change-view-today">today</button>
                    <div class="btn-group">
                        <button class="btn btn-default btn-sm" id="change-view-day" >Day</button>
                        <button class="btn btn-default btn-sm" id="change-view-week">Week</button>
                        <button class="btn btn-default btn-sm" id="change-view-month">Month</button>
                    </div>
                </div>
                <h4 class="custom-font text-default m-0">Calendar</h4>
            </div>
            <!-- /right side header -->

            <!-- right side body -->
            <div class="p-15">
                <div id='calendar'></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2"><p class="p-10 p-10 mb-10 event-control bg-dutch"> Accept</p></div>
            <div class="col-md-2"><p class="p-10 mb-10 event-control b-l b-2x b-warning">Pending</p></div>
            <div class="col-md-2"><p class="p-10 p-10 mb-10 event-control b-l b-2x b-drank">Reject</p></div>
        </div>


    </div>