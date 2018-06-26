<!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <!-- <base href=""> -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php if(isset($title)){ echo $title; }else{ echo 'Glam Army'; } ?></title>
        <link rel="icon" type="image/ico" href="<?php echo site_url('assets/images/favicon.ico');?>" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/vendor/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/css/vendor/animate.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/css/vendor/font-awesome.min.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/animsition/css/animsition.min.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('assetweb/css/sweetalert.css');?>">
        <!-- project main css files -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/main.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('assetweb/css/developer.css');?>">
        <!--/ stylesheets -->
        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="<?php echo site_url('assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js');?>"></script>
        <!--/ modernizr -->
        <script type="text/javascript">
            var SITE_URL = "<?php echo site_url();?>";
            //var loggedin = "<?php //echo is_loggedin();?>";
        </script>
    </head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
            <div class="page page-core page-login">
                <div class="text-center"><h3 class="text-light text-white"><span class="text-lightred">Glam</span>Army</h3></div>
                <div class="container w-420 p-15 bg-white mt-40 text-center">
                    <!-- <h2 class="text-light text-greensea">Log In</h2> -->
                    <form  class="form-validation mt-20" novalidate="" action="#" method="post" name="serviceLoginForm" id="serviceLoginForm">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control underline-input" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control underline-input hideShow">
                            <span class="showpass-icon"><i class="fa fa-eye-slash"></i></span>
                        </div>
                        <div class="form-group text-left mt-20">
                            <button type="button" class="btn btn-greensea b-0 br-2 mr-5" onclick="validateServiceLogin();">Login</button>
                            <label class="checkbox checkbox-custom-alt checkbox-custom-sm inline-block">
                                <!-- <input type="checkbox"><i></i> Remember me -->
                            </label>
                        </div>
                         <a href="#" class="pull-left mt-10" data-target="#forgotModal" data-toggle="modal">Forgot Password</a>
                        <a href="<?php echo site_url('Service/register');?>" class="pull-right mt-10">Register</a>
                    </form>
                </div>
            </div>
        </div>
    <!--modal-->
    <div id="forgotModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 class="text-center">What's My Password?</h5>
    </div>
    <div class="modal-body">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div>
                  <p>If you have forgotten your password you can reset it here.</p>
                    <div class="panel-body">
                        <fieldset>
                            <form role="form" name="forgotten">
                                <div class="form-group">
                                    <label for="email">Enter Your Email</label>
                                    <input class="form-control input-lg" placeholder="E-mail Address" name="email" type="email">
                                </div>
                                <button class="btn btn-lg btn-greensea btn-block" onclick="validateServiceForgotten();" type="button">SEND EMAIL</button>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
    <div class="col-md-12">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>    
    </div>
    </div>
    </div>
    </div>
        <!--/ Application Content -->

        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo site_url('assets/js/vendor/jquery/jquery-1.11.2.min.js');?>"><\/script>')</script>
        <script src="<?php echo site_url('assets/js/vendor/bootstrap/bootstrap.min.js');?>"></script>
        <script src="<?php echo site_url('assets/js/vendor/jRespond/jRespond.min.js');?>"></script>
        <script src="<?php echo site_url('assets/js/vendor/sparkline/jquery.sparkline.min.js');?>"></script>
        <script src="<?php echo site_url('assets/js/vendor/slimscroll/jquery.slimscroll.min.js');?>"></script>
        <script src="<?php echo site_url('assets/js/vendor/animsition/js/jquery.animsition.min.js');?>"></script>
        <script src="<?php echo site_url('assets/js/vendor/screenfull/screenfull.min.js');?>"></script>
        <script src="<?php echo site_url('assetweb/js/jquery.validate.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo site_url('assetweb/js/additional-methods.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo site_url('assetweb/js/sweetalert.min.js');?>" type="text/javascript"></script>
        
        <!--/ vendor javascripts -->
        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="<?php echo site_url('assets/js/main.js');?>"></script>
        <script src="<?php echo site_url('assetweb/js/developer.js');?>" type="text/javascript"></script>
        <!--/ custom javascripts -->

        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){
            });
        </script>
        <!--/ Page Specific Scripts -->

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        
    </body>
</html>
