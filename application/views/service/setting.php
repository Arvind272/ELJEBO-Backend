<div class="page page-dashboard">
    <div class="pageheader">
        <h2><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?><span> Activities</span></h2>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo get_current_page_method_url('dashboard'); ?>"><i class="fa fa-home"></i> GlamArmy</a>
                </li>
                <li>
                    <a href="#"><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?></a>
                </li>
            </ul>

        </div>
    </div>
    <!-- cards row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">
            <!-- tile -->
            <section class="tile">
                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Setting </strong> Lists</h1>                              
                </div>
                <!-- /tile header -->
                <div class="tile-body">
                    <div class="row">                               
                        <div class="col-md-6 col-sm-6">

                            <ul class="nav nav-pills nav-stacked">
                                <li role="presentation"><a href="<?php echo get_current_page_method_url('settingcontact'); ?>">Contact</a></li>
                                <li role="presentation"><a href="<?php echo get_current_page_method_url('changepassword'); ?>">Change Password</a></li>
                                <li role="presentation"><a href="<?php echo get_current_page_method_url('certificate'); ?>">Cerificate</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <!-- /tile body -->
            </section>
            <!-- /tile -->
        </div>  
        <!-- /col -->
    </div>
    <!-- /row -->
</div>