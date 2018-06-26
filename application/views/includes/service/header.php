<body id="minovate" class="appWrapper">
    <div id="wrap" class="animsition">
        <section id="header">
            <header class="clearfix">
                <!-- Branding -->
                <div class="branding">
                    <a class="brand" href="<?php echo get_current_page_method_url('dashboard'); ?>">
                        <span>Glam<strong>Army</strong></span>
                    </a>
                    <a href="#" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                </div>
                <!-- Branding end -->
                <!-- Left-side navigation -->
                <ul class="nav-left pull-left list-unstyled list-inline">
                    <li class="sidebar-collapse divided-right">
                        <a href="#" class="collapse-sidebar">
                            <i class="fa fa-outdent"></i>
                        </a>
                    </li>
                    <?php /*<li class="dropdown divided-right settings">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                        </a>
                        <ul class="dropdown-menu with-arrow animated littleFadeInUp" role="menu">
                            <li>

                                <ul class="color-schemes list-inline">
                                    <li class="title">Header Color:</li>
                                    <li><a href="#" class="scheme-drank header-scheme" data-scheme="scheme-default"></a></li>
                                    <li><a href="#" class="scheme-black header-scheme" data-scheme="scheme-black"></a></li>
                                    <li><a href="#" class="scheme-greensea header-scheme" data-scheme="scheme-greensea"></a></li>
                                    <li><a href="#" class="scheme-cyan header-scheme" data-scheme="scheme-cyan"></a></li>
                                    <li><a href="#" class="scheme-lightred header-scheme" data-scheme="scheme-lightred"></a></li>
                                    <li><a href="#" class="scheme-light header-scheme" data-scheme="scheme-light"></a></li>
                                    <li class="title">Branding Color:</li>
                                    <li><a href="#" class="scheme-drank branding-scheme" data-scheme="scheme-default"></a></li>
                                    <li><a href="#" class="scheme-black branding-scheme" data-scheme="scheme-black"></a></li>
                                    <li><a href="#" class="scheme-greensea branding-scheme" data-scheme="scheme-greensea"></a></li>
                                    <li><a href="#" class="scheme-cyan branding-scheme" data-scheme="scheme-cyan"></a></li>
                                    <li><a href="#" class="scheme-lightred branding-scheme" data-scheme="scheme-lightred"></a></li>
                                    <li><a href="#" class="scheme-light branding-scheme" data-scheme="scheme-light"></a></li>
                                    <li class="title">Sidebar Color:</li>
                                    <li><a href="#" class="scheme-drank sidebar-scheme" data-scheme="scheme-default"></a></li>
                                    <li><a href="#" class="scheme-black sidebar-scheme" data-scheme="scheme-black"></a></li>
                                    <li><a href="#" class="scheme-greensea sidebar-scheme" data-scheme="scheme-greensea"></a></li>
                                    <li><a href="#" class="scheme-cyan sidebar-scheme" data-scheme="scheme-cyan"></a></li>
                                    <li><a href="#" class="scheme-lightred sidebar-scheme" data-scheme="scheme-lightred"></a></li>
                                    <li><a href="#" class="scheme-light sidebar-scheme" data-scheme="scheme-light"></a></li>
                                    <li class="title">Active Color:</li>
                                    <li><a href="#" class="scheme-drank color-scheme" data-scheme="drank-scheme-color"></a></li>
                                    <li><a href="#" class="scheme-black color-scheme" data-scheme="black-scheme-color"></a></li>
                                    <li><a href="#" class="scheme-greensea color-scheme" data-scheme="greensea-scheme-color"></a></li>
                                    <li><a href="#" class="scheme-cyan color-scheme" data-scheme="cyan-scheme-color"></a></li>
                                    <li><a href="#" class="scheme-lightred color-scheme" data-scheme="lightred-scheme-color"></a></li>
                                    <li><a href="#" class="scheme-light color-scheme" data-scheme="light-scheme-color"></a></li>
                                </ul>

                            </li>

                            <li>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-xs-8 control-label">Fixed header</label>
                                        <div class="col-xs-4 control-label">
                                            <div class="onoffswitch lightred small">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="fixed-header" checked="">
                                                <label class="onoffswitch-label" for="fixed-header">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-xs-8 control-label">Fixed aside</label>
                                        <div class="col-xs-4 control-label">
                                            <div class="onoffswitch lightred small">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="fixed-aside" checked="">
                                                <label class="onoffswitch-label" for="fixed-aside">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> */ ?>
                        </ul>
                    </li>
                </ul>
                <!-- Left-side navigation end -->
                <!-- Right-side navigation -->
                <ul class="nav-right pull-right list-inline">
                    <li>
                        <a href="<?php echo get_current_page_method_url('notification'); ?>" class="dropdown-toggle">
                            <i class="fa fa-envelope"></i>
                            <span class="badge bg-lightred">
                                <?php
                                $notif = getDataByMethod('getNotification');
                                if (!empty($notif) && is_array($notif)) {
                                    echo count($notif);
                                }else{
                                    echo '0';
                                }
                                ?>
                            </span>
                        </a>
                    </li>
                    <li class="dropdown nav-profile">
                        <a href class="dropdown-toggle" data-toggle="dropdown">
                            <?php if(isset($_SESSION['service']->data->profile_pic)){  ?>
                            <img src="<?php echo $_SESSION['service']->data->profile_pic  ?>" alt="" class="img-circle size-30x30">
                            <?php }else{ ?>
                            <img src="<?php echo site_url('assets/images/profile-photo.jpg');?>" alt="" class="img-circle size-30x30">
                            <?php } ?>
                            
                            <span><?php echo ucwords(get_current_user_data('firstname').' '.get_current_user_data('lastname')); ?><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul class="dropdown-menu animated littleFadeInRight" role="menu">
                            <li><a href="<?php echo get_current_page_method_url('dashboard');?>"><i class="fa fa-tachometer"></i></i>Dashboard</a></li>
                            <li><a href="<?php echo get_current_page_method_url('previous'); ?>"><i class="fa fa-calendar"></i>Previous Appointment</a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-money"></i></i>Payment Preference</a></li>
                            <li><a href="<?php echo get_current_page_method_url('setting'); ?>"><i class="fa fa-cog"></i>Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0);" onclick="onLogout();"><i class="fa fa-sign-out"></i>Logout</a></li>
                        </ul>

                    </li>

                    <li class="toggle-right-sidebar" style="opacity: 0;"><a href="#"><i class="fa fa-comments"></i></a>
                    </li>

                </ul>
                <!-- Right-side navigation end -->
            </header>
        </section>
<!--/ HEADER Content  -->