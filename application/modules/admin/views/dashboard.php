<div class="page page-dashboard">

    <div class="pageheader">

        <h2>Dashboard <br/><span>Welcome to Everyday Service application</span></h2>

        <?php /*
		<div class="page-bar">

            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-home"></i>Eljebo</a>
                </li>
                <li>
                    <a>Dashboard</a>
                </li>
            </ul>

            <!-- <div class="page-toolbar">
                <a role="button" tabindex="0" class="btn btn-lightred no-border pickDate">
                    <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                </a>
            </div> -->

        </div> */?>

    </div>

    <!-- cards row -->
    <div class="row">

        

        <!-- col -->
        
        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
            <div class="card">
                <a href="<?php echo site_url('admin/get_customer');?>">
                <div class="front bg-lightred">

                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-xs-4">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                        <!-- /col -->
                        <!-- col -->
                        <div class="col-xs-8">
                            
                                <p class="text-elg text-strong mb-0"><?php echo $customer_count; ?></p>
                                <span>Users</span>
                            
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
        
        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
            <div class="card">
                <a href="<?php echo site_url('admin/get_serviceProvider');?>">
                <div class="front bg-greensea">

                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-xs-4">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <!-- /col -->
                        <!-- col -->
                        <div class="col-xs-8">
                            
                                <p class="text-elg text-strong mb-0">0<?php //echo $stylist_count; ?></p>
                                <span>Service Providers</span>
                            
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
        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
            <div class="card">
                <a href="<?php echo site_url('admin/getAppointments');?>">
                <div class="front bg-blue">

                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-xs-4">
                            <i class="fa fa-cogs fa-4x"></i>
                        </div>
                        <!-- /col -->
                        <!-- col -->
                        <div class="col-xs-8">
                            
                                <p class="text-elg text-strong mb-0"><?php echo $order_count; ?></p>
                                <span>Services</span>
                            
                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->

                </div>
                </a>
            </div>
        </div>
        <!-- /col -->
		
		<div class="card-container col-lg-3 col-sm-6 col-sm-12">
            <div class="card">
                <a href="<?php echo site_url('admin/getAppointments');?>">
                <div class="front bg-blue">

                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-xs-4">
                            <i class="fa fa-shopping-cart fa-4x"></i>
                        </div>
                        <!-- /col -->
                        <!-- col -->
                        <div class="col-xs-8">
                            
                                <p class="text-elg text-strong mb-0"><?php echo $order_count; ?></p>
                                <span>Orders</span>
                            
                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->

                </div>
                </a>
            </div>
        </div>

        <!-- col --
        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
            <div class="card">
                <div class="front bg-slategray">

                    <!-- row --
                    <div class="row">
                        <!-- col --
                        <div class="col-xs-4">
                            <i class="fa fa-cutlery fa-4x"></i>
                        </div>
                        <!-- /col -->
                        <!-- col --
                        <div class="col-xs-8">
                            <a href="<?php echo site_url('admin/kitchen_list');?>">
                                <p class="text-elg text-strong mb-0"><?php echo $kitchen_count; ?></p>
                                <span>Total Kitchens</span>
                            </a>
                        </div>
                        <!-- /col --
                    </div>
                    <!-- /row --

                </div>
            </div>
        </div>
        <!-- /col -->

    </div>
    <!-- /row -->
</div>